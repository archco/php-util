<?php 
require_once __DIR__.'/../vendor/autoload.php';
date_default_timezone_set('Asia/Seoul');

use cosmos\util\DocUtil;
use cosmos\util\DateUtil;

$str = "<h1>Hello, World!</h1>";
echo $str."<br>";
echo DocUtil::safeScript($str)."<br>";
echo DocUtil::getSelf(true)."<br>";

echo DateUtil::toSimple("2016-07-14 11:18:45");
?>