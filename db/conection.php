<?php
$db = new mysqli('localhost', 'root', 'root', 'crud');

if($db->connect_errno){
    die('connection error: ' . $db->connect_errno);
}

?>
