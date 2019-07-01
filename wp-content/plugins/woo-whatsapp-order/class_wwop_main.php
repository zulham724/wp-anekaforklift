<?php 

	//Main class
	class wwop{
		//=============Admin Notice    
		public static function wwop_admin_notice()
		{
			echo "<div class='error'><p><strong>Woo whatsapp order</strong> requires <strong> Wooommerce plugin</strong> </p></div>";
		}
		//=============Frontend Call css js files
		public static function wwop_files(){
			wp_register_style('WWOP-css', WWOP_URL.'assets/css/style.css',array(), '1.1', 'all');
			wp_enqueue_style('WWOP-css');
		}
		//======Admin css hook
		public static function wwopA_files(){
			wp_register_style('WWOPA-css', WWOP_URL.'inc/admin/style.css',array(), '1.1', 'all');
			wp_enqueue_style('WWOPA-css');
			wp_enqueue_script('WWOPA-js', WWOP_URL.'inc/admin/js/wwop_custom.js',array(), '1.1', 'all');
		}
		//=============woocommerce check activation hook 
		private static function wwop_check_admin_notice(){
			if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
			add_action('admin_notices', array(__CLASS__,'WWOP_admin_notice'));
			}
		}

        //===========Float icon=============
		public static function float_icon(){
			$wwoption                     = get_option('wwopoption');	
			$whatsappnumber              = $wwoption['whatsappnumber'];
			$whatsappnumber              = $whatsappnumber ? $whatsappnumber : "";
			$whatsappnumberremovespecial = preg_replace('/[^A-Za-z0-9\-]/', '', $whatsappnumber);
			?>
				<a href="https://api.whatsapp.com/send?phone=<?php echo $whatsappnumberremovespecial; ?>" class="wwofloat" target="_blank">
				<svg width="32px" height="32px" aria-hidden="true" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp fa-w-14 wwofloatm" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg>
				</a>
		<?php
		}
		
		//=============woocommerce add button hook funcation
  
		public static function wwop_whatsapp_after_addtocart_button_func($atts, $content = null){
		$wwoption = get_option( 'wwopoption');
	       ?> 
			  <style>
					<?php if($wwoption['hidedesktop']=="yes"){ ?>
					 .styledefult {display:none;}
					@media screen and (max-width: 768px){
						.styledefult {display:block!important;}
					}
					<?php } 
					echo $wwoption['wwopcustomcss'];
					?>
			</style>
	
			
		   <?php
			//====get values from admin
			$whatsappnumber              = $wwoption['whatsappnumber'];
			$whatsappnumber              = $whatsappnumber ? $whatsappnumber : "";
			$whatsappnumberremovespecial = preg_replace('/[^A-Za-z0-9\-]/', '', $whatsappnumber);
			$whatsappmessage             = $wwoption['whatsappmessage'];
			$whatsappmessage             = $whatsappmessage ? $whatsappmessage : "Hi, i would like to buy";
			$whatsapptext                = $wwoption['buttontext'];
			$whatsapptext                = $whatsapptext ? $whatsapptext : "Order on Whatsapps";
			if ($whatsappnumber) {
				
					echo '<div class="styledefult hidedesktop"><a href="https://api.whatsapp.com/send?phone=' . $whatsappnumberremovespecial . '&text=' . $whatsappmessage . '%20' . get_the_title() . '%20' . get_the_permalink() . '" class=" azm-social azm-btn azm-pill azm-shadow-bottom azm-whatsapp"><svg width="24px" height="24px" aria-hidden="true" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg> ' . $whatsapptext . '</a></div>';     
			}
		}
        
        
        //======== Shortcode button
        
        public static function wwop_shortcode( $atts, $content = null ) {
        $wwoption = get_option( 'wwopoption');
            $wwopsg = shortcode_atts( array(
                'num' => '',
                'btntext'  =>  '',
                'msg'  =>  ''
            ), $atts );
            
                $whatsappnumber              = $wwopsg['num'];
                $whatsappnumber              = $whatsappnumber ? $whatsappnumber : $wwoption['whatsappnumber'];;
                $whatsappnumberremovespecial = preg_replace('/[^A-Za-z0-9\-]/', '', $whatsappnumber);
                $whatsappmessage             = $wwopsg['msg'];
                $whatsappmessage             = $whatsappmessage ? $whatsappmessage : "Hi, may can i help you?";
                $whatsapptext                = $wwopsg['btntext'];
                $whatsapptext                = $whatsapptext ? $whatsapptext : "Contact On whatsApp";
    return '<div class="styledefult hidedesktop"><a href="https://api.whatsapp.com/send?phone=' . $whatsappnumberremovespecial . '&text=' . $whatsappmessage . '%20" class=" azm-social azm-btn azm-pill azm-shadow-bottom azm-whatsapp"><svg width="24px" height="24px" aria-hidden="true" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg> ' . $whatsapptext . '</a></div>';
}
        
        
		//======= Wooommerce actions add to cart after add buttonm
		public static function wwop_check_active_woo_hook(){
			
			if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    
			add_action('woocommerce_after_add_to_cart_button', array(__class__,'wwop_whatsapp_after_addtocart_button_func'));
            add_shortcode( 'wwo', 	 array(__class__,'wwop_shortcode' ));
	$wwoption = get_option('wwopoption');	
				if($wwoption['hideshow']=='yes'){
					add_action( 'wp_footer', 	 array(__class__,'float_icon' ));
				}elseif($wwoption['hideshow']=='no'){
					remove_action( 'wp_footer', 	 array(__class__,'float_icon' ));
				}
			}
		}
		//init
		static function init(){
			add_action( 'wp_enqueue_scripts', array(__CLASS__,'wwop_files'));
			add_action( 'admin_enqueue_scripts', array(__CLASS__,'wwopA_files'));
			self::wwop_check_admin_notice();
			self::wwop_check_active_woo_hook();
			
			
		}
	}
?>