<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		$postInfo = dbGet($connection, "SELECT * FROM posts INNER JOIN users ON users.id = posts.uid ORDER BY published DESC;");
		$commentInfo = dbGet($connection, "SELECT * FROM comments;");
		foreach ($commentInfo as $comments) {
			$commentsContent = $comments["content"];
			$commentsid = $comments["uid"];
		}

		foreach($postInfo as $post) {
			$postContent = $post["content"];
			$postLink = $post["link"];
			$postTitle = $post["title"];
			$postPublished = $post["published"];
			$postUsername = $post["username"];
			$postAvatar = $post["avatar"];
			$uid = $post["uid"];
			$postid = $post["postid"];
			?>

			<div class="placeholderAvatar"><img src="/resources/img/users/<?php echo $uid ?>/<?php echo $postAvatar; ?>" style="width: 100%; height: 100%;" alt=""></div>
			<div class="postContent">
				<h4><?= $postTitle; ?></h4> <br>
				<a href="#"><?= $postLink; ?></a><br>
				<p><?= $postContent; ?></p>
				<a class="comments" href="#">comments</a>
			</div>

			<div class="hide" id="content">
				<?= $commentsContent; ?>
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
		<script src="resources/js/script.js"></script>
	</body>
</html>
