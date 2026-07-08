=== Plogins Swatch - Variation Swatches for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, variation swatches, color swatches, variations, product attributes
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
Wymaga wtyczek: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Zastąp listy rozwijane odmian WooCommerce dostępnymi próbkami kolorów i etykiet, które łączą się bezpośrednio z formularzem odmian natywnych.

== Description ==

Swatch zastępuje domyślną odmianę WooCommerce menu rozwijane „<select>” wizualnymi, dostępnymi próbkami na stronach pojedynczych produktów. Wybierz typ próbki według atrybutu (kolorowe kropki lub pigułki z guzikami/etykietami) i przypisz kolor lub etykietę do terminu.

Próbki sterują formularzem odmian WooCommerce, więc cena, stan magazynowy i przycisk „dodaj do koszyka” aktualizują się dokładnie tak samo, jak w przypadku list rozwijanych zapasów. Wybrane i niekombinowane stany są odzwierciedlane automatycznie.

Pełne źródło znajduje się na GitHubie pod adresem https://github.com/wppoland/plogins-swatch, jeśli chcesz przeczytać kod lub zgłosić problem.

<strong>Funkcje</strong>

* Typy próbek kolorów i przycisków/etykiet.
* Wybór typu atrybutu na ekranie atrybutu globalnego.
* Kolor według terminu („sanitize_hex_color”) i etykieta niestandardowa, przechowywane jako meta terminów.
* Łączy się z natywną formą odmian WooCommerce, bez jQuery, waniliowy JS.
* Możliwość obsługi klawiatury (semantyka grupy radiowej, klawisze strzałek) i czytnik ekranu z etykietą.
* Widoczne pierścienie ostrości, wystarczający kontrast, ograniczenie ruchu, brak zmiany układu.
* Płynny powrót do standardowego menu rozwijanego, gdy atrybut nie zawiera danych próbki.
* Strona ustawień w WooCommerce: włącz/wyłącz i domyślny typ próbki.

<strong>Samodzielny.</strong> Żadnych usług zewnętrznych, żadnego konta, żadnych zależności od stron trzecich.

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/swatch` lub zainstaluj poprzez Wtyczki → Dodaj nową.
2. Aktywuj. WooCommerce musi być aktywny.
3. Przejdź do WooCommerce → Próbka, aby dostroić ustawienia domyślne.
4. W Produkty → Atrybuty ustaw kolor próbki lub etykietę dla każdego terminu atrybutu.

== Frequently Asked Questions ==

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-swatch/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-swatch/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-swatch
* <strong>Raporty o błędach i prośby o nowe funkcje</strong> - https://github.com/wppoland/plogins-swatch/issues


= Does it require WooCommerce? =

Tak. Swatch rozszerza zmienne produkty WooCommerce i bez nich nic nie robi.

= What happens to attributes I have not configured? =

Zachowują standardowe menu WooCommerce. Próbki kolorów bez ustawionych kolorów automatycznie wracają do listy rozwijanej, więc nic się nie psuje.

= Does it work without jQuery? =

Tak. Frontend to waniliowy JavaScript, który przechwytuje własne zdarzenia wariacyjne WooCommerce.

= Can shoppers pick variations with a keyboard? =

Tak. Próbki wykorzystują semantykę grup radiowych, nawigację za pomocą klawiszy strzałek i widoczne pierścienie ostrości.

= Does it work on mobile? =

Tak. Próbki pozostają w natywnych odmianach z celami dotykowymi; nie jest wymagana osobna aplikacja mobilna ani platforma skryptowa.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest kompatybilna z WordPress Multisite. Aktywuj go w sieci lub aktywuj na poszczególnych stronach; każda witryna przechowuje własne ustawienia i dane.

== Screenshots ==

1. Próbki kolorów i guzików na jednej stronie produktu.
2. Ekran ustawień Swatch w menu WooCommerce.

== External Services ==

Firma Swatch nie łączy się z żadnymi usługami zewnętrznymi. Nie wysyła żadnych wychodzących żądań HTTP, nie ładuje zdalnych skryptów, czcionek ani zasobów CDN i nie wysyła żadnych danych telemetrycznych ani analiz. Nie ma konta ani klucza API.

Wszystko jest przechowywane w Twojej własnej bazie danych: typ próbki według atrybutu, globalne wartości domyślne i wersja schematu są przechowywane w opcjach `swatch_attribute_types`, `swatch_settings` i `swatch_db_version`, a kolor i etykieta każdego terminu są przechowywane jako meta terminów `swatch_color` i `swatch_label` w terminach atrybutów WooCommerce. Wtyczka nie wysyła wiadomości e-mail.

== Changelog ==

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.1.5 =
* Zmieniono nazwę na Plogins Swatch dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.1.4 =
* Filtry grup próbek `swatch/swatch_group_vars` i `swatch/swatch_group_classes` dla rozmiaru i kształtów PRO.

= 0.1.3 =
* Filtry dla poszczególnych próbek („próbka/produkt_próbka_html”, „próbka/archiwum_próbka_html”) i „próbka/elementy_próbki” dla podpowiedzi i dodatków PRO.

= 0.1.2 =
* Dodaj opcjonalny podgląd próbek w pętli archiwum za pomocą filtrów `swatch/archive_enabled` i `swatch/archive_html` dla dodatków.

= 0.1.1 =
* Dodaj filtr `swatch/variation_gallery` i udostępnij `swatch_variation_gallery` w odmianie JSON dla dodatków.

= 0.1.0 =
* Pierwsze wydanie.
