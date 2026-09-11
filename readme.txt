=== Plogins Swatch - Variation Swatches for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, variation swatches, color swatches, variations, product attributes
Requires at least: 6.5
Tested up to: 7.1
Requires PHP: 8.1
Stable tag: 1.0.13
Requires Plugins: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Replace WooCommerce variation dropdowns with accessible colour and label swatches that wire straight into the native variations form.

== Description ==

Swatch replaces WooCommerce's default variation `<select>` dropdowns with visual, accessible swatches on single product pages. Choose a swatch type per attribute (colour dots or button/label pills) and assign a colour or label per term.

The swatches drive WooCommerce's own variations form, so price, stock and the add-to-cart button update exactly as they do with the stock dropdowns. Selected and out-of-combination states are reflected automatically.

The full source lives on GitHub at [github.com/wppoland/plogins-swatch](https://github.com/wppoland/plogins-swatch) if you want to read the code or report a problem.

**Features**

* Colour and button/label swatch types.
* Per-attribute type selection on the global attribute screen.
* Per-term colour (`sanitize_hex_color`) and custom label, stored as term meta.
* Wires into WooCommerce's native variations form, no jQuery, vanilla JS.
* Keyboard operable (radiogroup semantics, arrow keys) and screen-reader labelled.
* Focus-visible rings, sufficient contrast, reduced-motion friendly, no layout shift.
* Graceful fallback to the standard dropdown when an attribute has no swatch data.
* Swatches in shop and category listings too, off by default so your shop page does not change without you asking.
* Settings page under WooCommerce: enable/disable, default swatch type and the shop-listing switch.

**Self-contained.** No external services, no account, no third-party dependencies.

== Installation ==

1. Install from **Plugins > Add New** by searching for *Plogins Swatch*, or upload the `plogins-swatch` folder to `/wp-content/plugins/`.
2. Activate it. WooCommerce must be active.
3. Go to WooCommerce > Swatch to tune the defaults.
4. On Products > Attributes, set a swatch colour or label on each attribute term.

== Frequently Asked Questions ==

= Documentation and links =

* **Documentation**: [plogins.com/plogins-swatch/docs/](https://plogins.com/plogins-swatch/docs/)
* **Plugin page**: [plogins.com/plogins-swatch/](https://plogins.com/plogins-swatch/)
* **Source code**: [github.com/wppoland/plogins-swatch](https://github.com/wppoland/plogins-swatch)
* **Bug reports and feature requests**: [github.com/wppoland/plogins-swatch/issues](https://github.com/wppoland/plogins-swatch/issues)


= Does it require WooCommerce? =

Yes. Swatch extends WooCommerce's variable products and does nothing without it.

= What happens to attributes I have not configured? =

They get the plugin's default swatch type (button swatches out of the box), the same as any attribute you have not given its own type. Only a colour attribute with no colours configured falls back to the dropdown automatically.

= Does it work without jQuery? =

Yes. The front-end is vanilla JavaScript that hooks WooCommerce's own variation events.

= Can shoppers pick variations with a keyboard? =

Yes. Swatches use radiogroup semantics, arrow-key navigation and visible focus rings.

= Does it work on mobile? =

Yes. Swatches stay in the native variations form with touch-friendly targets; no separate mobile app or script framework is required.


= Does this plugin work on WordPress Multisite? =

Yes. This plugin is compatible with WordPress Multisite. Network activate it or activate it on individual sites; each site keeps its own settings and data.

== Screenshots ==

1. Colour and button swatches on a single product page.
2. The Swatch settings screen under the WooCommerce menu.

== External Services ==

Swatch does not connect to any external services. It makes no outbound HTTP requests, loads no remote scripts, fonts or CDN assets, and sends no telemetry or analytics. There is no account or API key.

Everything is stored in your own database: the swatch type per attribute, the global defaults and a schema version are kept in the `swatch_attribute_types`, `swatch_settings` and `swatch_db_version` options, and each term's colour and label are stored as the `swatch_color` and `swatch_label` term meta on your WooCommerce attribute terms. The plugin sends no email.

== Translations ==

Plogins Swatch is fully translatable and ships the `plogins-swatch.pot` template. Translations are delivered by WordPress.org language packs from translate.wordpress.org, which is where Polish, German and Spanish are being contributed; the package itself carries no compiled translation files.

== Changelog ==

= 1.0.13 =
* Fixed: the PRO upgrade promo kept selling to people who had already bought the paid edition. Only the banner could be dismissed, so the sidebar promo and the locked feature cards followed a paying customer around for good. The promo now checks whether the paid edition is active and steps aside when it is.
* Fixed: arrow glyphs in the admin menu paths, and in the strings handed to translators. An arrow inside a translatable string makes the glyph every translator's problem and changes the layout in any locale that drops it.

= 1.0.12 =
* Fixed: the installation steps told you to upload a `swatch` folder. The package has unpacked to `plogins-swatch` since the build started taking the folder name from the text domain, so following the readme put the plugin somewhere WordPress would not find it.
* Fixed: the link to the attributes screen had an arrow glyph inside the translated string, which made the arrow every translator's problem rather than the layout's.
* Changed: the features list now mentions swatches in shop and category listings. They arrived in 1.0.8 and the description never said so.
* Changed: Polish, German and Spanish are complete again at 52 of 52 strings. Ten strings, the whole shop-listing section among them, had no translation in any locale.

= 1.0.11 =
* Fixed: deleting the plugin left the per-user "dismiss" flag from the PRO notice in the database. Uninstall now removes it for every user, not just the one who dismissed it.

= 1.0.10 =
* Fixed: the PRO notice on the settings screen still sold shop-loop swatches as a paid feature. They have been in the free plugin since 1.0.8, behind the Swatches in the shop loop checkbox. What PRO adds there is the term image in place of the colour chip, and the notice now says so.

= 1.0.9 =
* Changed: **Swatches in the shop loop** now shows that it hangs off the master switch above it. With **Enable swatches** off, the row goes quiet and says the listings will not render swatches yet, rather than taking a tick that does nothing. The state is rendered from the saved settings, so it is correct with JavaScript switched off, and the box stays reachable and saveable either way.
* Changed: both switches in that section tie their help text to the checkbox with `aria-describedby`, so a screen reader reads the explanation with the control.

= 1.0.8 =
* New: **Swatches in the shop loop**, a setting on the Swatch screen. The archive renderer was always in this plugin, complete and working, but it was held shut by a hardcoded value that only the paid add-on ever flipped. That makes it a built-in feature the plugin refused to run, which the WordPress.org guidelines do not allow, so it is a setting now. Off by default, because it changes how your shop page looks.
* Colour and label swatches render in listings exactly as they do on the product page. Image swatches in listings are what the paid edition adds on top.

= 1.0.7 =
* Renamed to Plogins Swatch - Variation Swatches for WooCommerce so the name leads with the brand rather than a generic word, which is what the WordPress.org plugin review team asks for. The plugin slug is unchanged.

= 1.0.6 =
* Tested against WordPress 7.1. Verified by activating this build on a clean 7.1 install with WooCommerce 11.1, not by editing the header.

= 1.0.5 =
* Fixed the PRO promo on the settings screen quoting a price in PLN. PRO is priced and charged in EUR, so an admin on a Polish site was shown a zloty amount and then billed in euro, and the zloty figure was a fixed conversion that drifted from the real charge as the rate moved. The promo now shows the euro price that is actually taken.

= 1.0.3 =
* Translations: completed Polish, German and Spanish for the PRO upgrade panel.

= 1.0.2 =
* Added bundled Polish, German and Spanish translations for the plugin interface.

= 1.0.1 =
* First stable release.

= 0.1.5 =
* Renamed to Plogins Swatch for WooCommerce for a more distinctive plugin name.

= 0.1.4 =
* Swatch group filters `swatch/swatch_group_vars` and `swatch/swatch_group_classes` for PRO sizing and shapes.

= 0.1.3 =
* Per-swatch filters (`swatch/product_swatch_html`, `swatch/archive_swatch_html`) and `swatch/swatch_items` for PRO tooltips and add-ons.

= 0.1.2 =
* Add optional archive-loop swatch preview via `swatch/archive_enabled` and `swatch/archive_html` filters for add-ons.

= 0.1.1 =
* Add `swatch/variation_gallery` filter and expose `swatch_variation_gallery` on variation JSON for add-ons.

= 0.1.0 =
* Initial release.
