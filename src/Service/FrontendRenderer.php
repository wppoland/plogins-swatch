<?php

declare(strict_types=1);

namespace Swatch\Service;

use Swatch\Contract\HasHooks;

defined('ABSPATH') || exit;

/**
 * Front-end renderer. On single product pages it filters WooCommerce's native
 * variation-attribute dropdown markup and appends an accessible swatch group
 * alongside the original <select>, which is kept (visually hidden) so the native
 * variations form keeps working. A small vanilla-JS script mirrors swatch
 * clicks onto the hidden <select> and reflects WooCommerce's own
 * found_variation / reset_data events back onto the swatches (selected /
 * out-of-combination states). No jQuery.
 *
 * Robustness: products with no swatch configuration (no colour/label data and
 * no resolvable type) fall back to the untouched WooCommerce dropdown. Missing
 * terms, deleted attributes and custom (non-taxonomy) attributes never fatal.
 */
final class FrontendRenderer implements HasHooks
{
    public function __construct(
        private readonly SwatchMarkup $markup,
        private readonly Settings $settings,
    ) {
    }

    public function registerHooks(): void
    {
        if (! $this->settings->isEnabled()) {
            return;
        }

        add_filter('woocommerce_dropdown_variation_attribute_options_html', [$this, 'renderSwatches'], 20, 2);
        add_action('wp_enqueue_scripts', [$this, 'enqueueAssets']);
    }

    /**
     * Enqueue swatch assets only on single product pages that carry a variations
     * form. Registered up front so they are available, then printed on demand.
     */
    public function enqueueAssets(): void
    {
        if (! function_exists('is_product') || ! is_product()) {
            return;
        }

        $plugin = \Swatch\Plugin::instance();

        wp_enqueue_style(
            'swatch',
            $plugin->url('assets/css/swatch.css'),
            [],
            \Swatch\VERSION,
        );

        wp_enqueue_script(
            'swatch',
            $plugin->url('assets/js/swatch.js'),
            [],
            \Swatch\VERSION,
            ['in_footer' => true, 'strategy' => 'defer'],
        );
    }

    /**
     * Filter callback: append a swatch group to WooCommerce's dropdown HTML.
     *
     * @param string               $html The original <select> markup.
     * @param array<string, mixed> $args WooCommerce dropdown args.
     */
    public function renderSwatches(string $html, array $args): string
    {
        $attribute = isset($args['attribute']) ? (string) $args['attribute'] : '';
        if ('' === $attribute) {
            return $html;
        }

        /** @var array<int|string, string> $options */
        $options = isset($args['options']) && is_array($args['options']) ? $args['options'] : [];
        $product = $args['product'] ?? null;

        $isTaxonomy = taxonomy_exists($attribute);

        if ([] === $options && $product instanceof \WC_Product_Variable) {
            $variationAttributes = $product->get_variation_attributes();
            $options             = $variationAttributes[$attribute] ?? [];
            if (! is_array($options)) {
                $options = [];
            }
        }

        if ([] === $options) {
            return $html;
        }

        $type  = $this->markup->resolveType($attribute);
        $items = $this->markup->buildItems($attribute, $options, $isTaxonomy, $type);

        if ([] === $items) {
            return $html;
        }

        $selectId = $this->selectId($args, $attribute);
        $swatches = $this->markup->renderProductGroup($items, $type, $attribute, $selectId);

        /**
         * Filters the rendered swatch group markup before it is appended to the
         * WooCommerce dropdown. Add-ons (e.g. Swatch Pro image swatches) use this
         * to enhance the buttons the FREE renderer produced.
         *
         * @param string               $swatches  The swatch group HTML.
         * @param string               $attribute Attribute taxonomy/name.
         * @param array<string, mixed> $args      Original WooCommerce dropdown args.
         */
        $swatches = (string) apply_filters('swatch/swatch_group_html', $swatches, $attribute, $args);

        return $html . $swatches;
    }

    /**
     * Recreate the id WooCommerce assigns to the attribute <select> so the JS
     * can target it. Mirrors WooCommerce core: `id="<sanitized attribute>"`.
     *
     * @param array<string, mixed> $args
     */
    private function selectId(array $args, string $attribute): string
    {
        if (isset($args['id']) && '' !== (string) $args['id']) {
            return sanitize_html_class((string) $args['id']);
        }

        return sanitize_title($attribute);
    }
}
