<?php

declare(strict_types=1);

namespace Swatch\Service;

use Swatch\Contract\HasHooks;

defined('ABSPATH') || exit;

/**
 * Optional archive-loop swatch preview for variable products.
 *
 * Rendering is off by default. Add-ons (e.g. Swatch Pro) enable it through the
 * `swatch/archive_enabled` filter and may enhance markup via `swatch/archive_html`.
 */
final class ArchiveRenderer implements HasHooks
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

        add_action('woocommerce_after_shop_loop_item_title', [$this, 'render'], 15);
        add_action('wp_enqueue_scripts', [$this, 'enqueueAssets']);
    }

    public function enqueueAssets(): void
    {
        if (! $this->isArchiveContext()) {
            return;
        }

        $plugin = \Swatch\Plugin::instance();

        wp_enqueue_style(
            'swatch',
            $plugin->url('assets/css/swatch.css'),
            [],
            \Swatch\VERSION,
        );
    }

    public function render(): void
    {
        if (! $this->isArchiveContext()) {
            return;
        }

        global $product;

        if (! $product instanceof \WC_Product_Variable) {
            return;
        }

        /**
         * Whether archive swatches should render for this product.
         *
         * @param bool         $enabled Default false.
         * @param \WC_Product  $product Variable product in the loop.
         */
        if (! apply_filters('swatch/archive_enabled', false, $product)) {
            return;
        }

        $attribute = $this->resolveAttribute($product);
        if (null === $attribute) {
            return;
        }

        $options = $product->get_variation_attributes()[$attribute] ?? [];
        if (! is_array($options) || [] === $options) {
            return;
        }

        $type  = $this->markup->resolveType($attribute);
        $items = $this->markup->buildItems($attribute, $options, true, $type);

        if ([] === $items) {
            return;
        }

        /**
         * Filters swatch items before the archive-loop group is rendered.
         *
         * @param list<array{value:string,label:string,color:string}> $items
         * @param string      $attribute Attribute taxonomy slug.
         * @param string      $type      Resolved swatch type.
         * @param string      $context   Always `archive`.
         * @param \WC_Product $product   Variable product in the loop.
         */
        $items = apply_filters('swatch/swatch_items', $items, $attribute, $type, 'archive', $product);

        if (! is_array($items) || [] === $items) {
            return;
        }

        $html = $this->markup->renderArchiveGroup($items, $type, $attribute, $product);

        /**
         * Filters archive swatch markup before it is printed in the loop.
         *
         * @param string      $html      Rendered swatch group HTML.
         * @param \WC_Product $product   Variable product in the loop.
         * @param string      $attribute Attribute taxonomy slug.
         */
        $html = (string) apply_filters('swatch/archive_html', $html, $product, $attribute);

        if ('' === trim($html)) {
            return;
        }

        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Markup is built and escaped in SwatchMarkup; add-ons filter the same contract.
        echo $html;
    }

    private function resolveAttribute(\WC_Product_Variable $product): ?string
    {
        foreach ($product->get_variation_attributes() as $attribute => $options) {
            if (! is_string($attribute) || ! taxonomy_exists($attribute)) {
                continue;
            }

            if (! is_array($options) || [] === $options) {
                continue;
            }

            $type  = $this->markup->resolveType($attribute);
            $items = $this->markup->buildItems($attribute, $options, true, $type);

            if ([] !== $items) {
                return $attribute;
            }
        }

        return null;
    }

    private function isArchiveContext(): bool
    {
        if (! function_exists('is_shop')) {
            return false;
        }

        if (is_shop() || is_product_taxonomy()) {
            return true;
        }

        return is_search() && 'product' === get_query_var('post_type');
    }
}
