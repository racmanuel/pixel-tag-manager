<?php
/*
 * Plugin Name: WordPress Tag Manager
 * Description: Crea un menú de configuración para que insertes los ID de tu Pixel de Facebook y Google Analytics, Google Tag Manager
 * Author: Manuel Ramírez Coronel
 * Author URI: https://github.com/racmanuel
 * Version: 1.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action("admin_menu", "plugin_menu");

function plugin_menu() {
  add_options_page(
    'WordPress Tag Manager', 
    'WordPress Tag Manager', 
    'manage_options', 
    'wordpress_tag_manager', 
    'registrar_tags'
  );
}

function registrar_tags() { 
  if (!current_user_can('manage_options')){
        wp_die( __('You do not have sufficient permissions to access this page.') );
  }else{
    if($_POST && $_POST['ID_Pixel_FB']) {
      $texto = $_POST['ID_Pixel_FB'];
      if(update_option('Pixel_FB', $texto)) {
        echo '<p>Las etiquetas han sido activadas.</p>';
      } else {
        echo '<p>No se pudo configurar las etiquetas.</p>';
      }
    }
    include('formulario.php');
  }
}

add_action('wp_head', 'agregar_en_head');

function agregar_en_head() {
  if($pixel_fb = get_option('Pixel_FB')) {
    ?>
<!-- Facebook Pixel Code -->
<script>
  ! function (f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function () {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo $pixel_fb;?>');
  fbq('track', 'PageView');
</script>
<noscript>
  <img height="1" width="1" src="https://www.facebook.com/tr?id='<?php echo $pixel_fb?>'&ev=PageView
&noscript=1" />
</noscript>
<!-- End Facebook Pixel Code -->
    <?php
  }
}
?>