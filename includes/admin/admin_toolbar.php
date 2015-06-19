<?php
if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
echo '
	<style>
	#preview {
position: relative;
  display: block;
  height: 826px;
  width: 608px;
  background: url('.plugins_url(APPNAME.'/images/phone_frame.jpg').') center no-repeat;
background-size: 60%;
  padding: 0px;
  margin: 0px;
  left: -134px;
  top: -52px;
}
#preview iframe {
   position: absolute;
  background: white;
  width: 284px;
  height: 480px;
  top: 175px;
  left: 165px;
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
.scroll-wrapper {
	-webkit-overflow-scrolling: touch;
  	overflow-y: scroll;

	/* important:  dimensions or positioning here! */
}
.spanHelp{
 float: right;
 font-weight: normal;
}
label {
  /* vertical-align: middle; */
  border-right: 0px solid #e5e5e5;
  /* width: 72%; */
  display: inline-block;
  /* zoom: 1; */
  margin: 0;
  padding: 9px 51px 34px 7px;

}
#submit {
  text-align: center!important;
  vertical-align: baseline;
  margin: 12px;
  width: 300px;
  height: 54px;
  font-size: 21px;
}
#submitPub {
  text-align: center!important;
  vertical-align: baseline;
  margin: 12px;
  width: 300px;
  height: 54px;
  font-size: 21px;
}
p.submit {
  text-align: center!important;
  }
</style>		
';	

	 if( isset( $_GET[ 'tab' ] ) ) {
             $active_tab = $_GET[ 'tab' ];
    							} 
?>
<div class="wrap">
   
   <div class="wordAppheader"><a href="<?php echo MAINURL; ?>" class="wordApplogo"><img  style="  width: 100%;" src="<?php echo plugin_dir_url(  ).APPNAME.'/images/logo.png'; ?>"></a> <div class="wordAppsubscribe">
	 <h3  style="margin:0px">Subscribe to our newsletter</h3>
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
    
	   
	   </form>
	   </div>
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
   
<h2 class="nav-tab-wrapper">
    
    <a href="?page=<?php echo APPNAME; ?>Builder&tab=" class="nav-tab <?php echo $active_tab == '' ? 'nav-tab-active' : ''; ?>"><?php echo __('Design'); ?></a>
    <a href="?page=<?php echo APPNAME; ?>Builder&tab=step2" class="nav-tab <?php echo $active_tab == 'step2' ? 'nav-tab-active' : ''; ?>"><?php echo __('Menus'); ?></a>
	<a href="?page=<?php echo APPNAME; ?>Builder&tab=slideshow" class="nav-tab <?php echo $active_tab == 'slideshow' ? 'nav-tab-active' : ''; ?>"><?php echo __('Slideshow'); ?></a>
    <a href="?page=<?php echo APPNAME; ?>Builder&tab=step3" class="nav-tab <?php echo $active_tab == 'step3' ? 'nav-tab-active' : ''; ?>"><?php echo __('App Structure'); ?></a>
    <a href="?page=<?php echo APPNAME; ?>Builder&tab=step4" style="background-color: #00a0d2;color: #fff;margin-left: 10%;" class="nav-tab <?php echo $active_tab == 'step4' ? 'nav-tab-active' : ''; ?>"><?php echo __('Publish App'); ?></a>
     <a href="?page=<?php echo APPNAME; ?>Builder&tab=step4" style="" id="previewApp" class="nav-tab <?php echo $active_tab == 'step4' ? 'nav-tab-active' : ''; ?>"><img src="<?php echo plugins_url( APPNAME.'/images/app20x20.png' )?>"></a>
   
	
</h2>
