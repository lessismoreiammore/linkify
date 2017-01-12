<?php
require("functions.php");
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlPostid = substr($url, -5, 1);
$posts = dbGet($connection, "SELECT * FROM posts WHERE id = '$urlPostid';");
foreach ($posts as $post) {
    $currentTitle = $post["title"];
    $currentLink = $post["link"];
	$currentContent = $post["content"];
}
?>

<form method="POST" action="/resources/lib/insertEditPost.php">
	<input type="hidden" name="editAction" value="editPost">
	<input type="hidden" name="urlid" value="<?= $urlPostid ?>">
	<input type="text" name="newTitle" value= "<?= $currentTitle ?>">
   <textarea name="newLink" placeholder="<?= $currentLink ?>"></textarea>
   <textarea name="newContent" placeholder="<?= $currentContent ?>"></textarea>
   <button type="submit">Edit</button>
</form>
