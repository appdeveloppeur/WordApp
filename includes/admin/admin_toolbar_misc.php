<?php
if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	 if( isset( $_GET[ 'tab' ] ) ) {
             $active_tab = $_GET[ 'tab' ];
    							} 
?>
<div class="wrap">
   
   <div class="wordAppheader"><a href="<?php echo MAINURL; ?>" class="wordApplogo"><img style="  width: 100%;" src="<?php echo plugin_dir_url(  ).APPNAME.'/images/logo.png'; ?>"></a> <div class="wordAppsubscribe">
	  <h3 style="margin:0px">Subscribe to our newsletter</h3>
	   <form method="post" target="_blank" action="http://app-developers.fr/lists/?p=subscribe&id=3" name="subscribeform">
	   <table border=0>
  <tr>
  <td class="attributeinput"><input type=text name=email value="" placeholder="<?php echo __('Your Email Address'); ?>" size="20" />
 	</td>
	<td class="attributeinput"><input type="hidden" name="htmlemail" value="1" />
            <input type="text" name="attribute1"  class="attributeinput" size="20" placeholder="<?php echo __('Your Name'); ?>" value="" /></td>
	   <td>
		   <input type="hidden" name="list[9]" value="signup" /><input type="hidden" name="listname[9]" value="List WordApp"/><div style="display:none"><input type="text" name="VerificationCodeX" value="" size="20"></div><input type=submit name="subscribe" value="<?php echo __('Subscribe!');?>" 
	  </td>
	   </tr>
</table>
    
	   
	   </form></div>
	    <div style="float:left;text-align:center;margin-left: 140px;">
		     <?php
		      if(get_option( 'wordapp_firstVisit' ) == "1"){ 
$activate = json_decode(file_get_contents("http://mobile-rockstar.com/app/activate.php?user=&url=".urlencode(get_bloginfo('url'))."&longUrl=&format=json&noemail=yes"));	
		  }
		   ?>
			
			<?php if($activate->modalActive == "on"){ ?>
		   <div style="" id="hiddenModalContent" style=";">
				<center><?php echo $activate->modal; ?>
				</center>
			
						</div>
		   
		   <style>
		   #hiddenModalContent{
		
		display: none!important
	}
</style>
		   <script type='text/javascript'>
   window.onload=function(){tb_show("Message from WordApp", "#TB_inline?inlineId=hiddenModalContent&height=400&width=400&modal=false", false);
						    $("#TB_window").width('440px');
						   }
</script>
		   
		 
	<?php 
		   }
		   ?>
		     
		   
 <?php  if(get_option( 'wordapp_firstVisit' ) == ""){  ?>
		   <div style="" id="firstVisit" style="display:none;">
				<center>
				<img  src="<?php echo plugin_dir_url(  ).APPNAME.'/images/logo.png'; ?>">
				<h1>Sorry for contacting you like this...</h1>
				<br />
				First of all let me welcome you to wordApp. The #1 free wordpress to mobile app converter.<br />
				<br />
				To get off on a good foot we would like to tell you how the app builder works and what information is needed.
				<br />
				You customize the app & content on your server. All information is updated through your wordpress server & site.<br />
				The actual app framework is built by 5 geeks in Europe & the U.S. <br />
				So, once you are finished "HIT" the publish button & we will do the geeky part for free.<br />
				For us to be able to offer you a demo & for us to be able to send you, your app updates via email we need your website address & your email to be sent to our server.
				<br />
				Your information is stored on a secure server & never shared.<br />
				By continuing to use WordApp this means you agree with the statement above.
				
				<p class="submit"><input type="submit" name="submit" id="hideModal" class="button button-primary button-hero" onclick="javascript:location.href='';" value="I Agree. Let's Get Started!"></p>
				<input class="button-secondary" type="submit" value="<?php echo __( 'No Thanks.' ); ?>"  onclick="location.href='index.php';"  />
				</center>
			
						</div>
		   
		   <style>
		   #hiddenModalContent{
		
		display: none!important
	}
</style>
		   <script type='text/javascript'>
 window.onload=function(){tb_show("Message from WordApp", "#TB_inline?inlineId=firstVisit&height=500&width=753&modal=false", false);
						   $("#TB_ajaxContent").width('720px');
						   }
</script>
		   
		 
	<?php 
	update_option( 'wordapp_firstVisit', '1' );
		   }
		   ?>
		   <font color="red">You have <?php echo $activate->download; ?> free downloads</font>
		   <br />
		   <a href="admin.php?page=WordAppMoreDownloads">Get more free downloads</a>
		
	   
	   </div>
	</div>
         <div id="dashicons-admin-plugins" class="icon32"></div>
   

