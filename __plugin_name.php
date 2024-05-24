<?php
/*
Plugin Name: Divi Builder X
Plugin URI:  https://divibuilderx.unique-ui.com
Description: Divi M
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


if ( ! function_exists( 'dibx_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function dibx_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviBuilderX.php';
}
add_action( 'divi_extensions_init', 'dibx_initialize_extension' );
endif;
