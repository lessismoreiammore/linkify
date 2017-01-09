<?php
session_start();
require("../../lib/functions.php");
require("../../blocks/components/header.php");
require("../../blocks/components/error.php");
require("../../blocks/components/message.php");

$uid = $_SESSION["login"]["uid"];
$users = dbGet($connection, "SELECT * FROM users WHERE id = '$uid';");

foreach($users as $user) {
	$avatar = $user["avatar"];
}

 ?>

 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/resources/css/style.css">
		<title></title>
	</head>
	<body>
		<form action="../../lib/settings.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="action" value="changeAvatar">
			<div class="placeholderAvatar"><img src="/resources/img/users/<?php echo $uid ?>/<?php echo $avatar; ?>" style="width: 100%; height: 100%;" alt=""></div>
			<input type="file" name="avatar" accept="image/png, image/jpeg">

			<input type="password" name="password">
			<button type="submit">Save changes</button>

		</form>


	</body>
</html>
