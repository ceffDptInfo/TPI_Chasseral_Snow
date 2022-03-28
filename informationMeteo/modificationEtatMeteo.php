<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- validation -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>

<?php
/***
 *  Plugin Name: chasseral snow TPI
 *  Plugin URI: http://localhost/TPI_chasseralSnow/
 *  Description: Faire des modifications sur l'affichage des météo sur le site de Chasseral Snow
 *  Version: 1.0
 *  Author: #
 *  Author URI: https://www.chasseral-snow.ch/
 */

//ajouter des fichier css et js pour de modification dans la page d'administration de plugin
function pluginStyle()
{
    wp_register_style('custom_wp_admin_css', plugin_dir_url(__FILE__) . 'css/admin-style.css', false, '1.0.0');
    wp_enqueue_style('custom_wp_admin_css');
}
add_action('admin_enqueue_scripts', 'pluginStyle');
function pluginJs() {
    wp_enqueue_script( 'adminPluginPageJs', plugin_dir_url(__FILE__) . 'js/admin-js.js', false , '1.0.0');
}

add_action( 'admin_enqueue_scripts', 'pluginJs' );

//creation des table de la base de données aprés l'activation de plugin
function creationDatabaseEnDure()
{
    $path = ABSPATH.'wp-content/plugins/informationMeteo/dataBase/';
    require_once($path . 'bs_meteo.php');
    require_once($path . 'bs_neige.php');
    require_once($path . 'bs_pistes.php');
    require_once($path . 'bs_webcam.php');
    require_once($path . 'bs_installations.php');
    require_once($path . 'bs_bulletin.php');
    require_once($path . 'bs_installations_active.php');
}
register_activation_hook(__FILE__, 'creationDatabaseEnDure');

function remove_chasseralSnow_db()
{
    global $wpdb;
    $table_name1 = $wpdb->prefix . "bs_meteo";
    $table_name2 = $wpdb->prefix . "bs_neige";
    $table_name3 = $wpdb->prefix . "bs_pistes";
    $table_name4 = $wpdb->prefix . "bs_webcam";
    $table_name5 = $wpdb->prefix . "bs_installations";
    $table_name6 = $wpdb->prefix . "bs_bulletin";
    $table_name7 = $wpdb->prefix . "bs_installations_active";
    $sql = "DROP TABLE IF EXISTS $table_name1, $table_name2, $table_name3, $table_name4, $table_name5, $table_name6, $table_name7";
    $wpdb->query($sql);

}
register_deactivation_hook(__FILE__, 'remove_chasseralSnow_db');

//////////////////////////////////
///
//ajouter une page PHP qui contient des shortcode
include('shortcode/shortcode_ge.php');
include('shortcode/shortcode_hr.php');
include('shortcode/shortcode_da.php');
include('shortcode/shortcode_tem.php');
include('shortcode/shortcode_met.php');
include('shortcode/shortcode_pst.php');
include('shortcode/shortcode_nge.php');
include('shortcode/shortcode_web.php');
include('shortcode/shortcode_text.php');
include('shortcode/shortcode_ins_act.php');

function stylePageCss()
{
    wp_enqueue_style('pageStyleCss', plugin_dir_url(__FILE__) . 'css/style.css', array(), '1.0.0', '');
}
add_action('wp_enqueue_scripts', 'stylePageCss');


//load la page wp-load.php
$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once($path . '/wp-load.php');
require_once($path . '/wp-config.php');
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');


function chasseralSnowMeteoChangeurPluginDashboard(){
    $page_title = 'chasseral snow meteo options';
    $menu_title = 'Changeur de meteo';
    $capatibily = 'manage_options';
    $slug = 'chasseralSnowMeteoChangeur';
    $callback = 'chasseralSnowMeteoChangeur_admin_html';
    $icon = 'dashicons-admin-site-alt3';
    $position = 60;

    add_menu_page($page_title, $menu_title, $capatibily, $slug, $callback, $icon, $position);
}

add_action('admin_menu', 'chasseralSnowMeteoChangeurPluginDashboard');

function chasseralSnowMeteoChangeur_admin_html(){
    $path = ABSPATH.'wp-content/plugins/informationMeteo/admin_html/';
    require_once($path . 'adminHtml.php');
}

?>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






