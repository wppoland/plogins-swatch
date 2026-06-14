<?php

declare(strict_types=1);

namespace Swatch\Admin;

defined('ABSPATH') || exit;

use Swatch\Contract\HasHooks;
use Swatch\Service\SwatchData;
use Swatch\Service\Settings as SettingsStore;

/**
 * Admin settings page registered under the WooCommerce submenu.
 *
 * Stores settings in the `swatch_settings` option (array): the master toggle and
 * the default swatch type. All output is escaped; all input is sanitised on save.
 * The save capability is aligned to manage_woocommerce so shop managers can save.
 */
final class Settings implements HasHooks
{
    private const PAGE = 'swatch-settings';

    public function __construct(private readonly SettingsStore $store)
    {
    }

    public function registerHooks(): void
    {
        add_action('admin_menu', [$this, 'addMenuPage']);
        add_action('admin_init', [$this, 'registerSettings']);
    }

    public function addMenuPage(): void
    {
        add_submenu_page(
            'woocommerce',
            __('Swatch Settings', 'swatch'),
            __('Swatch', 'swatch'),
            'manage_woocommerce',
            self::PAGE,
            [$this, 'renderPage'],
        );
    }

    public function registerSettings(): void
    {
        register_setting(
            self::PAGE,
            SettingsStore::OPTION,
            [
                'type'              => 'array',
                'sanitize_callback' => [$this, 'sanitize'],
            ],
        );

        add_filter(
            'option_page_capability_' . self::PAGE,
            static fn (): string => 'manage_woocommerce',
        );
    }

    public function renderPage(): void
    {
        if (! current_user_can('manage_woocommerce')) {
            return;
        }

        $settings = $this->store->all();
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

            <p><?php esc_html_e('Swatch replaces the default WooCommerce variation selects with accessible colour or label swatches. Set a colour or label per attribute term on the global attribute screens (Products → Attributes → Configure terms), then choose the default look here.', 'swatch'); ?></p>

            <form method="post" action="options.php">
                <?php settings_fields(self::PAGE); ?>

                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><?php esc_html_e('Enable swatches', 'swatch'); ?></th>
                            <td>
                                <label for="swatch_enabled">
                                    <input
                                        type="checkbox"
                                        id="swatch_enabled"
                                        name="<?php echo esc_attr(SettingsStore::OPTION); ?>[enabled]"
                                        value="1"
                                        <?php checked($this->store->isEnabled(), true); ?>
                                    />
                                    <?php esc_html_e('Replace variation dropdowns with swatches on single product pages.', 'swatch'); ?>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="swatch_default_type"><?php esc_html_e('Default swatch type', 'swatch'); ?></label>
                            </th>
                            <td>
                                <?php $type = (string) ($settings['default_type'] ?? 'button'); ?>
                                <select id="swatch_default_type" name="<?php echo esc_attr(SettingsStore::OPTION); ?>[default_type]">
                                    <option value="button" <?php selected($type, 'button'); ?>><?php esc_html_e('Button / label', 'swatch'); ?></option>
                                    <option value="color" <?php selected($type, 'color'); ?>><?php esc_html_e('Colour', 'swatch'); ?></option>
                                </select>
                                <p class="description"><?php esc_html_e('Used for any attribute you have not given an explicit type. Attributes with no colours configured automatically fall back to the dropdown, so this is safe to leave on “Colour”.', 'swatch'); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    /**
     * Sanitise submitted settings, preserving defaults for fields not on the form.
     *
     * @param mixed $raw
     * @return array<string, mixed>
     */
    public function sanitize(mixed $raw): array
    {
        if (! is_array($raw)) {
            $raw = [];
        }

        $defaults = $this->store->defaults();

        $type = isset($raw['default_type']) ? sanitize_key((string) $raw['default_type']) : 'button';
        if (! in_array($type, SwatchData::validTypes(), true)) {
            $type = 'button';
        }

        $sanitized = array_merge($defaults, [
            'enabled'      => ! empty($raw['enabled']),
            'default_type' => $type,
        ]);

        $this->store->flush();

        return $sanitized;
    }
}
