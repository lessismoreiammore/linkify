<?php
session_start();
require("../../lib/functions.php");
require("../../blocks/components/header.php");
require("../../blocks/components/error.php");
require("../../blocks/components/message.php");

?>

<form action="../../lib/settings.php" method="POST">
	<input type="hidden" name="action" value="changePassword">
	<input type="password" name="newPassword" placeholder="New password">
	<input type="password" name="repeatPassword" placeholder="Repeat password">
	<input type="password" name="password" placeholder="Old password">
	<button type="submit" name="button">Save</button>
</form>
