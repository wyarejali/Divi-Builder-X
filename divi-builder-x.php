<?php
/*
Plugin Name: Divi Builder X Lite
Plugin URI:  https://divibuilderx.unique-ui.com
Description: Powerful Divi Nations to enhance your Divi website to the next level with fully functional modules.
Version:     1.0.0
Author:      Unique UI
Author URI:  https://unique-ui.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: dibx-divi-builder-x
Domain Path: /languages

Divi Builder X is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divi Builder X is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divi Builder X. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/




// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The plugin main class
 */
if( ! class_exists( 'DIBX_divi_builder_X' ) ) :

	final class DIBX_divi_builder_X {

		/**
		 * Website url
		 */
		const website_url = 'https://divi-nations.unique-ui.com/';

		/**
		 * Plugin version
		 *
		 * @var string
		 */
		const version = '1.0.0';

		/**
		 * Plugin documentation
		 * 
		 * @var string
		 */
		const DOCUMENTATION_LINK = 'https://docs.divi-nations.com';

		/**
		 * Plugin only instance
		 */
		private static $instance;
	
		/**
		 * Class construcotr
		 */
		private function __construct() {
			$this->define_constants();
	
			register_activation_hook( __FILE__, [ $this, 'activate' ] );
	
			add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
			add_action( 'divi_extensions_init', [ $this, 'dne_extension_initialize'] );
			add_filter( 'plugin_action_links_' . DIBX_DIVI_BUILDER_X_BASE, [ $this, 'add_plugin_action_links' ] );
		}
	
		/**
		 * Initializes a singleton instance
		 *
		 * @return \DIBX_divi_builder_X
		 */
		public static function init() {
	
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof DIBX_divi_builder_X ) ) {
				$instance = new self();
			}
	
			return $instance;
		}
		
	
		/**
		 * Define the required plugin constants
		 *
		 * @return void
		 */
		public function define_constants() {

			define( 'DIBX_DIVI_BUILDER_X_VERSION', self::version );
			define( 'DIBX_DIVI_BUILDER_X_FILE', __FILE__);
			define( 'DIBX_DIVI_BUILDER_X_DIR', plugin_dir_path(__FILE__)) ;
			define( 'DIBX_DIVI_BUILDER_X_PATH', __DIR__);
			define( 'DIBX_DIVI_BUILDER_X_URL', plugins_url( '', DIBX_DIVI_BUILDER_X_FILE) );
			define( 'DIBX_DIVI_BUILDER_X_ASSETS', DIBX_DIVI_BUILDER_X_URL . '/assets' );
			define( 'DIBX_DIVI_BUILDER_X_BASE', plugin_basename(__FILE__) );

			define( 'DIBX_DIVI_BUILDER_X_WEBSITE', self::website_url );
			define( 'DIBX_DIVI_BUILDER_X_AUTHOR', 'Divi Builder X' );

		}
	
		/**
		 * Initialize the plugin
		 *
		 * @return void
		 */
		public function init_plugin() {
	
			require_once DIBX_DIVI_BUILDER_X_DIR . 'includes/functions.php';

			require_once DIBX_DIVI_BUILDER_X_DIR . 'includes/class-assets-manager.php';
			new DIBX_DIVI_BUILDER_X\DIBX_Assets();
	
		}

		/**
		 * Initialize divi modules
		 */
		public function dne_extension_initialize() {			
			require_once DIBX_DIVI_BUILDER_X_DIR . 'includes/DiviBuilderX.php';
		}
	
		/**
		 * Do stuff upon plugin activation
		 *
		 * @return void
		 */
		public function activate() {
			$installed = get_option( 'dne_divi_nation_installed' );
	
			if ( ! $installed ) {
				update_option( 'dne_divi_nation_installed', time() );
			}
	
			update_option( 'dne_divi_nation_version', '1.0.0' );
		}

		/**
		 * Add Pluign actions links
		 * 
		 * @param mixed $links
		 * 
		 * @return mixed $links
		 */
		public function add_plugin_action_links($links) {

			$links[] = sprintf(
				'<a href="%1$s" target="_blank" style="color: #197efb;font-weight: 600;">
					%2$s
				</a>',
				self::DOCUMENTATION_LINK,
				esc_html__( 'Docs', 'dne-divi-nations' )
			);

			return $links;
		}
	}
	
endif;


/**
 * Initializes the main plugin
 * 
 * @return void
 */
function dne_divi_nation_plugin() {
	return DIBX_divi_builder_X::init();
}

// Kick-off the plugin
dne_divi_nation_plugin();
