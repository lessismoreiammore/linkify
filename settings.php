<?php
session_start();
require("resources/lib/functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/resources/css/style.css">
		<title></title>
	</head>
	<body>

		<?php

		require("resources/blocks/components/header.php");

		$uid = $_SESSION["login"]["uid"];
		$users = dbGet($connection, "SELECT * FROM users WHERE id = '$uid';");

		foreach($users as $user) {
			$name = $user["name"];
			$username = $user["username"];
			$email = $user["email"];
			$avatar = $user["avatar"];
		}

        require("resources/blocks/components/error.php");
        require("resources/blocks/components/message.php");
		?>

		Name: <?= $name; ?> <br>
		Username: <?= $username; ?> <br>
		Email: <?= $email; ?> <br>
		<a href="/resources/blocks/settings/changeInfo.php">Edit info</a> <br>
		<a href="/resources/blocks/settings/changePassword.php">Change Password</a> <br>
		<div class="placeholderAvatar"><img src="/resources/img/users/<?php echo $uid ?>/<?php echo $avatar; ?>" style="width: 100%; height: 100%;" alt=""></div> <br>
		<a href="/resources/blocks/settings/changeAvatar.php">Change avatar</a> <br>

	</body>
</html>
