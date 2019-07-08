<?php
if(!isset($_COOKIE['currency'])) {
    define('CURR','usd');
} 
else if (empty($_COOKIE['currency'])) {
	define('CURR','usd');
} 
else
{
    define('CURR',$_COOKIE['currency']);
}
