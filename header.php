<?php 
/**
 * header.php
 *
 * The header for the theme.
 */
?>

<?php 
	// Get the favicon.
	$favicon = IMAGES . '/icons/favicon.ico';

	// Get the custom touch icon.
	$touch_icon = IMAGES . '/icons/apple-touch-icon-152x152-precomposed.png';
?>

<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link rel="shortcut icon" href="<?php echo $favicon; ?>">
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $touch_icon; ?>">
    <script type="text/javascript">
    document.write("\<script src='//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' type='text/javascript'>\<\/script>");
    </script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <!-- HEADER -->
    
    <header class="site-header" role="banner">
        <div class="header-contents">
            <div class="top">
                <div class="logo-holder">
                    <div class="site-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
                    </div> <!-- end site-logo -->
                </div> <!-- end col-xs-3 -->
                <div class="nav-holder">
                    <nav class="site-navigation" role="navigation">
                        <?php 
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'main-menu',
                                    'menu_class' => 'site-menu'
                                )
                            );
                        ?>
                    </nav>
                </div> <!-- end col-xs-9 -->
                   
            </div> <!-- end row -->
            
        </div> <!-- end container -->
        <!-- <div class="row"> -->
           <!-- <div id="slider_contain" style="width: 100%; height: "> -->
        <?php if( is_home() ) : ?>
                 <div id="slider_holder" style="color:white; position: relative; top: 0px; left: 0px; width: 1300px; height: 340px;">
                        <!-- Loading Screen -->
                                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
                                        </div>
                                    <div style="position: absolute; display: block; background: url(<?php echo IMAGES; ?>/loading.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
                                    </div>
                                </div>
                        <!-- Slides Container -->
                            <div id="slides" u="slides" style=" cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 1300px; height: 340px;">
                                
                            </div>
                            <!-- bullet navigator container -->
                                <div u="navigator" class="jssorb03" style="position: absolute; bottom: 4px; left: 6px;">
                                    <!-- bullet navigator item prototype -->
                                        <div u="prototype" style="position: absolute; width: 21px; height: 21px; text-align:center; line-height:21px; color:white; font-size:12px;"><NumberTemplate></NumberTemplate></div>
                                </div>
                            <!-- Bullet Navigator Skin End -->
                            <!-- Arrow Left -->
                                <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
                                </span>
                            <!-- Arrow Right -->
                                <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 123px; right: 8px">
                                </span>
                            <!-- Arrow Navigator Skin End -->
            </div>
            <?php endif; ?>
       <!-- </div> -->
    </header> <!-- end site-header -->

	<!-- MAIN CONTENT AREA -->

	<div class='container'>
		<div class='row'>