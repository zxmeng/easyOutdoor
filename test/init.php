<?php
// init.php
// Start Session, i dk what this means
session_start();

// Include Config, set up DB and relative paths
require_once('config.php');
require_once('EventClass.php');
require_once('DBClass.php');

require_once('commentClass.php');