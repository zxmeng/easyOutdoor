<?php
// init.php
// Start Session, i dk what this means
session_start();

// Include Config, set up DB and relative paths
require_once('config.php');
require_once('EventClass.php');
// require_once('DatabaseClass.php');
require_once('Page.php');
//Helper Function Files, to be confirmed
// require_once('helpers/db_helper.php');
// require_once('helpers/format_helper.php');
// require_once('helpers/system_helper.php');

// Auto-loader
// function __autoload($class_name){
//     require_once(BASE_URL.$class_name.'.php');
// }
