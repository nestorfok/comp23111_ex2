<?php

define('db_server', 'localhost');
define('db_username', 'root');
define('db_password', 'Nesand989367');
define('db_name', 'quiz');

echo "hi";
$link = mysql_connect(db_server, db_username, db_password, db_name);

if($link == false) {
	die("ERROR: could not connect" . mysql_connect_error());
}
?>
