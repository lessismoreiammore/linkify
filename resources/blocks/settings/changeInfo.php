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

<form action="../../lib/settings.php" method="POST">
	<input type="hidden" name="action" value="changeInfo">
	<input type="text" name="username" value="<?= $username; ?>">
	<input type="email" name="email" value="<?= $email; ?>">
	<input type="password" name="password">
	<button type="submit">Save changes</button>
</form>
