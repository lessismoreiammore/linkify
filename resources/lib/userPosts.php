<?php
session_start();
require("functions.php");
$uid = $_SESSION["login"]["uid"];
$posts = dbGet($connection, "SELECT * FROM posts WHERE uid = '$uid' ORDER BY published DESC;");
foreach($posts as $post) {
	echo $post["content"] . "<br>";
}
?>
