<?php

// functions.php

// The theme's functions and definitions


// Define constants

define ( 'THEMEROOT', get_stylesheet_directory_uri() );
define ( 'IMAGES', THEMEROOT . '/images' );
define ( 'SCRIPTS', THEMEROOT . '/javascripts' );
define ( 'FRAMEWORK', get_template_directory() . '/framework' );

// Load Framework

require_once ( FRAMEWORK . '/init.php');
require_once ( FRAMEWORK . '/setup.php');
require_once ( FRAMEWORK . '/customize.php');
require_once ( FRAMEWORK . '/login.php');


?>