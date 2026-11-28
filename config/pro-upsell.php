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
    'campaign'   => 'plogins-swatch',
    'locales'    => ['pl', 'de', 'es'],
    'sellable'   => true,
    'price_from' => 19,
    'currency'   => 'EUR',
    'lead'       => [
        'en' => 'Image swatches on the product page and in the shop loop, per-variation galleries, rich tooltips and custom sizing. Feature-complete PRO.',
        'pl' => 'Próbki obrazkowe, galeria per wariant, próbki na listach, tooltipy i rozmiary. Kompletna wersja PRO.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'Image swatches', 'desc' => 'Upload an image per attribute term rendered as a thumbnail swatch on the product page.'],
            'pl' => ['title' => 'Próbki obrazkowe', 'desc' => 'Obraz per termin atrybutu renderowany jako miniatura próbki na karcie produktu.'],
        ],
        [
            'en' => ['title' => 'Per-variation gallery (WooCommerce before 11.1)', 'desc' => 'Extra gallery images per variation with a thumbnail strip below the main gallery. From WooCommerce 11.1 its own variation gallery field does this, and galleries already set keep working.'],
            'pl' => ['title' => 'Galeria per wariant (WooCommerce przed 11.1)', 'desc' => 'Dodatkowe obrazy galerii per wariant z paskiem miniatur pod główną galerią. Od WooCommerce 11.1 robi to własne pole galerii wariantu WooCommerce, a już przypisane obrazy działają dalej.'],
        ],
        [
            'en' => ['title' => 'Image swatches in the shop loop', 'desc' => 'Swap the colour chip for the term image on shop, category, tag and search listings. The loop swatches themselves are free since Swatch 1.0.8; this adds the image.'],
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
        [
            'en' => ['title' => 'Linked products', 'desc' => 'Sell each colour as a separate product: products in one group show each other as linked colour tiles above the add to cart form.'],
            'pl' => ['title' => 'Powiązane produkty', 'desc' => 'Każdy kolor jako osobny produkt: produkty z jednej grupy pokazują się nawzajem jako kafelki kolorów z linkiem, nad formularzem dodania do koszyka.'],
        ],
    ],
];
