<?php
/*
 * Plugin Name: Woo whatsapp order
 * Plugin URI:  http://wpsenior.com/product/brown-berndaum/
 * Description: WooCommerce Order On Whatsapp it allows your customers to contact you and chat via Whatsapp directly from your wordpress/woocommerce products pages to the mobile. 
 * Version:     1.7.1
 * Author:      Junaid bhatti
 * Author URI:  http://wpsenior.com
 * License:     GPLv3
 */


define('WWOP_PATH', dirname(__FILE__));
define('WWOP_ASSETS_PATH', WWOP_PATH . 'assets/');
define('WWOP_URL', plugin_dir_url(__FILE__));
define('WWOP_ASSETS_URL', WWOP_URL . 'assets/');
include('class_wwop_main.php');
wwop::init();


//======== button when 0 or empty price
		function WWOP_whatsapp_price_empty( $price, $product ){
				if (! is_shop() && '' === $product->get_price()  ) {
					wwop::wwop_whatsapp_after_addtocart_button_func(0);
				} 
				return $price;
		}
		add_filter( 'woocommerce_get_price_html', 'WWOP_whatsapp_price_empty', 100, 2 );
		
//======== admin settings submneu mneu
		function WWOP_add_admin_menus()
		{
			add_options_page('Woo whatsapp order settings', 'Woo whatsapp order settings', 'manage_options', 'woo-whatsapp-order-page', 'WWOP_options_pages');
		}
		 function WWOP_settings_inits()
		{
			register_setting('pluginPage', 'WWOP_settings', 'validate_input');
		}
		function WWOP_options_pages()
		{
			include_once "inc/admin/admin_html.php";
		}
		add_action('admin_menu', 'WWOP_add_admin_menus');
		add_action('admin_init', 'WWOP_settings_inits');
?>