<?php

include('./header.php');
if(!isset($_SESSION)){
    session_start();
}

$mysqli = new mysqli("localhost", "root", "", "kwu_tasya" );
if ($mysqli->connect_errno){
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}
?>