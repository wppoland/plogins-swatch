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

Reemplaza los menús desplegables de variaciones de WooCommerce por muestras de color y etiqueta accesibles que se conectan directamente al formulario de variaciones nativo.

== Description ==

Swatch reemplaza los menús desplegables `<select>` de variación predeterminados de WooCommerce por muestras visuales y accesibles en las páginas de producto individuales. Elige un tipo de muestra por atributo (puntos de color o píldoras de botón/etiqueta) y asigna un color o una etiqueta a cada término.

Las muestras controlan el propio formulario de variaciones de WooCommerce, por lo que el precio, el stock y el botón de añadir al carrito se actualizan exactamente igual que con los menús desplegables estándar. Los estados seleccionados y los que no están disponibles en la combinación se reflejan automáticamente.

El código fuente completo está en GitHub en https://github.com/wppoland/plogins-swatch, por si quieres leer el código o informar de un problema.

<strong>Características</strong>

* Tipos de muestra de color y de botón/etiqueta.
* Selección de tipo por atributo en la pantalla de atributos globales.
* Color por término (`sanitize_hex_color`) y etiqueta personalizada, almacenados como metadatos de término.
* Se conecta al formulario de variaciones nativo de WooCommerce, sin jQuery, JavaScript puro.
* Operable con teclado (semántica de radiogroup, teclas de flecha) y etiquetado para lectores de pantalla.
* Anillos de foco visibles, contraste suficiente, respeto por el movimiento reducido, sin saltos de diseño.
* Vuelta elegante al menú desplegable estándar cuando un atributo no tiene datos de muestra.
* Página de ajustes en WooCommerce: activar/desactivar y tipo de muestra por defecto.

<strong>Autónomo.</strong> Sin servicios externos, sin cuenta, sin dependencias de terceros.

== Installation ==

1. Sube el plugin a `/wp-content/plugins/swatch` o instálalo desde Plugins → Añadir nuevo.
2. Actívalo. WooCommerce debe estar activo.
3. Ve a WooCommerce → Swatch para ajustar los valores por defecto.
4. En Productos → Atributos, define un color de muestra o una etiqueta en cada término de atributo.

== Frequently Asked Questions ==

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-swatch/docs/
* <strong>Página del plugin</strong> - https://plogins.com/es/plogins-swatch/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-swatch
* <strong>Informes de errores y peticiones de funciones</strong> - https://github.com/wppoland/plogins-swatch/issues


= Does it require WooCommerce? =

Sí. Swatch amplía los productos variables de WooCommerce y no hace nada sin él.

= What happens to attributes I have not configured? =

Mantienen el menú desplegable estándar de WooCommerce. Las muestras de color sin colores configurados vuelven al menú desplegable automáticamente, así que nunca se rompe nada.

= Does it work without jQuery? =

Sí. El frontend es JavaScript puro que se conecta a los propios eventos de variación de WooCommerce.

= Can shoppers pick variations with a keyboard? =

Sí. Las muestras utilizan semántica de radiogroup, navegación con teclas de flecha y anillos de foco visibles.

= Does it work on mobile? =

Sí. Las muestras permanecen en el formulario de variaciones nativo con objetivos fáciles de tocar; no hace falta una aplicación móvil ni un framework de scripts aparte.


= Does this plugin work on WordPress Multisite? =

Sí. Este plugin es compatible con WordPress Multisite. Actívalo en toda la red o en sitios concretos; cada sitio conserva sus propios ajustes y datos.

== Screenshots ==

1. Muestras de color y de botón en una página de producto individual.
2. La pantalla de ajustes de Swatch en el menú de WooCommerce.

== External Services ==

Swatch no se conecta a ningún servicio externo. No realiza solicitudes HTTP salientes, no carga scripts, fuentes ni recursos CDN remotos y no envía telemetría ni analítica. No hay cuenta ni clave de API.

Todo se almacena en tu propia base de datos: el tipo de muestra por atributo, los valores por defecto globales y una versión de esquema se guardan en las opciones `swatch_attribute_types`, `swatch_settings` y `swatch_db_version`, y el color y la etiqueta de cada término se almacenan como los metadatos de término `swatch_color` y `swatch_label` en tus términos de atributo de WooCommerce. El plugin no envía ningún correo electrónico.

== Translations ==

Plogins Swatch incluye traducciones al polaco, alemán y español para la interfaz del plugin. El dominio de texto es `plogins-swatch`, así que los paquetes de idioma de WordPress.org también pueden sustituir o ampliar estas traducciones incluidas.

== Changelog ==

= 1.0.2 =
* Añadidas traducciones al polaco, alemán y español para la interfaz del plugin.

= 1.0.1 =
* Primera versión estable.

= 0.1.5 =
* Renombrado a Plogins Swatch para WooCommerce para un nombre de plugin más distintivo.

= 0.1.4 =
* Filtros de grupo de muestras `swatch/swatch_group_vars` y `swatch/swatch_group_classes` para tamaños y formas PRO.

= 0.1.3 =
* Filtros por muestra (`swatch/product_swatch_html`, `swatch/archive_swatch_html`) y `swatch/swatch_items` para tooltips y complementos PRO.

= 0.1.2 =
* Añade una vista previa opcional de muestras en el bucle de archivo mediante los filtros `swatch/archive_enabled` y `swatch/archive_html` para complementos.

= 0.1.1 =
* Añade el filtro `swatch/variation_gallery` y expone `swatch_variation_gallery` en el JSON de variación para complementos.

= 0.1.0 =
* Lanzamiento inicial.
