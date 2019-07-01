<style>
.WWO-admin-main{
    height: auto;
    width: 100%;
}
#WWO-admin-form{
    background-color: #FAFAFA;
    height: auto;
    margin: 2%;
    padding: 1%;
    width: 92%;
}
#WWO-admin-form h2{
    font-size: 25px;
    color: #025DC6;
    margin-left: 5%;
}
.form-item{
    margin-left: 15%;
    padding: 1%;
}
</style>
<div class="WWO-admin-main">
    <div id="WWO-admin-form">
            <h2>Woo whatsapp order setting</h2>
            <hr style="margin-bottom: 4%; margin-top: 3%;"/>
            <form method="POST" action="">
    <?php
    if (isset($_REQUEST['woo_whatsapp_order_nonce'])) {
    if (isset($_REQUEST['woo_whatsapp_order_nonce']) && wp_verify_nonce($_REQUEST['woo_whatsapp_order_nonce'], 'woo_whatsapp_order_save')) {
        
        if (isset($_POST['update_options']))
        ?> 
        <div id="message" class="updated"><p><strong><?php _e('Settings saved.');?></strong></p></div>
        <?php
        //=========== whatsapp number value save
        if (isset($_POST['whatsappnumber'])) {
                update_option('whatsappnumber', sanitize_text_field($_POST['whatsappnumber']));
        }
        if (!empty($whatsappnumber) || @$whatsappnumber == '') {
            @$whatsappnumber = '';
            add_option('whatsappnumber', @$whatsappnumber);
        }
        //===========
        
        //=========== whatsapp message save
        if (isset($_POST['whatsappmessage'])) {
            update_option('whatsappmessage', sanitize_text_field($_POST['whatsappmessage']));
        }
        if (!empty($whatsappmessage) || @$whatsappmessage == '') {
            @$whatsappmessage = '';
            add_option('whatsappmessage', $whatsappmessage);
        }
        //===========
        
        
         //=========== Hide desktop button save
        if (isset($_POST['hidedesktop'])) {
            update_option('hidedesktop', sanitize_text_field($_POST['hidedesktop']));
        }
        if (!empty($hidedesktop) || @$hidedesktop == '') {
            @$hidedesktop = '';
            add_option('hidedesktop', $hidedesktop);
        }
        //===========
        
        // ===========Button text
        
        /**
         *   if (isset($_POST['whatsappbuttontxt'])) {
         *             update_option('whatsappbuttontxt', sanitize_text_field($_POST['whatsappbuttontxt']));
         *         }
         *         
         *     if (!empty($whatsappbuttontxt) || $whatsappbuttontxt == '') {
         *         $whatsappbuttontxt = '';
         *         add_option('whatsappbuttontxt', $whatsappbuttontxt);
         *         $whatsappbuttontxt= get_option('whatsappbuttontxt');
         *     }
         */
        
    
    } else {
        wp_die(__('Invalid nonce specified'));
    }
}
?>    
    <div>
     <table style="margin-left: 100px;">
       <tr><td>Your/store Whatsapp Number:*</td><td><input class="logo-input" type="text" id="whatsappnumber" name="whatsappnumber" value="<?php
echo get_option('whatsappnumber');;
?>" placeholder="+44123xxxxxx"/><br /><span style="
    font-size: 12px;
">Format: enter with country  code +44123xxxxxx</span></td></tr>
       <tr><td>Message:</td><td><input type="text" id="whatsappmessage" name="whatsappmessage" value="<?php
echo get_option('whatsappmessage');
?>" placeholder="Hi, i would like to buy" /></td></tr>
<tr><td>Hide Button on Desktop Device:</td><td>Yes <input type="Radio" name="hidedesktop" value="yes" <?php if(get_option('hidedesktop')=="yes") echo "checked"; ?>  />  No <input type="Radio" name="hidedesktop" value="no"  <?php if(get_option('hidedesktop')=="no") echo "checked"; ?> /> </td></tr>
     </table>
	<?php wp_nonce_field('woo_whatsapp_order_save', 'woo_whatsapp_order_nonce'); ?>
     <p style="margin-left: 500px;"><input type="submit" name="update_options" value="Update Options" class="button-primary" /></p>
        
    </form>
    </div>
</div>
</div>