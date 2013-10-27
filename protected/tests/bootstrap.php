<?php

// Composer Autoload
require dirname(__FILE__) .  "/../../vendor/autoload.php";

// change the following paths if necessary
$yiit='/home/k4k1-c0der/lib/yii/framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
