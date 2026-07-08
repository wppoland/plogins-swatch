=== Plogins Swatch - Variation Swatches for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, variation swatches, color swatches, variations, product attributes
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
Requiere complementos: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Reemplace los menús desplegables de variaciones de WooCommerce con muestras de etiquetas y colores accesibles que se conectan directamente al formulario de variaciones nativas.

== Description ==

Swatch reemplaza los menús desplegables de variación predeterminados de WooCommerce `<select>` con muestras visuales y accesibles en páginas de productos individuales. Elija un tipo de muestra por atributo (puntos de color o botones/píldoras de etiquetas) y asigne un color o etiqueta por término.

Las muestras impulsan el formulario de variaciones propio de WooCommerce, por lo que el precio, el stock y el botón de añadir al carrito se actualizan exactamente como lo hacen con los menús desplegables de stock. Los estados seleccionados y no combinados se reflejan automáticamente.

La fuente completa se encuentra en GitHub en https://github.com/wppoland/plogins-swatch si desea leer el código o informar un problema.

<strong>Características</strong>

* Tipos de muestras de colores y botones/etiquetas.
* Selección de tipo por atributo en la pantalla de atributos globales.
* Color por término (`sanitize_hex_color`) y etiqueta personalizada, almacenados como término meta.
* Se conecta al formulario de variaciones nativas de WooCommerce, sin jQuery, Vanilla JS.
* Teclado operable (semántica de radiogrupo, teclas de flecha) y lector de pantalla etiquetado.
* Anillos de enfoque visible, contraste suficiente, movimiento reducido, sin cambios de diseño.
* Regreso elegante al menú desplegable estándar cuando un atributo no tiene datos de muestra.
* Página de configuración en WooCommerce: habilitar/deshabilitar y tipo de muestra predeterminado.

<strong>Autónomo.</strong> Sin servicios externos, sin cuenta, sin dependencias de terceros.

== Installation ==

1. Cargue el complemento en `/wp-content/plugins/swatch`, o instálelo a través de Complementos → Añadir nuevo.
2. Actívalo. WooCommerce debe estar activo.
3. Vaya a WooCommerce → Swatch para ajustar los valores predeterminados.
4. En Productos → Atributos, establezca un color de muestra o una etiqueta en cada término de atributo.

== Frequently Asked Questions ==

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-swatch/docs/
* <strong>Página de complementos</strong> - https://plogins.com/es/plogins-swatch/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-swatch
* <strong>Informes de errores y solicitudes de funciones</strong> - https://github.com/wppoland/plogins-swatch/issues


= Does it require WooCommerce? =

Sí. Swatch amplía los productos variables de WooCommerce y no hace nada sin ellos.

= What happens to attributes I have not configured? =

Mantienen el menú desplegable estándar de WooCommerce. Las muestras de color sin colores configurados vuelven al menú desplegable automáticamente, por lo que nada se rompe.

= Does it work without jQuery? =

Sí. La interfaz es JavaScript básico que conecta los propios eventos de variación de WooCommerce.

= Can shoppers pick variations with a keyboard? =

Sí. Las muestras utilizan semántica de radiogrupos, navegación con teclas de flecha y anillos de enfoque visibles.

= Does it work on mobile? =

Sí. Las muestras permanecen en la forma de variaciones nativas con objetivos fáciles de tocar; no se requiere una aplicación móvil o un marco de script por separado.


= Does this plugin work on WordPress Multisite? =

Sí. Este complemento es compatible con WordPress Multisite. Activarlo en red o activarlo en sitios individuales; Cada sitio mantiene su propia configuración y datos.

== Screenshots ==

1. Muestras de colores y botones en una sola página de producto.
2. La pantalla de configuración de Swatch en el menú WooCommerce.

== External Services ==

Swatch no se conecta a ningún servicio externo. No realiza solicitudes HTTP salientes, no carga scripts, fuentes o activos CDN remotos y no envía telemetría ni análisis. No hay cuenta ni clave API.

Todo se almacena en su propia base de datos: el tipo de muestra por atributo, los valores predeterminados globales y una versión de esquema se guardan en las opciones `swatch_attribute_types`, `swatch_settings` y `swatch_db_version`, y el color y la etiqueta de cada término se almacenan como el meta de términos `swatch_color` y `swatch_label` en sus términos de atributos de WooCommerce. El complemento no envía ningún correo electrónico.

== Changelog ==

= 1.0.1 =
* Primera versión estable.

= 0.1.5 =
* Renombrado a Plogins Swatch para WooCommerce para obtener un nombre de complemento más distintivo.

= 0.1.4 =
* El grupo de muestras filtra `swatch/swatch_group_vars` y `swatch/swatch_group_classes` para tamaños y formas PRO.

= 0.1.3 =
* Filtros por muestra (`swatch/product_swatch_html`, `swatch/archive_swatch_html`) y `swatch/swatch_items` para información sobre herramientas y complementos PRO.

= 0.1.2 =
* Añade una vista previa de muestra de bucle de archivo opcional a través de los filtros `swatch/archive_enabled` y `swatch/archive_html` para complementos.

= 0.1.1 =
* Añade el filtro `swatch/variation_gallery` y exponga `swatch_variation_gallery` en la variación JSON para complementos.

= 0.1.0 =
* Lanzamiento inicial.
