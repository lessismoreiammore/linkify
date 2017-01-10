<?php
session_start();
require("functions.php");
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
		$uid = $_SESSION["login"]["uid"];

		$posts = dbGet($connection, "SELECT * FROM posts INNER JOIN users ON users.id = posts.uid WHERE uid = '$uid' ORDER BY published DESC;");

		$commentInfo = dbGet($connection, "SELECT * FROM comments INNER JOIN users ON users.id = comments.uid ORDER BY published DESC;");

		foreach($posts as $post) {
			$postContent = $post["content"];
			$postTitle = $post["title"];
			$postPublished = $post["published"];
			$postUsername = $post["username"];
			$postAvatar = $post["avatar"];
			$uid = $post["uid"];
			$postid = $post["postid"];
			$postLink = $post["link"];
			?>

			<div class="placeholderAvatar"><img src="/resources/img/users/<?php echo $uid ?>/<?php echo $postAvatar; ?>" style="width: 100%; height: 100%;" alt=""></div>
			<div class="postContent">
				<h4><?= $postTitle; ?></h4> <br>
				<a href="#"><?= $postLink; ?></a><br>
				<p><?= $postContent; ?></p><br>
				<a class="comments" href="#">comments</a>
			</div>
			<br>
			<a href="editPostid/<?= $postid ?>.php">Edit posts</a>
			<?php
			$myfile = fopen("editPostid/$postid.php", "w");
			// $txt = "<form action='.insertEditPost.php. 'method='.POST.'>
			// 	<input type='.text. 'name='.title. 'placeholder='Add title'>
			// 	<textarea name='.content. 'placeholder='.Add your text here.'></textarea>
			// 	<button type='.submit.'>Post</button>
			// </form>";
			$txt = "<?php
			require('../../../resources/lib/editPost.php');
			 ?>";
			fwrite($myfile, $txt);
  			fclose($myfile);

			 ?>

			<div class="hide" id="content">
				<?php
				foreach ($commentInfo as $comments) {
					echo $comments["content"] . " - " . $comments["name"] . "<br>";
				}
				 ?>
				<br>
				<form action="resources/lib/makeComment.php" method="POST">
					<input type="hidden" name="commentAction" value="createComment">
					<textarea name="content" placeholder="Add your text here"></textarea>
					<button type="submit">Comment</button>
				</form>
			</div>
			<br><br>

		<?php
		}
		?>
		<script src="/resources/js/script.js"></script>
	</body>
</html>
