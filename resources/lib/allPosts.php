<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<div class="post">
		<?php

		//Get info about posts from database
		$postInfo = dbGet($connection, "SELECT *, posts.id 'postid'  FROM posts INNER JOIN users ON users.id = posts.uid ORDER BY published DESC;");

		//Get info about comments from database
		$commentInfo = dbGet($connection, "SELECT post_id, content, users.name FROM comments INNER JOIN users ON users.id = comments.uid ORDER BY published DESC;");

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

				<div class="placeholderAvatar" style="display: inline-block"><img src="/resources/img/users/<?php echo $uid ?>/<?php echo $postAvatar; ?>" style="width: 100%; height: 100%;" alt=""></div>
				<div class="postContent" style="display: inline-block">
					<h4><?= $postTitle; ?></h4><br>
					<a href="#"><?= $postLink; ?></a>
                    <p><?= $postContent; ?></p>

                    <!-- Like counter -->
					<span><a href="resources/lib/like.php?type=post&id=<?php echo $postId?>">Like</a></span>
                    <?php
                    $likesNumber = dbGet($connection, "SELECT COUNT(id) AS likes FROM likes WHERE postid = '$postId'");
                     ?>
					<p><?php echo $likesNumber[0]['likes']?> people like this</p>

                    <!-- Comment part -->
					<span><a class="comments" href="#" data-post-id="<?= $uid ?>">Comment</a></span>
				</div>


				<div class="hide" id="content">
					<br>
					<form action="resources/lib/insertComment.php" method="POST">
						<input type="hidden" name="commentAction" value="createComment">
					   <textarea name="content" placeholder="Add your comment here"></textarea>
                       <input type="hidden" name="postId" value="<?= $postId ?>">
					   <button type="submit">Comment</button>
					</form>

					<?php
					$post_id = $commentInfo["post_id"];
					foreach ($commentInfo as $comments) {
						// if($post_id === $postId){
							echo $comments["content"] . " - " . $comments["name"] . "<br>";
						// }
					}
					 ?>
				</div>
				<br><br>
		<?php
		}
		?>
		</div>
		<script src="resources/js/script.js"></script>
	</body>
</html>
