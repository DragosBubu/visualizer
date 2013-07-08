<?php
/*
Plugin Name: WordPress Visualizer
Plugin URI:
Description: This plugin is easy and powerful tool to create charts.
Version: 1.0
Author: Madpixels
Author URI: http://madpixels.net
*/

define( 'VISUALIZER_BASEFILE', __FILE__ );
define( 'VISUALIZER_ABSURL', plugins_url( '/', __FILE__ ) );
define( 'VISUALIZER_ABSPATH', dirname( __FILE__ ) );

function visualizer_autoloader( $class ) {
	$namespaces = array( 'Visualizer' );
	foreach ( $namespaces as $namespace ) {
		if ( substr( $class, 0, strlen( $namespace ) ) == $namespace ) {
			require dirname( __FILE__ ) . str_replace( '_', DIRECTORY_SEPARATOR, "_classes_{$class}.php" );
			return true;
		}
	}

	return false;
}

function visualizer_launch() {
	$plugin = Visualizer_Plugin::instance();
	$plugin->setModule( Visualizer_Module_Setup::NAME );
}

spl_autoload_register( 'visualizer_autoloader' );

visualizer_launch();