=== Plogins Swatch - Variation Swatches for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, variation swatches, color swatches, variations, product attributes
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
Erfordert Plugins: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Ersetze WooCommerce-Variations-Dropdown-Menüs durch zugängliche Farb- und Beschriftungsfelder, die direkt mit dem nativen Variationsformular verknüpft werden.

== Description ==

Swatch ersetzt die Standard-Dropdown-Menüs „<select>“ von WooCommerce durch visuelle, zugängliche Farbfelder auf einzelnen Produktseiten. Wähle einen Farbfeldtyp pro Attribut (Farbpunkte oder Schaltflächen-/Beschriftungspillen) und weise pro Begriff eine Farbe oder Beschriftung zu.

Die Farbfelder steuern das eigene Variationsformular von WooCommerce, sodass Preis, Lagerbestand und die Schaltfläche „Zum Warenkorb hinzufügen“ genauso aktualisiert werden wie die Bestands-Dropdowns. Ausgewählte und nicht kombinierte Zustände werden automatisch wiedergegeben.

Die vollständige Quelle befindet sich auf GitHub unter https://github.com/wppoland/plogins-swatch, wenn du den Code lesen oder ein Problem melden möchten.

<strong>Funktionen</strong>

* Farb- und Schaltflächen-/Beschriftungsmustertypen.
* Auswahl des Typs pro Attribut auf dem globalen Attributbildschirm.
* Farbe pro Begriff („sanitize_hex_color“) und benutzerdefinierte Beschriftung, gespeichert als Begriffsmeta.
* Verbindungen in die native Variationsform von WooCommerce, kein jQuery, Vanilla JS.
* Tastaturbedienbar (Radiogruppensemantik, Pfeiltasten) und Bildschirmlesegerät beschriftet.
* Im Fokus sichtbare Ringe, ausreichender Kontrast, bewegungsreduziert, keine Layoutverschiebung.
* Eleganter Rückgriff auf das Standard-Dropdown-Menü, wenn ein Attribut keine Farbfelddaten enthält.
* Einstellungsseite unter WooCommerce: Aktivieren/Deaktivieren und Standard-Farbfeldtyp.

<strong>Eigenständig.</strong> Keine externen Dienste, kein Konto, keine Abhängigkeiten von Drittanbietern.

== Installation ==

1. Lade das Plugin nach „/wp-content/plugins/swatch“ hoch oder installiere es über Plugins → Neu hinzufügen.
2. Aktiviere es. WooCommerce muss aktiv sein.
3. Gehe zu WooCommerce → Swatch, um die Standardeinstellungen anzupassen.
4. Lege unter Produkte → Attribute eine Musterfarbe oder Beschriftung für jeden Attributbegriff fest.

== Frequently Asked Questions ==

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-swatch/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-swatch/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-swatch
* <strong>Fehlerberichte und Funktionsanfragen</strong> – https://github.com/wppoland/plogins-swatch/issues


= Does it require WooCommerce? =

Ja. Swatch erweitert die variablen Produkte von WooCommerce und macht nichts ohne.

= What happens to attributes I have not configured? =

Du behalten das Standard-Dropdown-Menü von WooCommerce bei. Farbfelder, für die keine Farben festgelegt sind, werden automatisch in das Dropdown-Menü verschoben, sodass nichts kaputt geht.

= Does it work without jQuery? =

Ja. Das Frontend ist Vanilla-JavaScript, das die eigenen Variationsereignisse von WooCommerce einbindet.

= Can shoppers pick variations with a keyboard? =

Ja. Farbfelder nutzen Radiogruppensemantik, Pfeiltastennavigation und sichtbare Fokusringe.

= Does it work on mobile? =

Ja. Farbfelder bleiben in der ursprünglichen Variationsform mit berührungsempfindlichen Zielen; Es ist keine separate mobile App oder ein Skript-Framework erforderlich.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es im Netzwerk oder auf einzelnen Websites. Jede Site behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Farb- und Schaltflächenmuster auf einer einzigen Produktseite.
2. Der Swatch-Einstellungsbildschirm im WooCommerce-Menü.

== External Services ==

Swatch stellt keine Verbindung zu externen Diensten her. Es werden keine ausgehenden HTTP-Anfragen gestellt, keine Remote-Skripte, Schriftarten oder CDN-Assets geladen und keine Telemetriedaten oder Analysen gesendet. Es gibt kein Konto oder API-Schlüssel.

Alles wird in deiner eigenen Datenbank gespeichert: Der Farbfeldtyp pro Attribut, die globalen Standardeinstellungen und eine Schemaversion werden in den Optionen „swatch_attribute_types“, „swatch_settings“ und „swatch_db_version“ gespeichert, und die Farbe und Beschriftung jedes Begriffs wird als Begriffsmeta „swatch_color“ und „swatch_label“ in deinen WooCommerce-Attributbegriffen gespeichert. Das Plugin sendet keine E-Mail.

== Changelog ==

= 1.0.1 =
* Erste stabile Version.

= 0.1.5 =
* Für einen eindeutigeren Plugin-Namen in Plogins Swatch für WooCommerce umbenannt.

= 0.1.4 =
* Swatch-Gruppenfilter „swatch/swatch_group_vars“ und „swatch/swatch_group_classes“ für PRO-Größen und -Formen.

= 0.1.3 =
* Filter pro Farbfeld („swatch/product_swatch_html“, „swatch/archive_swatch_html“) und „swatch/swatch_items“ für PRO-Tooltips und Add-ons.

= 0.1.2 =
* Füge eine optionale Archivschleifen-Farbfeldvorschau über die Filter „swatch/archive_enabled“ und „swatch/archive_html“ für Add-ons hinzu.

= 0.1.1 =
* Füge den Filter „swatch/variation_gallery“ hinzu und stelle „swatch_variation_gallery“ im Variations-JSON für Add-ons bereit.

= 0.1.0 =
* Erstveröffentlichung.
