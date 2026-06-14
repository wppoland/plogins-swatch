<?php
/**
 * Default settings, merged under the option key `swatch_settings`.
 *
 * Swatch ships enabled. The merchant chooses a default swatch type from the
 * Swatch admin screen. Per-attribute swatch types and per-term colours/labels
 * are stored separately as attribute taxonomy meta (see Swatch\Service\SwatchData).
 *
 * @package Swatch
 *
 * @return array<string, mixed>
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

return [
    // Master switch.
    'enabled' => true,

    // Default swatch type for attributes with no explicit type set: 'color' or 'button'.
    'default_type' => 'button',
];
