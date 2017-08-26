<?php
define("PATH",dirname(__FILE__));

include(PATH.'/core/db.php');
include(PATH.'/core/input.php');
include(PATH.'/header.php');
$input = new input();
$db = new db();