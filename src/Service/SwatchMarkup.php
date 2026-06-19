<?php

declare(strict_types=1);

namespace Swatch\Service;

defined('ABSPATH') || exit;

/**
 * Shared swatch HTML builders for single-product and archive contexts.
 */
final class SwatchMarkup
{
    public function __construct(
        private readonly SwatchData $data,
        private readonly Settings $settings,
    ) {
    }

    /**
     * @param array<int|string, string> $options
     * @return list<array{value:string,label:string,color:string}>
     */
    public function buildItems(string $attribute, array $options, bool $isTaxonomy, string $type): array
    {
        $items = [];

        foreach ($options as $value) {
            $value = (string) $value;
            if ('' === $value) {
                continue;
            }

            $label = $value;
            $color = '';

            if ($isTaxonomy) {
                $term = get_term_by('slug', $value, $attribute);
                if ($term instanceof \WP_Term) {
                    $label = $term->name;
                    $color = $this->data->colorForTerm($term->term_id);

                    $customLabel = $this->data->labelForTerm($term->term_id);
                    if ('' !== $customLabel) {
                        $label = $customLabel;
                    }
                }
            }

            $items[] = [
                'value' => $value,
                'label' => $label,
                'color' => $color,
            ];
        }

        if ('color' === $type) {
            $hasColor = false;
            foreach ($items as $item) {
                if ('' !== $item['color']) {
                    $hasColor = true;
                    break;
                }
            }
            if (! $hasColor) {
                return [];
            }
        }

        return $items;
    }

    /**
     * @param list<array{value:string,label:string,color:string}> $items
     */
    public function renderProductGroup(array $items, string $type, string $attribute, string $selectId): string
    {
        ob_start();
        ?>
        <div
            class="swatch-group swatch-group--<?php echo esc_attr($type); ?>"
            role="radiogroup"
            aria-label="<?php echo esc_attr(wc_attribute_label($attribute)); ?>"
            data-swatch-for="<?php echo esc_attr($selectId); ?>"
            data-swatch-type="<?php echo esc_attr($type); ?>"
        >
            <?php foreach ($items as $item) :
                echo $this->renderProductSwatch($item, $type, $attribute);
            endforeach; ?>
        </div>
        <?php

        return (string) ob_get_clean();
    }

    /**
     * @param list<array{value:string,label:string,color:string}> $items
     */
    public function renderArchiveGroup(array $items, string $type, string $attribute, \WC_Product $product): string
    {
        $queryKey = 'attribute_' . sanitize_title($attribute);

        ob_start();
        ?>
        <div
            class="swatch-archive swatch-group swatch-group--<?php echo esc_attr($type); ?>"
            role="list"
            aria-label="<?php echo esc_attr(wc_attribute_label($attribute)); ?>"
            data-swatch-type="<?php echo esc_attr($type); ?>"
        >
            <?php foreach ($items as $item) :
                $url = add_query_arg($queryKey, rawurlencode($item['value']), $product->get_permalink());
                echo $this->renderArchiveSwatch($item, $type, $attribute, $url);
            endforeach; ?>
        </div>
        <?php

        return (string) ob_get_clean();
    }

    /**
     * @param array{value:string,label:string,color:string} $item
     */
    private function renderProductSwatch(array $item, string $type, string $attribute): string
    {
        $isColor = 'color' === $type && '' !== $item['color'];
        $style   = $isColor ? 'background-color:' . $item['color'] . ';' : '';

        ob_start();
        ?>
        <button
            type="button"
            class="swatch swatch--<?php echo esc_attr($type); ?>"
            role="radio"
            aria-checked="false"
            data-swatch-value="<?php echo esc_attr($item['value']); ?>"
            aria-label="<?php echo esc_attr($item['label']); ?>"
            title="<?php echo esc_attr($item['label']); ?>"
            <?php if ('' !== $style) : ?>style="<?php echo esc_attr($style); ?>"<?php endif; ?>
        >
            <?php if ('button' === $type) : ?>
                <span class="swatch__label"><?php echo esc_html($item['label']); ?></span>
            <?php else : ?>
                <span class="screen-reader-text"><?php echo esc_html($item['label']); ?></span>
            <?php endif; ?>
        </button>
        <?php

        $html = (string) ob_get_clean();

        /**
         * Filters a single product-page swatch button before it is printed.
         *
         * @param string               $html      Swatch button HTML.
         * @param array{value:string,label:string,color:string} $item Swatch data.
         * @param string               $type      Swatch type (color|button).
         * @param string               $attribute Attribute taxonomy/name.
         */
        return (string) apply_filters('swatch/product_swatch_html', $html, $item, $type, $attribute);
    }

    /**
     * @param array{value:string,label:string,color:string} $item
     */
    private function renderArchiveSwatch(array $item, string $type, string $attribute, string $url): string
    {
        $isColor = 'color' === $type && '' !== $item['color'];
        $style   = $isColor ? 'background-color:' . $item['color'] . ';' : '';

        ob_start();
        ?>
        <a
            href="<?php echo esc_url($url); ?>"
            class="swatch swatch--<?php echo esc_attr($type); ?>"
            role="listitem"
            data-swatch-value="<?php echo esc_attr($item['value']); ?>"
            aria-label="<?php echo esc_attr($item['label']); ?>"
            title="<?php echo esc_attr($item['label']); ?>"
            <?php if ('' !== $style) : ?>style="<?php echo esc_attr($style); ?>"<?php endif; ?>
        >
            <?php if ('button' === $type) : ?>
                <span class="swatch__label"><?php echo esc_html($item['label']); ?></span>
            <?php else : ?>
                <span class="screen-reader-text"><?php echo esc_html($item['label']); ?></span>
            <?php endif; ?>
        </a>
        <?php

        $html = (string) ob_get_clean();

        /**
         * Filters a single archive-loop swatch link before it is printed.
         *
         * @param string               $html      Swatch link HTML.
         * @param array{value:string,label:string,color:string} $item Swatch data.
         * @param string               $type      Swatch type (color|button).
         * @param string               $attribute Attribute taxonomy slug.
         * @param string               $url       Product URL with pre-selected attribute.
         */
        return (string) apply_filters('swatch/archive_swatch_html', $html, $item, $type, $attribute, $url);
    }

    public function resolveType(string $attribute): string
    {
        return $this->data->resolveType(
            $attribute,
            (string) $this->settings->get('default_type', 'button'),
        );
    }
}
