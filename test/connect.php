<?php
// connect to database, only used in login, activation and registration
mysql_connect("localhost","root","") or die("Could not connect to server!");
mysql_select_db("EO") or die("Could not select database!");
?>