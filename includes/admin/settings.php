<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar_misc.php';
?>

	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php echo __( 'Settings ').APPNAME; ?></span></h3>

						<div class="inside">
							
							<form method="post" action="options.php">
    <?php  
    		$varGA = (array)get_option( 'WordApp_ga' );
 			settings_fields( 'WordApp_main_ga' );
  	?>
	<h3>Google Analytics</h3>
								
	<hr>	
	<?php echo __('Add your Google Analytics tracking ID below. Get more information about your app downloads, views & activity. '); ?>								
								<a href="https://support.google.com/analytics/answer/2614741?hl=en-GB"><?php echo __('Setup a google tracking ID here');?></a><p>  	<label for="WordApp_GA[Color]"><?php echo __('Google Analytics ID' ); ?></label>
 	<input type="text" id="WordAppGA_GA" name="WordApp_ga[google]"  placeholder="UA-XXXXXXXX-X" value="<?php echo $varGA['google']; ?>"/></p>
	
	<h3>API credentials</h3>							
	<hr>
	<?php echo __('If you have subscribed for push notifications you will be sent API credentials via email.'); ?>							
	<p>  	<label for="WordApp_GA[apiLogin]"><?php echo __('API Login' ); ?></label>
 	<input type="text" id="WordAppGA_apiLogin" name="WordApp_ga[apiLogin]"  value="<?php echo $varGA['apiLogin']; ?>"/></p>
	
	<p>  	<label for="WordApp_GA[apiKey]"><?php echo __('API Key' ); ?></label>
 	<input type="text" id="WordAppGA_apiKey" name="WordApp_ga[apiKey]"  value="<?php echo $varGA['apiKey']; ?>"/></p>
	
	<?php submit_button(); ?>
   
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">


						<div class="inside">
							<p>
							 <?php include plugin_dir_path( __FILE__ ).'more_info.php'; ?>
							</p>
						</div>
					
						<!-- .inside -->

					</div>
					<!-- .postbox -->
				

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->
<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>

<style>
	.message_invite{
		font-family: "Open Sans","lucida grande","Segoe UI",arial,verdana,"lucida sans unicode",tahoma,sans-serif;
  		font-size: 13px;
  		color: #3d464d;
  		font-weight: normal;
		text-align: center;
	}

	</style>