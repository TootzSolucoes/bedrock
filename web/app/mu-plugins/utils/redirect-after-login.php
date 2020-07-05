<?php

	function login_redirect( $redirect_to, $request, $user ) {
		
		if (isset($user->roles) && is_array($user->roles)) {
			if (in_array('administrator', $user->roles)) {
		    	$redirect_to = admin_url();
			} else {
		    	$redirect_to = home_url();
			}
		}

		return $redirect_to;
	}

	add_filter( 'login_redirect', 'login_redirect', 10, 3 );