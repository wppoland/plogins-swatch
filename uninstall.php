<?php
/**
 * Uninstall cleanup for Swatch.
 *
 * Removes the plugin's own options when it is deleted from wp-admin. Per-term
 * swatch colours/labels are intentionally left in place (they are attribute term
 * meta the merchant curated and may want again on reinstall); WooCommerce data
 * is never touched.
 *
 * @package Swatch
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

delete_option('swatch_settings');
delete_option('swatch_attribute_types');
delete_option('swatch_db_version');

// The PRO banner's dismissal is stored per user, so it belongs to the
// plugin rather than to the site content. User meta is global, not
// per-site, which is why this uses delete_metadata's \$delete_all rather
// than a loop over the users of one blog.
delete_metadata('user', 0, 'swatch_pro_banner_dismissed', '', true);
