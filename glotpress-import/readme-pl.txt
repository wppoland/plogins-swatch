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

Zastąp rozwijane listy odmian WooCommerce dostępnymi próbkami kolorów i etykiet, które podłączają się bezpośrednio do natywnego formularza odmian.

== Description ==

Swatch zastępuje domyślne rozwijane listy odmian `<select>` w WooCommerce wizualnymi, dostępnymi próbkami na stronach pojedynczych produktów. Wybierz typ próbki dla każdego atrybutu (kolorowe kropki albo pigułki z przyciskami/etykietami) i przypisz kolor lub etykietę do każdego terminu.

Próbki sterują natywnym formularzem odmian WooCommerce, więc cena, stan magazynowy i przycisk „dodaj do koszyka” aktualizują się dokładnie tak samo jak przy standardowych listach rozwijanych. Stany wybrane oraz niedostępne w danej kombinacji są odzwierciedlane automatycznie.

Pełny kod źródłowy jest dostępny na GitHubie pod adresem https://github.com/wppoland/plogins-swatch, jeśli chcesz przejrzeć kod lub zgłosić problem.

<strong>Funkcje</strong>

* Typy próbek: kolory oraz przyciski/etykiety.
* Wybór typu dla każdego atrybutu na ekranie atrybutów globalnych.
* Kolor dla każdego terminu (`sanitize_hex_color`) i własna etykieta, przechowywane jako meta terminu.
* Podłącza się do natywnego formularza odmian WooCommerce, bez jQuery, czysty JavaScript.
* Obsługa z klawiatury (semantyka radiogroup, klawisze strzałek) i etykiety dla czytników ekranu.
* Widoczne obramowanie fokusu, wystarczający kontrast, tryb ograniczonego ruchu, brak przeskoków układu.
* Płynne przejście do standardowej listy rozwijanej, gdy atrybut nie ma danych próbek.
* Strona ustawień w WooCommerce: włączanie/wyłączanie i domyślny typ próbki.

<strong>Samodzielny.</strong> Bez usług zewnętrznych, bez konta, bez zależności od podmiotów trzecich.

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/swatch` lub zainstaluj przez Wtyczki → Dodaj nową.
2. Włącz ją. WooCommerce musi być aktywne.
3. Przejdź do WooCommerce → Swatch, aby dostroić ustawienia domyślne.
4. W Produkty → Atrybuty ustaw kolor próbki lub etykietę dla każdego terminu atrybutu.

== Frequently Asked Questions ==

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-swatch/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-swatch/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-swatch
* <strong>Zgłoszenia błędów i propozycje funkcji</strong> - https://github.com/wppoland/plogins-swatch/issues


= Does it require WooCommerce? =

Tak. Swatch rozszerza produkty zmienne WooCommerce i bez niego nic nie robi.

= What happens to attributes I have not configured? =

Zachowują standardową listę rozwijaną WooCommerce. Próbki kolorów bez ustawionych kolorów automatycznie wracają do listy rozwijanej, więc nic nigdy się nie psuje.

= Does it work without jQuery? =

Tak. Front-end to czysty JavaScript, który podpina się pod własne zdarzenia odmian WooCommerce.

= Can shoppers pick variations with a keyboard? =

Tak. Próbki wykorzystują semantykę radiogroup, nawigację klawiszami strzałek i widoczne obramowanie fokusu.

= Does it work on mobile? =

Tak. Próbki pozostają w natywnym formularzu odmian, z celami wygodnymi w dotyku; nie jest wymagana osobna aplikacja mobilna ani framework skryptowy.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest kompatybilna z WordPress Multisite. Włącz ją dla całej sieci lub w poszczególnych witrynach; każda witryna zachowuje własne ustawienia i dane.

== Screenshots ==

1. Próbki kolorów i przycisków na stronie pojedynczego produktu.
2. Ekran ustawień Swatch w menu WooCommerce.

== External Services ==

Swatch nie łączy się z żadnymi usługami zewnętrznymi. Nie wysyła żadnych wychodzących żądań HTTP, nie ładuje zdalnych skryptów, czcionek ani zasobów CDN i nie wysyła żadnej telemetrii ani danych analitycznych. Nie ma konta ani klucza API.

Wszystko jest przechowywane w Twojej własnej bazie danych: typ próbki dla każdego atrybutu, globalne wartości domyślne i wersja schematu są zapisane w opcjach `swatch_attribute_types`, `swatch_settings` i `swatch_db_version`, a kolor i etykieta każdego terminu są przechowywane jako meta terminu `swatch_color` i `swatch_label` w terminach atrybutów WooCommerce. Wtyczka nie wysyła wiadomości e-mail.

== Translations ==

Plogins Swatch zawiera polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki. Domena tekstowa to `plogins-swatch`, więc pakiety językowe z WordPress.org mogą też nadpisywać lub rozszerzać te dołączone tłumaczenia.

== Changelog ==

= 1.0.2 =
* Dodano dołączone polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki.

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.1.5 =
* Zmieniono nazwę na Plogins Swatch dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.1.4 =
* Filtry grup próbek `swatch/swatch_group_vars` i `swatch/swatch_group_classes` dla rozmiarów i kształtów PRO.

= 0.1.3 =
* Filtry dla poszczególnych próbek (`swatch/product_swatch_html`, `swatch/archive_swatch_html`) i `swatch/swatch_items` dla podpowiedzi i dodatków PRO.

= 0.1.2 =
* Dodaje opcjonalny podgląd próbek w pętli archiwum przez filtry `swatch/archive_enabled` i `swatch/archive_html` dla dodatków.

= 0.1.1 =
* Dodaje filtr `swatch/variation_gallery` i udostępnia `swatch_variation_gallery` w JSON odmiany dla dodatków.

= 0.1.0 =
* Pierwsze wydanie.
