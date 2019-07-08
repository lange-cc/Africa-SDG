<?php
if(!isset($_COOKIE['lang'])) {
    define('LANG','en');
} 
else if (empty($_COOKIE['lang'])) {
	define('LANG','en');
} 
else
{
    define('LANG',$_COOKIE['lang']);
}
