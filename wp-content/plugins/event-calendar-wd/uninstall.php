<?php
/**
 * Delete all settings when the plugin is uninstalled.
 */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$general = get_option( ECWD_PLUGIN_PREFIX.'_settings_general' );

// If this is empty then it means it is unchecked and we should delete everything
if ( empty( $general['save_settings'] ) && false ) {

}
