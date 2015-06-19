<?php
if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
echo '
	<style>
	#preview {
	position: relative;
  display: block;
 height: 601px;
  width: 505px;
  background: url('.plugins_url(APPNAME.'/images/phone_frame.jpg').') center no-repeat;
  background-size: 60%;
  padding: 0px;
  margin: 0px;
  left: -139px;
}
#preview iframe {
  position: absolute;
  background: white;
  width: 238px;
  height: 417px;
  top: 85px;
  left: 136px;
  border-radius: 4px;
  overflow: hidden;
}	
.wordAppheader {
  padding: 30px 0 12px;
  margin: 0 20px;
  overflow: auto;
  
}
.wordApplogo {
  float: left;
  width: 190px;
  margin-top: 2px;
}
.wordAppsubscribe{
  float: right;
  margin: 10px 20px 0 0;
}
</style>		
';	

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
		   <input type="hidden" name="list[9]" value="signup" /><input type="hidden" name="listname[9]" value="List WordApp"/><div style="display:none"><input type="text" name="VerificationCodeX" value="" size="20"></div><input type=submit name="subscribe" value="<? echo __('Subscribe!');?>" 
	  </td>
	   </tr>
</table>
    
	   
	   </form></div>
	    <div style="float:left;text-align:center;margin-left: 140px;">
		     <?php
$activate = json_decode(file_get_contents("http://mobile-rockstar.com/app/activate.php?user=".get_bloginfo('admin_email')."&url=".urlencode(get_bloginfo('url'))."&longUrl=&format=json&noemail=yes"));	
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
		   <font color="red">You have <?php echo $activate->download; ?> free downloads</font>
		   <br />
		   <a href="admin.php?page=WordAppMoreDownloads">Get more free downloads</a>
		
	   
	   </div>
	</div>
         <div id="dashicons-admin-plugins" class="icon32"></div>
   

