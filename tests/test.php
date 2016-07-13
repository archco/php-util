<?php 
require_once __DIR__.'/../vendor/autoload.php';

use cosmos\util\DocUtil;

$str = "<h1>Hello, World!</h1>";
echo $str."<br>";
echo DocUtil::safeScript($str);
?>