<?php
// If unistall not called from WordPress exit
if( !defined( 'WP_UNINSTALL_PLUGIN' ) )
  exit();

// Delete option from options table
delete_option( 'PLUGIN_NAME_OPTIONS' );

// Remove any additional options and custom tables.
?>