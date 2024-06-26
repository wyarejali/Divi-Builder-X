<?php

if ( ! class_exists( 'ET_Builder_Element' ) ) {
	return;
}


require_once DIBX_DIVI_BUILDER_X_DIR . 'includes/modules/Core/Divi-Builder-X-core.php';

$module_files = glob( __DIR__ . '/modules/*/*.php' );

// Load custom Divi Builder modules
foreach ( (array) $module_files as $module_file ) {
	if ( $module_file && preg_match( "/\/modules\/\b([^\/]+)\/\\1\.php$/", $module_file ) ) {
		require_once $module_file;
	}
}
