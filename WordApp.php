<?php
/*
  Plugin Name: WordApp - Wordpress to Mobile App for Free
  Plugin URI: http://mobile-rockstar.com/
  Description: Convert your wordpress site/blog in to a mobile app for Free. 
  Version:0.1
  Author:Mobile-Rockstar.com
  Author URI: http://mobile-rockstar.com/
  License: GPLv3
  Copyright: Mobile Rockstar
*/
define('APPNAME', 'WordApp-master');
define('PLUGIN_URL', 'http://mobile-rockstar.com/app/main/app.php');

require_once dirname( __FILE__ ) . '/third/class-tgm-plugin-activation.php';

class WordAppClass
{


static private $class = null;

 

  function __construct()
	{
		// actions
		add_action('init', array($this, 'init'), 1);
		
		/*- import needed scripts & styles -*/
		wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script('jquery');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('wptuts-upload');
       
        /*- actions & filters -*/
		add_action( 'admin_enqueue_scripts', array($this, 'WordApp_add_color_picker'));
		add_filter( 'json_prepare_post',  array($this, 'api_to_wordapp'), 10, 3 );
		add_action( 'admin_menu',  array($this, 'register_WordApp_menu') );
		add_action( 'admin_init',  array($this, 'WordAppSettingValues') );
		add_action('init', array($this, 'produce_my_json'));
	  	add_action( 'tgmpa_register', array($this, 'include_wp_rest_api'));
		
		 /*- WP REST API -*/
		//$this->include_wp_rest_api();
	}

  
/* -- On install  -- */
function WordApp_activate() {

	 //file_get_contents("http://mobile-rockstar.com/app/activate.php?user=".get_bloginfo('admin_email')."&url=".urlencode(get_bloginfo('url'))."&longUrl=&format=json");
}

/* ----  Admin Pages ------ */
function WordAppHomepage(){

	include plugin_dir_path( __FILE__ ).'includes/admin/index_page.php';
}
function WordAppBuilder(){

	//echo "hello";
	include plugin_dir_path( __FILE__ ).'includes/admin/home.php';
}
function WordAppPN(){

			include plugin_dir_path( __FILE__ ).'includes/admin/push_notes.php';
}

function WordAppStats(){

	echo "Stats";	
}
function WordAppSettings(){
	
	include plugin_dir_path( __FILE__ ).'includes/admin/settings.php';
}
function WordAppMoreDownloads(){

	include plugin_dir_path( __FILE__ ).'includes/admin/more_downloads.php';
}
function WordAppCrowd(){

		
		include plugin_dir_path( __FILE__ ).'includes/admin/the_crowd.php';
}
function WordAppPluginsAndThemes(){

			include plugin_dir_path( __FILE__ ).'includes/admin/more_downloads.php';
}


/* ----  /Admin Pages ------ */

/*--  JSON RETURN --*/
function produce_my_json() {
  if (!empty($_GET['wp_apppp'])) {
    $jsonpost = array();
    	$jsonpost["id"] = "mobileApp";
    	
    	
    	
    	$varColor = (array)get_option( 'WordApp_options' );
    	$varGA = (array)get_option( 'WordApp_ga' ); // Settings page
     	$varMenu = (array)get_option( 'WordApp_menu' );
     	$varStructure = (array)get_option( 'WordApp_structure' );
	  	$varSlideshow = (array)get_option( 'WordApp_slideshow' );
     
    	$jsonpost["name"] = get_bloginfo('name');
    	
    	
     	$jsonpost["title"] 		= $varColor['Title'];
     	$jsonpost["color"]		= $varColor['Color'];
      	$jsonpost["logo"] 		= $varColor['logo'];
      	$jsonpost["style"] 		= $varColor['style'];
        $jsonpost["page_id"]	= $varColor['page_id'];
      	
      	
      	$jsonpost["menu"] 		= $varMenu['menu'];
      	$jsonpost["menuTop"] 	= $varMenu['menuTop'];
      	$jsonpost["menuBottom"] = $varMenu['menuBottom'];
      	$jsonpost["bottom"] 	= $varMenu['bottom'];
      	$jsonpost["side"] 		= $varMenu['side'];
      	$jsonpost["top"] 		= $varMenu['top'];
      	
      	$jsonpost["google"] 	= $varGA['google'];
      	
	  	$jsonpost["slideActive"] 	= $varSlideshow['onoff'];
	  	$jsonpost["slide"][0] 	= $varSlideshow['one'];
	  	$jsonpost["slide"][1]	= $varSlideshow['two'];
	  	$jsonpost["slide"][2]	= $varSlideshow['three'];
	  	$jsonpost["slide"][3]	= $varSlideshow['four'];
	  	$jsonpost["slide"][4]	= $varSlideshow['five'];
      
      //$menuItems = wp_get_nav_menu_items($varMenu['bottom']);
     $menuItems =   wp_get_nav_menu_items(  $varMenu['menuBottom'] );

      
      $jsonpost["bottomIconCount"] =   count($menuItems);
      
      //print_r($menuItems);
        for ($i = 0; $i < count($menuItems); ++$i) {
       $jsonpost["bottomIcon"][$i]  = $varMenu['bottomIcon'][$i];
   		 }
   		 
   		 
    $encoded=json_encode($jsonpost);
    header( 'Content-Type: application/json' );
    echo $encoded;
    exit;
  }
}

/*--  /JSON RETURN-- */


/* -- Registering forms --*/
function WordAppSettingValues(){
//echo "Registering settings";
add_settings_section('WordApp_main', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppColor', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main');
register_setting( 'WordApp_main', 'WordApp_options' );

add_settings_section('WordApp_main_ga', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppGA', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main_ga');
register_setting( 'WordApp_main_ga', 'WordApp_ga' );


add_settings_section('WordApp_main_menu', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppMenu', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main_menu');
register_setting( 'WordApp_main_menu', 'WordApp_menu' );


add_settings_section('WordApp_main_structure', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppStucutre', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main_structure');
register_setting( 'WordApp_main_structure', 'WordApp_structure' );

	
	
add_settings_section('WordApp_main_slideshow', 'Main Settings', 'plugin_section_text', 'WordApp');
add_settings_field('WordAppSlideshow', 'Theme Toolbar Color', 'WordAppColor_display','WordApp', 'WordApp_main_slideshow');
register_setting( 'WordApp_main_slideshow', 'WordApp_slideshow' );


		
		}
function plugin_section_text() { //TO RENAME
echo '<p>Main description of this section here.</p>';
}

function WordAppColor_display() { //TO RENAME
//$options = get_option('WordAppColor');
//echo "<input id='WordAppColor' name='WordAppColor' size='40' type='text' value='".$options."' />";
} 

function plugin_options_validate($input) { //RENAME
$newinput['text_string'] = trim($input['text_string']);
if(!preg_match('/^[a-z0-9]{32}$/i', $newinput['text_string'])) {
$newinput['text_string'] = '';
}
return $newinput;
}

/* -- /Registering Forms -- */	


/* ----  Admin Menu ------ */


