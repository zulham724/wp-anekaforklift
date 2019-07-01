<?php
    if (isset($_REQUEST['woo_whatsapp_order_pro_nonce'])) {
    if (isset($_REQUEST['woo_whatsapp_order_pro_nonce']) && wp_verify_nonce($_REQUEST['woo_whatsapp_order_pro_nonce'], 'woo_whatsapp_order_pro_save')) {
    ?> 
        <div class="w3-panel w3-green"><h3 style="color: #fff;"><?php _e('Settings saved.');?></h3></div>
        <?php
        
          $wwpoptions = array(
          //basic options 
          'whatsappnumber' => sanitize_text_field($_POST['whatsappnumber']),
          'hidedesktop' => sanitize_text_field($_POST['hidedesktop']),
		  'hideshow' => sanitize_text_field($_POST['hideshow']),
          //Product Settings options 
          'buttontext' => sanitize_text_field($_POST['buttontext']),
          'whatsappmessage' => sanitize_text_field($_POST['whatsappmessage']),
          //custom css
          'wwopcustomcss' => sanitize_text_field($_POST['wwopcustomcss'])
          );

        //=========== option saved and updates values
        if (isset($wwpoptions)) {
                update_option('wwopoption', $wwpoptions);
        }
        if (!empty($wwpoptions) || @$wwpoptions == '') {
            @$wwpoptions = '';
            add_option('wwopoption', @$wwpoptions);
        }
        //===========
    
		} else {
			wp_die(__('Invalid nonce specified'));
		}
	}
?>  