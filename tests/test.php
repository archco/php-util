<?php 
require_once __DIR__.'/../vendor/autoload.php';
date_default_timezone_set('Asia/Seoul');

use cosmos\util\DocUtil;
use cosmos\util\DateUtil;

echo DateUtil::getAge('1953-09-20', 'ko') . PHP_EOL;
var_dump(DateUtil::getAge('1953-09-20', 'ko'));
?>