<?php
/*
 * Remove the annoying Yoast SEO nag for all Admin Users. Tested with v3.4.2
 */
class ahRemoveYoastNag_Remove_Yoast_SEO_Nag {
	private $yoastPluginFile;
	public function __construct() {
		$this->yoastPluginFile = "wordpress-seo/wp-seo.php";
		register_activation_hook( $this->yoastPluginFile, array( $this, 'ryn_remove_yoast_nag_on_activation' ) );
		add_action( 'upgrader_process_complete', array( $this, 'ryn_remove_yoast_nag_after_update' ), 11, 2 );
	}
	/*
	 * Check if Yoast has been activated and remove nag
	 */
	function ryn_remove_yoast_nag_on_activation() {
		// If this constant is defined we know Yoast SEO is activated
		if ( defined( 'WPSEO_FILE' ) ) {
			ahRemoveYoastNag_Remove_Yoast_SEO_Nag::ryn_remove_yoast_nag();
		}
	}
	/*
	 * Remove Yoast nag after plugin has been updated
	 */
	function ryn_remove_yoast_nag_after_update( $upgrader_object, $options ) {
		// Only remove the nag if Yoast SEO has been updated
		if ( array_search( $this->yoastPluginFile, $options['plugins'] ) !==  NULL ) {
			if ( current_user_can( 'manage_options' ) ) {
				ahRemoveYoastNag_Remove_Yoast_SEO_Nag::ryn_remove_yoast_nag();
			}
		}
	}
	/*
	 * Remove nag for all Admin users
	 */
	private function ryn_remove_yoast_nag() {
		$pluginData = get_plugin_data( WPSEO_FILE, false );
		$pluginVersion = $pluginData['Version'];
		$adminUsers = get_users( array( 'role' => 'administrator' ) );
		// Since the nag displays for all admin users, let's clear it for all admin users
		foreach ( $adminUsers as $user ) {
			if ( get_user_meta( $user->ID, 'wpseo_seen_about_version', true ) !== $pluginVersion ) {
				update_user_meta( $user->ID, 'wpseo_seen_about_version', $pluginVersion );
			}
			if ( strtolower( get_user_meta( $user->ID, 'wpseo-dismiss-about', true ) ) !== "seen" ) {
				update_user_meta( $user->ID, 'wpseo-dismiss-about', "seen" );
			}
		}
	}
}
if ( defined( 'WPSEO_FILE' ) ) {
	new ahRemoveYoastNag_Remove_Yoast_SEO_Nag();
}

function remove_yoast_license_nag_from_admin_page() {
    echo
    '<style>
        div.yoast-notice {
            display: none;
        }
    </style>';
}
  
add_action('admin_head', 'remove_yoast_license_nag_from_admin_page');