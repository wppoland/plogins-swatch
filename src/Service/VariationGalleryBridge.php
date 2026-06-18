<?php

declare(strict_types=1);

namespace Swatch\Service;

use Swatch\Contract\HasHooks;

defined('ABSPATH') || exit;

/**
 * Exposes per-variation gallery attachment IDs to the variations form JSON.
 *
 * Add-ons filter `swatch/variation_gallery` to supply extra image IDs for a
 * variation. The resolved list is passed to the front end as
 * `swatch_variation_gallery` on each variation object.
 */
final class VariationGalleryBridge implements HasHooks
{
    public function registerHooks(): void
    {
        add_filter('woocommerce_available_variation', [$this, 'appendGalleryData'], 20, 3);
    }

    /**
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function appendGalleryData(array $data, \WC_Product_Variable $product, \WC_Product_Variation $variation): array
    {
        $ids = apply_filters('swatch/variation_gallery', [], $variation, $product);
        if (! is_array($ids)) {
            $ids = [];
        }

        $images = [];
        foreach ($ids as $id) {
            $attachmentId = absint($id);
            if ($attachmentId <= 0) {
                continue;
            }

            $thumb = wp_get_attachment_image_url($attachmentId, 'woocommerce_thumbnail');
            $full  = wp_get_attachment_image_url($attachmentId, 'woocommerce_single');
            if (! is_string($thumb) || '' === $thumb) {
                continue;
            }

            $images[] = [
                'id'    => $attachmentId,
                'thumb' => $thumb,
                'full'  => is_string($full) && '' !== $full ? $full : $thumb,
                'alt'   => (string) get_post_meta($attachmentId, '_wp_attachment_image_alt', true),
            ];
        }

        $data['swatch_variation_gallery'] = $images;

        return $data;
    }
}
