<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		Welcome
		<br>
		<a href="/settings.php">Profile</a>
		<br>
		<a href="/logout.php">Log out</a>
		<br>
		<a href="/resources/blocks/components/writePost.php">New Post</a>
		<br>
		<a href="/resources/lib/userPosts.php">My own posts</a>
		<br>
		<?php require("resources/lib/allPosts.php"); ?>
	</body>
</html>
