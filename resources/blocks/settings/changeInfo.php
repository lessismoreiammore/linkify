<?php
session_start();
require("../../lib/functions.php");
require("../../blocks/components/header.php");

$uid = $_SESSION["login"]["uid"];
$users = dbGet($connection, "SELECT * FROM users WHERE id = '$uid';");

foreach($users as $user) {
	$username = $user["username"];
	$email = $user["email"];
}

require("../../blocks/components/error.php");
require("../../blocks/components/message.php");
?>