	function register_WordApp_menu(){
		$page_title = "WordApp";
		$menu_title = "WordApp";
		$capability = 1;
		$menu_slug  = "WordApp";
		$function  	= "WordAppHomepage";
		
	
	add_menu_page( __('Getting Started'), $menu_title, $capability, $menu_slug, array($this, $function), plugins_url( APPNAME.'/images/app20x20.png' ), 66 ); 
	
	add_submenu_page( $menu_slug, __('App Builder'), __('App Builder'), $capability, 'WordAppBuilder', array($this, 'WordAppBuilder') );
	
	add_submenu_page( $menu_slug, __('Get more downloads!'), __('Get more downloads!'), $capability, 'WordAppMoreDownloads', array($this, 'WordAppMoreDownloads') );
	
	add_submenu_page( $menu_slug, __('Push Notifications'), __('Push Notifications'), $capability, 'WordAppPN', array($this, 'WordAppPN') );
	// add_submenu_page( $menu_slug, __('Stats'), __('Stats'), $capability, 'WordAppStats', array($this, 'WordAppStats') ); // USING GA until find a better solution
	add_submenu_page( $menu_slug, __('Settings'), __('Settings'), $capability, 'WordAppSettings', array($this, 'WordAppSettings') );
	//add_submenu_page( $menu_slug, __('Plugins & Themes'), __('Plugins & Themes'), $capability, 'WordAppPluginsAndThemes', array($this, 'WordAppPluginsAndThemes') );
	add_submenu_page( $menu_slug, __('The Crowd'), __('The Crowd'), $capability, 'WordAppCrowd', array($this, 'WordAppCrowd') );

		}
/* ----  /Admin Menu ------ */




/* ---Adding WP REST API --- */
	function api_to_wordapp( $_post, $post, $context ) {

	    // get all the fields of this post from Advanced Custom Fields
	    if( function_exists( "get_fields" ) )
	    {
	    	$fields = get_fields( $post['ID'] );
	    	$_post['wordapp_content']['acf'] = $fields;
	    }

	    // add the html content of the post to wordapp_content
	    $html = str_replace( PHP_EOL, '', wpautop( strip_tags( do_shortcode( $post['post_content'] ), '<h1><h2><h3><h4><h5><h6><img><p><ul><li><a><strong>'), false ) );
	    $_post['wordapp_content']['html'] = apply_filters( "wordapp_prepare_html", $html );


	    return $_post;
	}

