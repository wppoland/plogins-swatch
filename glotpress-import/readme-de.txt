=== Plogins Swatch - Variation Swatches for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, variation swatches, color swatches, variations, product attributes
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.2
Requires Plugins: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Ersetze die Variations-Dropdowns von WooCommerce durch barrierefreie Farb- und Label-Felder, die direkt in das native Variationsformular eingebunden werden.

== Description ==

Swatch ersetzt die standardmäßigen `<select>`-Dropdowns von WooCommerce durch visuelle, barrierefreie Farbfelder auf einzelnen Produktseiten. Wähle pro Attribut einen Farbfeldtyp (Farbpunkte oder Button-/Label-Pills) und weise jedem Begriff eine Farbe oder ein Label zu.

Die Farbfelder steuern das eigene Variationsformular von WooCommerce, sodass Preis, Lagerbestand und der Button „In den Warenkorb“ genauso aktualisiert werden wie mit den Standard-Dropdowns. Ausgewählte Zustände und in der aktuellen Kombination nicht verfügbare Optionen werden automatisch berücksichtigt.

Der vollständige Quellcode liegt auf GitHub unter https://github.com/wppoland/plogins-swatch, falls du den Code lesen oder ein Problem melden möchtest.

<strong>Funktionen</strong>

* Farb- und Button-/Label-Feldtypen.
* Auswahl des Typs pro Attribut auf dem globalen Attribut-Bildschirm.
* Farbe pro Begriff (`sanitize_hex_color`) und eigenes Label, gespeichert als Begriffs-Meta.
* Bindet sich in das native Variationsformular von WooCommerce ein, kein jQuery, reines JavaScript.
* Per Tastatur bedienbar (Radiogroup-Semantik, Pfeiltasten) und für Screenreader beschriftet.
* Sichtbare Fokus-Ringe, ausreichender Kontrast, Rücksicht auf reduzierte Bewegung, keine Layout-Verschiebung.
* Sauberer Rückfall auf das Standard-Dropdown, wenn ein Attribut keine Farbfeld-Daten hat.
* Einstellungsseite unter WooCommerce: Aktivieren/Deaktivieren und Standard-Farbfeldtyp.

<strong>Eigenständig.</strong> Keine externen Dienste, kein Konto, keine Abhängigkeiten von Drittanbietern.

== Installation ==

1. Lade das Plugin nach `/wp-content/plugins/swatch` hoch oder installiere es über Plugins → Installieren.
2. Aktiviere es. WooCommerce muss aktiv sein.
3. Gehe zu WooCommerce → Swatch, um die Standardeinstellungen anzupassen.
4. Lege unter Produkte → Attribute eine Farbfeld-Farbe oder ein Label für jeden Attributbegriff fest.

== Frequently Asked Questions ==

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-swatch/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-swatch/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-swatch
* <strong>Fehlerberichte und Funktionswünsche</strong> – https://github.com/wppoland/plogins-swatch/issues


= Does it require WooCommerce? =

Ja. Swatch erweitert die variablen Produkte von WooCommerce und macht ohne WooCommerce nichts.

= What happens to attributes I have not configured? =

Sie behalten das Standard-Dropdown von WooCommerce. Farbfelder ohne festgelegte Farben fallen automatisch auf das Dropdown zurück, sodass nie etwas kaputtgeht.

= Does it work without jQuery? =

Ja. Das Frontend ist reines JavaScript, das sich in die eigenen Variations-Events von WooCommerce einklinkt.

= Can shoppers pick variations with a keyboard? =

Ja. Farbfelder nutzen Radiogroup-Semantik, Navigation per Pfeiltasten und sichtbare Fokus-Ringe.

= Does it work on mobile? =

Ja. Farbfelder bleiben im nativen Variationsformular mit fingerfreundlichen Zielen; es ist keine separate mobile App und kein Skript-Framework nötig.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es netzwerkweit oder auf einzelnen Websites; jede Website behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Farb- und Button-Felder auf einer einzelnen Produktseite.
2. Der Swatch-Einstellungsbildschirm im WooCommerce-Menü.

== External Services ==

Swatch stellt keine Verbindung zu externen Diensten her. Es werden keine ausgehenden HTTP-Anfragen gestellt, keine Remote-Skripte, Schriftarten oder CDN-Assets geladen und keine Telemetriedaten oder Analysen gesendet. Es gibt kein Konto und keinen API-Schlüssel.

Alles wird in deiner eigenen Datenbank gespeichert: der Farbfeldtyp pro Attribut, die globalen Standardwerte und eine Schema-Version liegen in den Optionen `swatch_attribute_types`, `swatch_settings` und `swatch_db_version`, und Farbe und Label jedes Begriffs werden als Begriffs-Meta `swatch_color` und `swatch_label` an deinen WooCommerce-Attributbegriffen gespeichert. Das Plugin versendet keine E-Mails.

== Translations ==

Plogins Swatch enthält deutsche, polnische und spanische Übersetzungen für die Plugin-Oberfläche. Die Textdomain ist `plogins-swatch`, sodass Sprachpakete von WordPress.org diese mitgelieferten Übersetzungen ebenfalls überschreiben oder erweitern können.

== Changelog ==

= 1.0.2 =
* Deutsche, polnische und spanische Übersetzungen für die Plugin-Oberfläche mitgeliefert.

= 1.0.1 =
* Erste stabile Version.

= 0.1.5 =
* Für einen eindeutigeren Plugin-Namen in Plogins Swatch für WooCommerce umbenannt.

= 0.1.4 =
* Swatch-Gruppenfilter `swatch/swatch_group_vars` und `swatch/swatch_group_classes` für PRO-Größen und -Formen.

= 0.1.3 =
* Filter pro Farbfeld (`swatch/product_swatch_html`, `swatch/archive_swatch_html`) und `swatch/swatch_items` für PRO-Tooltips und Add-ons.

= 0.1.2 =
* Fügt eine optionale Farbfeld-Vorschau in der Archiv-Schleife über die Filter `swatch/archive_enabled` und `swatch/archive_html` für Add-ons hinzu.

= 0.1.1 =
* Fügt den Filter `swatch/variation_gallery` hinzu und stellt `swatch_variation_gallery` im Variations-JSON für Add-ons bereit.

= 0.1.0 =
* Erstveröffentlichung.
