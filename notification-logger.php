<?php
/*
Plugin Name: Notification Logger
Plugin URI: https://github.com/hkirat/notification-logger
Description:
Version: 0.1-dev
Author: hkirat, zaantar
Author URI: http://zaantar.eu
Text Domain: notification-logger
Domain Path: /languages
*/


add_action( 'admin_enqueue_scripts', function() {
	wp_register_script( 'notification-logger', plugin_dir_url( __FILE__ ) . 'notification-logger.min.js' );
	wp_register_script( 'notification-logger-bootstrap', plugin_dir_url( __FILE__ ) . 'bootstrap.js', array( 'notification-logger' ) );

	wp_enqueue_script( 'notification-logger-bootstrap' );
});