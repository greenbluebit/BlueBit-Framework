<?php

// REDIRECT LOGIN

if(! function_exists( 'bluebit_login' ) ) {
	function bluebit_login() {  
    $login_page  = home_url( '/login/' );  
    $page_viewed = basename($_SERVER['REQUEST_URI']);  
  
    	if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {  
        	wp_redirect($login_page);  
        	exit;  
    	}  
	}  
	add_action('init','bluebit_login');  
	}

// REDIRECT LOGIN FAILED

if(! function_exists( 'bluebit_login_failed' ) ) {
	function bluebit_login_failed() {
		$login_page = home_url( '/login/' );
		wp_redirect( $login_page . '?login=failed' );
		exit;
	}

	add_action( 'wp_login_failed', 'bluebit_login_failed' );
}

if(! function_exists( 'bluebit_login_verify') ) {
	function bluebit_login_verify( $user, $username, $password ) {
		$login_page = home_url( '/login' );
		wp_redirect( $login_page . '?login=empty' );
	}

	add_action( 'authenticate', 'bluebit_login_verify', 1, 3 );
}

if(! function_exists( 'bluebit_logout') ) {
	function bluebit_logout() {
		$login_page = home_url( '/login/' );
		wp_redirect( $login_page . '?login=false' );
	}

	add_action( 'wp_logout', 'bluebit_logout' );
}

?>