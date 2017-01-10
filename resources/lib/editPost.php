<?php
require("functions.php");
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlPostid = substr($url, -5, 1);
$posts = dbGet($connection, "SELECT * FROM posts WHERE postid = '$urlPostid';");
foreach ($posts as $post) {
	$currentContent = $post["content"];
	$currentTitle = $post["title"];
}
?>

<form method="POST" action="/resources/lib/makeEditPost.php">
	<input type="hidden" name="editAction" value="editPost">
	<input type="hidden" name="urlid" value="<?= $urlPostid ?>">
	<input type="text" name="newTitle" value="<?= $currentTitle ?>">
   <textarea name="newContent"><?= $currentContent ?></textarea>
   <button type="submit">Edit post</button>
</form>
