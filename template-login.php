<?php
	// template-login.php
	// customized login screen for members
	// Template Name: Login Page
	// Create a page on the backend and add set this file as it's template, then change the permalink to login
		define ( 'THEMEROOT', get_stylesheet_directory_uri() );
		define ( 'SCRIPTS', THEMEROOT . '/javascripts' );
		define ( 'STYLESHEETS', THEMEROOT . '/stylesheets' );
		define ( 'IMAGES', THEMEROOT . '/images' );

		$logo = IMAGES . '/logo.png';
		$logo_retina = IMAGES . '/logo@2x.png';

		$logo_size = getimagesize( $logo );

		$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0; 
	?>
<head>
	<!-- load scripts -->

	<script type="text/javascript">
    document.write("\<script src='http://code.jquery.com/jquery-latest.min.js' type='text/javascript'>\<\/script>");
	</script>
	<script src="<?php echo SCRIPTS; ?>/scripts.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	<!-- load stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php echo STYLESHEETS;?>/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo STYLESHEETS;?>/master.css" />
</head>

<div class='container-login'>
	<div class='row error-login'>
		<?php
			if ( $login === "failed" ) {  
		    echo '<p class="col-md-12 login-msg"><strong>ERROR:</strong> Invalid username and/or password.</p>';  
			} elseif ( $login === "empty" ) {  
		    echo '<p class="col-md-12 login-msg"><strong>ERROR:</strong> Username and/or Password is empty.</p>';  
			} elseif ( $login === "false" ) {  
		    echo '<p class="col-md-12 login-msg"><strong>ERROR:</strong> You are logged out.</p>';  
			}  
		?>
	</div>
	<div class='row login-content'>
		<div class="col-md-6 login-left">  
    		<a href="#" class="login-logo"><img src="<?php echo $logo; ?>"></a>  
    		<p class="login-desc">  
        		Here there will be a welcome message or a description of sorts. Not really sure what to put at the moment so I'll just keep writting until.
    		</p>  
		</div> 
		<div class="col-md-6"> 
			<?php

				$args = array(
					'redirect' => home_url(),
					'id_username' => 'user',
					'id_password' => 'pass'
					);

				wp_login_form($args);
			?>
		</div>
	</div>
</div>
