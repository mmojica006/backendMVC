<?php
$root_site = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
define("URL_SITE",$root_site);

define("SIZE_FILE",20971520);