	 function include_wp_rest_api() {
		
		 
		  $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        
		array(
            'name'               => 'WP API Menus', // The plugin name.
            'slug'               => 'wp-api-menus', // The plugin slug (typically the folder name).
            'source'             => plugin_dir_path( __FILE__ ) . '/third/wp-api-menus.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
		array(
            'name'               => 'WP API', // The plugin name.
            'slug'               => 'json-rest-api', // The plugin slug (typically the folder name).
            'source'             => plugin_dir_path( __FILE__ ) . '/third/json-rest-api.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );
		 
		 
	}

/* -- /Adding WP REST API --- */


/* ------------------
* IMPORT CSS & EXTRA LIBS
------------------- */	


/* -- Color Picker --*/
function WordApp_add_color_picker( $hook ) {
// Make sure to add the wp-color-picker dependecy to js file
    wp_enqueue_script( 'cpa_custom_js', plugins_url( 'js/scripts.js?'.date('YmdHsi').'', __FILE__ ), array( 'jquery', 'wp-color-picker','media-upload','thickbox' ), '', true  );
 	wp_enqueue_script( 'wordapp_custom_js',  plugins_url( 'js/jquery.simplyCountable.js', __FILE__ ), array( 'jquery' ), '', true  );
	wp_enqueue_script( 'wordapp_custom_js',  plugins_url( 'js/jquery.simplyCountable.js', __FILE__ ), array( 'jquery' ), '', true  );
	
	wp_register_style( 'custom_wordapp_admin_css',  plugins_url( 'css/style.css', __FILE__ ), false, '1.0.0' );
    wp_enqueue_style( 'custom_wordapp_admin_css' );
}

function WordApp_options_enqueue_scripts() {
 
}

/* -- /Color Picker --*/


}//END CLASS



/* ----  Widgets ------ */

class WordApp_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function WordApp_widget() {
        parent::WP_Widget(false, $name = 'WordAPP Download our app');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
		 $message2 	= $instance['message2'];
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<ul>
								<li><a href="<?php echo $message; ?>"><img src="<?php echo plugins_url(APPNAME.'/images/widget/applestore_en.png')?>"></a></li>
								<li><a href="<?php echo $message2; ?>"><img src="<?php echo plugins_url(APPNAME.'/images/widget/googleplaystore_en.png')?>"></a></li>
							</ul>
<a href="http://mobile-rockstar.com/download/" style="float:right"><img src="<?php echo plugins_url(APPNAME.'/images/widget/poweredby_en.png')?>"></a>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
		$instance['message2'] = strip_tags($new_instance['message2']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
		 $message2	= esc_attr($instance['message2']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('iTunes Link'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>" type="text" value="<?php echo $message; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message2'); ?>"><?php _e('Play Store Link'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('message2'); ?>" name="<?php echo $this->get_field_name('message2'); ?>" type="text" value="<?php echo $message2; ?>" />
        </p>
        
        <?php 
    }
 
 
} // end class WordApp_widget


add_action('widgets_init', create_function('', 'return register_widget("WordApp_widget");'));


function WordAppClass()
{
	global $WordAppClass;

	if( !isset($WordAppClass) )
	{
		$WordAppClass = new WordAppClass();
	}

	return $WordAppClass;
}

/* ---- / Widgets ------ */
/*--- Install Hook ----*/
register_activation_hook( __FILE__, array('WordAppClass', 'WordApp_activate') );
	  
// initialize
WordAppClass();
