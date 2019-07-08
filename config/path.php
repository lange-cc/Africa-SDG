<?php
$actual_link  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$actual_link  = rtrim($actual_link,'/');

$local = true;
if ($local == true) {
	$actual_link .= '/lange/sdg';
}
else
{
	$actual_link .= '';
}
define('URL',$actual_link.'/public/');
define('LINK',$actual_link.'/');
define('API',$actual_link.'/api/home/');
define('WP_API_EN','https://africasdgindex.org/page/wp-json/wp-api-menus/v2/menus/3');
define('WP_API_FR','https://africasdgindex.org/page/wp-json/wp-api-menus/v2/menus/5');
define('IMG_URL',$actual_link.'/public/all-images/');
define('FILE_URL',$actual_link.'/public/');
define('THUMBNAIL','thumbnail/');
define('MAIL','info@sdg.com');
?>
