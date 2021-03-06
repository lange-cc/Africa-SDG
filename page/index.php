<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

$actual_link  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$actual_link  = rtrim($actual_link,'/');

$local =false;
if ($local == true) {
    $actual_link .= '/sdg';
}
else
{
    $actual_link .= '';
}
define('URL',$actual_link.'/page/');
define('LINK',$actual_link.'/');
define('API',$actual_link.'/api/home/');
define('WP_API_EN','https://africasdgindex.org/page/wp-json/wp-api-menus/v2/menus/3');
define('WP_API_FR','https://africasdgindex.org/page/wp-json/wp-api-menus/v2/menus/5');
define('IMG_URL',$actual_link.'/public/all-images/');
define('FILE_URL',$actual_link.'/public/');
define('THUMBNAIL','thumbnail/');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-type");

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-type");

