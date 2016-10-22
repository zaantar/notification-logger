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

namespace NotificationLogger;


final class Main {

	const SCRIPT_NAME = 'notification-logger-bootstrap';

	public static function initialize() {

		new self();
	}


	public function __construct() {

		$this->enqueue_scripts();

		$this->set_error_handler();

	}


	private $errors = array();


	private $previous_error_handler;


	private $error_types = array(
		E_WARNING => 'E_WARNING',
		E_USER_WARNING => 'E_USER_WARNING',
		E_NOTICE => 'E_NOTICE',
		E_USER_NOTICE => 'E_USER_NOTICE'
	);


	private function enqueue_scripts() {

		$self = $this;

		$enqueue_scripts = function() use( $self ) {
			wp_register_script( 'notification-logger', plugin_dir_url( __FILE__ ) . 'notification-logger.min.js' );
			wp_register_script( 'notification-logger-bootstrap', plugin_dir_url( __FILE__ ) . 'bootstrap.js', array( 'notification-logger' ) );

			wp_enqueue_script( 'notification-logger-bootstrap' );

			$self->localize_script();
		};

		add_action( 'admin_enqueue_scripts', $enqueue_scripts );
		add_action( 'wp_enqueue_scripts', $enqueue_scripts );
	}


	/**
	 * Pass errors to JS.
	 *
	 * We don't mind running this repeatedly because the last l10n object overwrites the previous one.
	 */
	private function localize_script() {
		wp_localize_script( 'notification-logger-bootstrap', 'NotificationLoggerPHPErrors', array( 'errors' => $this->errors ) );
	}


	private function set_error_handler() {

		$self = $this;

		$this->previous_error_handler = set_error_handler( function( $type, $message, $file, $line ) use( $self ) {

			if( array_key_exists( $type, $self->error_types ) ) {

				if( ! is_string( $message ) ) {
					$message = print_r( $message, true );
				}

				// Store the error information
				$self->errors[] = array(
					'type' => $self->error_types[ $type ],
					'message' => sprintf(
						"%s:%d\n\n%s",
						$file,
						$line,
						$message
					)
				);
			}

			$self->localize_script();

			if ( null != $self->previous_error_handler ) {
				return call_user_func( $self->previous_error_handler, $type, $message, $file, $line );
			} else {
				return false;
			}

		});
	}
}


Main::initialize();

echo $x['a'];