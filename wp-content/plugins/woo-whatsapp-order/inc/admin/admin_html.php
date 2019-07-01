<?php include('form_post_data.php'); 
$wwoption = get_option( 'wwopoption');
?>
<div class="w3-container w3-col m8 WWOP">
  <h1>Woo whatsapp order settings</h1>
  
  <!-- Tabs menu  -->
  <div class="w3-bar w3-black">
     <button class="w3-bar-item w3-button tablink w3-green" onclick="openTab(event,'WWOPBasic')">Basic</button>
     <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'WWOPProductss')">Product Settings</button>
     <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'WWOPCart')">Cart Settings</button>
     <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'WWOPSG')">Shortcode Generator</button>
     <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'WWOPCss')">Custom css</button>
	 <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'WWOPPs')">Page Speed</button>
  </div>
  <!-- End Tabs menu  -->
  <form action="" method="POST">
  <!-- Basic Tab --> 
  <div id="WWOPBasic" class="w3-container w3-border tab">
  <div class="w3-col m6">
  <h2>Basic</h2>
    <p>      
    <label class="w3-text-grey"><b>Your/store Whatsapp Number:*</b></label>
    <input class="w3-input w3-border" value="<?php echo $wwoption['whatsappnumber']; ?>" name="whatsappnumber" type="text" placeholder="+44123xxxxxx" required/>Format: enter with country code +44123xxxxxx</p>
    
    
   

 <label class="w3-text-grey">Hide Button on Desktop Device</label><br /><br />
  
<input class="w3-radio" type="Radio" name="hidedesktop" value="yes" <?php if($wwoption['hidedesktop']=="yes") echo "checked"; ?>  />
<label>Yes</label>
<input class="w3-radio" type="Radio" name="hidedesktop" value="no"  <?php if($wwoption['hidedesktop']=="no") echo "checked"; ?> />
<label>No</label>
<br /><br />

<label class="w3-text-grey">Display Float icon</label><br /><br />
  
<input class="w3-radio" type="Radio" name="hideshow" value="yes" <?php if(@$wwoption['hideshow']=="yes") echo "checked"; ?>  />
<label>Yes</label>
<input class="w3-radio" type="Radio" name="hideshow" value="no"  <?php if(@$wwoption['hideshow']=="no") echo "checked"; ?> />
<label>No</label>
<br /><br />


</div>
  </div>
  
    <!-- End Basic Tab --> 
    
    <!-- Productss Tab -->
    
  <div id="WWOPProductss" class="w3-container w3-border tab" style="display:none">
  <div class="w3-col m6">
  <h2>Product Settings</h2>
   <p>      
    <label class="w3-text-grey"><b>Button Text</b></label>
    <input class="w3-input w3-border" value="<?php echo $wwoption['buttontext']; ?>" name="buttontext" type="text" placeholder="Order on Whatsapp"/></p>
  
    <p>      
<label class="w3-text-grey">Message</label>
<textarea class="w3-input w3-border" style="resize:none;" name="whatsappmessage" placeholder="Hi, i would like to buy"><?php echo $wwoption['whatsappmessage'];?></textarea>
</p>
<p>
<a target="_blank" href="https://wpsenior.com/coming-soon/"><img src="<?php echo plugins_url( 'img/Screenshot_2.png' , __FILE__ ) ?>"><a/>
</p>


    </div>
  </div>
  <!-- End Productss Tab -->
  
  <!--  Cart settings Tab -->
  
  <div id="WWOPCart" class="w3-container w3-border tab" style="display:none">
  <div class="w3-col m6">
  <h2>Cart Settings</h2>
  
    <p>
<a target="_blank" href="https://wpsenior.com/coming-soon/"><img src="<?php echo plugins_url( 'img/Screenshot_3.png' , __FILE__ ) ?>"><a/>
</p>
  
    </div>
  </div>
  
  <!-- End Cart settings Tab -->
  
  <!--  Shortcode Generator Tab -->
  
  <div id="WWOPSG" class="w3-container w3-border tab" style="display:none">
  <div class="w3-col m6">
  <h2>Shortcode Generator</h2>
  <p style="color: #000;">Shortcode use every where post / pages etc..</p>
   <p style="color: #000;">      
    <label class="w3-text-grey"><b>Number</b></label>
    <input class="w3-input w3-border" id="wwopnum" type="text" oninput="wwopshortcode();"  type="text" placeholder="Whatsapp Number"/>
    Format: enter with country code +44123xxxxxx
    </p>
  
 <p>      
    <label class="w3-text-grey"><b>Button Text</b></label>
    <input class="w3-input w3-border" id="wwoptext" type="text" oninput="wwopshortcode();"  type="text" placeholder="Contact On whatsApp"/></p>
    
     <p>      
    <label class="w3-text-grey"><b>Message Text</b></label>
    <input class="w3-input w3-border" id="wwopmsg" type="text" oninput="wwopshortcode();" type="text" placeholder="Hi, may can i help you?"/></p>



    </div>
    <div class="w3-col m6"><div style="padding-top: 64px;"><p style="color: #000;">Generated Shortcode</p></div><textarea id="wwopSG" style="height: 209px;" class="w3-input w3-border" readonly="readonly"></textarea></div>
  </div>
  
  <script>


    function wwopshortcode() {
    	if(document.getElementById('wwopnum').value){
      var myNum = 'num="'+document.getElementById('wwopnum').value+'"'; 
	}else{var myNum = "";}
    	if(document.getElementById('wwoptext').value){
      var myText = ' btntext="'+document.getElementById('wwoptext').value+'"';
	}else{var myText = "";}
    	if(document.getElementById('wwoptext').value){
      var myMsg = ' msg="'+document.getElementById('wwopmsg').value+'"';
	}else{var myMsg = "";}
    
        var wwopnum = myNum;
        var wwoptxt = myText;
        var wwopmsg = myMsg;

        var myResult1 = '[wwo ' +wwopnum+wwoptxt+wwopmsg+']';
          document.getElementById("wwopSG").value = myResult1;

    }
</script>
  
  
  <!-- Shortcode Generator Tab -->
  
  
  <!--  custom css Tab -->
  <div id="WWOPCss" class="w3-container w3-border tab" style="display:none">
    <h2>Custom Css</h2>
       <p>      
<label class="w3-text-grey">Add Css Code</label>
<textarea style="height: 300px;" class="w3-input w3-border"  name="wwopcustomcss"><?php echo $wwoption['wwopcustomcss'];?></textarea>
</p>
  </div>
  
  <!-- End custom css Tab -->
  
  
  <!--  Page speed Tab -->
  <div id="WWOPPs" class="w3-container w3-border tab" style="display:none">
    <h2>Speed Optimize Your Wordpress Site </h2>
<p>
<a target="_blank" href="http://bit.ly/2PUbdBG"><img style="width:80%;"src="<?php echo plugins_url( 'img/Picture3.jpg' , __FILE__ ) ?>"><a/>
</p>
  </div>
  
  <!-- End page speed Tab -->
  
   <p>
    <?php wp_nonce_field('woo_whatsapp_order_pro_save', 'woo_whatsapp_order_pro_nonce'); ?>
    <button type="submit" class="w3-btn w3-green" name="update_options">Update Options</button></p>  
	<br/><br/>
	<h2> Contact for support <a href="https://wpsenior.com/contact-us/">Contact Us </a><h2/>
</div>
</form>



