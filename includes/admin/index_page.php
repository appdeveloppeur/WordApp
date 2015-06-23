<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar_misc.php';
?>

	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php echo __( 'Welcome to ').APPNAME; ?></span></h3>

						<div class="inside">
							

<div style="width:100%;height:100%;height: 400px; float: none; clear: both; margin: 2px auto;">
  <embed src="<?php echo $activate->pubVideo; ?>?version=3&amp;hl=en_US&amp;rel=0&amp;autohide=1&amp;autoplay=0" wmode="transparent" type="application/x-shockwave-flash" width="100%" height="400px" allowfullscreen="true" title="Adobe Flash Player">
</div>
						<center>	<p><?php echo __('Welcome to ').APPNAME.__(', Convert your wordpress site/blog in to a mobile app & mobile site within minutes'); ?></p>
							
						<table style="width:100%;  text-align: center;">
							<tr>
								<td style="width:33%"><img src="<?php echo plugins_url(APPNAME.'/images/target.png'); ?>"><h3><?php echo __('Fast & Reliable');?></h3><?php echo __('Build your mobile app within minutes. It\'s as easy as 1-2-3');?></td>
								<td style="width:33%"><img src="<?php echo plugins_url(APPNAME.'/images/dev.png'); ?>"><h3><?php echo __('No programming skills.');?></h3><?php echo __('No programming skills needed. You don’t need to be a computer wiz-kid to use ').APPNAME;?></td>
								<td style="width:33%"><img src="<?php echo plugins_url(APPNAME.'/images/heart.png'); ?>"><h3><?php echo __('Our Community');?></h3><?php echo __('We started as a bunch of geek and now we have an amazing mobile rockstars community.');?></td>
							</tr>
							</table>
							<h1>The best part is : IT'S FREE</h1>
							</center>
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

						<h3><span><?php echo __(
									'Quick Links'
								); ?></span></h3>

						<div class="inside">
							<p>
							<ul>
								<li><a href="http://mobile-rockstar.com/"><?php echo APPNAME ?> <?php echo __('webiste') ?> </a></li>
								<li><a href="http://mobile-rockstar.com/forum/"><?php echo __('Mobile Marketing Community') ?> </a></li>
								<li><a href="http://mobile-rockstar.com/about/"><?php echo APPNAME ?> <?php echo __('About Mobile Rockstar') ?> </a></li>
								<li><a href="http://mobile-rockstar.com/changelog"><?php echo APPNAME ?> <?php echo __('Changelog') ?> </a></li>
							</ul>
							</p>
						</div>
					
						<!-- .inside -->

					</div>
					<!-- .postbox -->
				<div class="postbox" >

						<h3><span><?php echo __(
									'Latest News'
								); ?></span></h3>

						<div class="inside">
							<div style="height:400px; overflow:scroll;">
							<?php
	$json = file_get_contents('http://mobile-rockstar.com/?json_route=/posts');
	$pageList = json_decode($json,true);
 	//$pageItems =  $pageList['items']; 
 
 	 for ($i = 0; $i < count($pageList); ++$i) {
       ?>
       			  <div class="box" style="text-align: left;">
                         
                            <h4 class="boxH2"><?php echo $pageList[$i]['title'] ?></h4>
                            <p class="txtBox"><?php echo substr(strip_tags($pageList[$i]['content']),0,100)?>... 
							 <br>[<a href="app.post.php?page_id=<?php echo $pageList[$i]['ID'] ?>"><?php echo __('Read More'); ?></a>]
							 </p>
                            <div class="boxFoot"><span class="time"><?php echo $pageList[$i]['modified']; ?></span></div>
                        <hr></div>		
 	<?php
    		}
	?>
							</div>
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