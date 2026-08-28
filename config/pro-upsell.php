<?php
/**
 * PRO upsell content, generated from the plogins.com registry by
 * scripts/gen-pro-upsell.mjs. The admin upsell renders this; curate the
 * feature list to fit this plugin's settings screen (do not invent features).
 *
 * @package plogins-swatch-pro
 */

defined('ABSPATH') || exit;

return [
    'name'       => 'Swatch Pro',
    'url'        => 'https://plogins.com/plogins-swatch-pro/pricing/',
    'sellable'   => true,
    'price_from' => 19,
    'currency'   => 'EUR',
    'lead'       => [
        'en' => 'Image swatches, per-variation galleries, archive swatches, rich tooltips and custom sizing. Feature-complete PRO.',
        'pl' => 'Próbki obrazkowe, galeria per wariant, próbki na listach, tooltipy i rozmiary. Kompletna wersja PRO.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'Image swatches', 'desc' => 'Upload an image per attribute term rendered as a thumbnail swatch on the product page.'],
            'pl' => ['title' => 'Próbki obrazkowe', 'desc' => 'Obraz per termin atrybutu renderowany jako miniatura próbki na karcie produktu.'],
        ],
        [
            'en' => ['title' => 'Per-variation gallery', 'desc' => 'Extra gallery images per variation with a thumbnail strip below the main gallery.'],
            'pl' => ['title' => 'Galeria per wariant', 'desc' => 'Dodatkowe obrazy galerii per wariant z paskiem miniatur pod główną galerią.'],
        ],
        [
            'en' => ['title' => 'Archive swatches', 'desc' => 'Show swatches on shop, category, tag and search listings with links to the product and selected option.'],
            'pl' => ['title' => 'Próbki na listach', 'desc' => 'Próbki na liście sklepu, kategorii, tagów i wyszukiwania z linkiem do produktu z wybraną opcją.'],
        ],
        [
            'en' => ['title' => 'Rich tooltips', 'desc' => 'Preview the colour chip, label or swatch image on hover and keyboard focus on product and archive pages.'],
            'pl' => ['title' => 'Bogate tooltipy', 'desc' => 'Podgląd koloru, etykiety lub obrazu po najechaniu i fokusie na karcie produktu i listach sklepu.'],
        ],
        [
            'en' => ['title' => 'Custom sizes and shapes', 'desc' => 'Small/large swatches and circle, square, rounded or pill shapes per global attribute.'],
            'pl' => ['title' => 'Własne rozmiary i kształty', 'desc' => 'Małe/duże próbki oraz koło, kwadrat, zaokrąglony lub pigułka per atrybut globalny.'],
        ],
    ],
];
