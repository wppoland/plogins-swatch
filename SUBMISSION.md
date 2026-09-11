# wp.org submission packet: Plogins Swatch

Upload at https://wordpress.org/plugins/developers/add/ (needs the wp.org login).

- **Zip**: `~/Downloads/plogins-swatch-1.0.12.zip` (40.6K, 36 files)
- **Requested slug**: `plogins-swatch` (matches the Text Domain and the folder
  inside the zip; a mismatch there is what pended half the estate before)
- **Display name**: Plogins Swatch - Variation Swatches for WooCommerce

## Description for the form

Plogins Swatch replaces WooCommerce's default variation dropdowns with colour
and label swatches on the product page, and optionally in shop and category
listings. You pick a swatch type per attribute and set a colour or a label on
each attribute term; anything you leave unset keeps the normal dropdown, so a
half-configured shop never looks broken.

The swatches drive WooCommerce's own variations form rather than replacing it,
so price, stock and the add-to-cart button behave exactly as they do with the
stock dropdowns, and out-of-combination options are reflected automatically.
The front end is vanilla JavaScript with no jQuery, the controls are a real
radiogroup with arrow-key navigation and screen-reader labels, and nothing
loads at all when the plugin is switched off.

It is self-contained: no external service, no account, no third-party
dependency, and no data leaves the site. The full source is at
github.com/wppoland/plogins-swatch.

## Verified before submitting

- Plugin Check, severity 7, against the **built package**: pass.
- Plugin Check, severity 5: the only findings are the harness renaming the
  folder to `swatch-pcp` (so every text domain "mismatches") and two
  `swatch/archive`, `swatch/swatch` prefix warnings that are hook names, not PHP
  prefixes. Renaming those hooks would stop the PRO add-on booting.
- Boots on **WordPress 7.1 + WooCommerce 11.1.0-beta.2**, activation clean, no
  fatals in debug.log. That is what makes `Tested up to: 7.1` a fact rather
  than a guess.
- Package audited: no `.po`, `.mo`, `.wordpress-org/`, `tests/`, `vendor/`,
  `node_modules/`, `scripts/` or `composer.json`. Only the `.pot` ships.
- Listing art present: icon 128 and 256, banner 772 and 1544, two screenshots,
  and a Playground blueprint whose landing page is the real settings slug.

## After approval

1. Add `swatch:plogins-swatch` to `PUBLISHED` in
   `plogins/scripts/release/wporg-release.sh`, then run it for swatch.
2. Registry: `status: "live"`, `wpOrgLive: true`, `wpOrgSlug: "plogins-swatch"`,
   and at least two `notFor` bullets written from the source, or `check-claims`
   fails the moment the flip lands.
3. Docs: remove any "when it is live" hedging from the install steps.
4. Translations: `translate.wordpress.org` creates the project a day or so after
   the first release. Import the Polish only; we are PTE for pl and nothing else.
