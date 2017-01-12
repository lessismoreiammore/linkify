<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<div class="postContainer">
		<?php
		$postInfo = dbGet($connection, "SELECT *, posts.id 'postid'  FROM posts INNER JOIN users ON users.id = posts.uid ORDER BY published DESC;");
		$commentInfo = dbGet($connection, "SELECT * FROM comments INNER JOIN users ON users.id = comments.uid ORDER BY published DESC;");

		foreach($postInfo as $post) {
			$postContent = $post["content"];
			$postTitle = $post["title"];
			$postPublished = $post["published"];
			$postUsername = $post["username"];
			$postAvatar = $post["avatar"];
			$uid = $post["uid"];
			$postId = $post["postid"];
            $postLink = $post["link"];
			?>
				<div class="placeholderAvatar"><img src="/resources/img/users/<?php echo $uid ?>/<?php echo $postAvatar; ?>" style="width: 100%; height: 100%;" alt=""></div>
				<div class="postContent">
					<h4><?= $postTitle; ?></h4> <br>
					<a href="#"><?= $postLink; ?></a><br>
                    <p><?= $postContent; ?></p><br>
					<a class="comments" href="#" data-post-id="<?= $uid ?>">comments</a>
				</div>

				<div class="hide" id="content">
					<?php
					foreach ($commentInfo as $comments) {
						echo $comments["content"] . " - " . $comments["name"] . "<br>";
					}
					 ?>
					<br>
					<form action="resources/lib/insertComment.php" method="POST">
						<input type="hidden" name="commentAction" value="createComment">
					   <textarea name="content" placeholder="Add your comment here"></textarea>
                       <input type="hidden" name="postId" value="<?= $postId ?>">
					   <button type="submit">Comment</button>
					</form>
				</div>
				<br><br>
		<?php
		echo $postId;
		}
		?>
		</div>
		<script src="resources/js/script.js"></script>
	</body>
</html>
