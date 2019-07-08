<?php
if(!isset($_COOKIE['dash-lang'])) {
    define('LANG','en');
} 
else if (empty($_COOKIE['dash-lang'])) {
	define('LANG','en');
} 
else
{
    define('LANG',$_COOKIE['dash-lang']);
}
