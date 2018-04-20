<?php
define ('HOST','localhost');
define ('USER','wall_username');
define ('PASS','12345');
define ('DBNAME','wall_db');

$mysqli = new mysqli(HOST,USER,PASS,DBNAME);

if ($mysqli->errno) {
    echo 'Connection error ' . $mysqli->errno;
}

 ?>

