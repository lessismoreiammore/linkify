<!DOCTYPE html>
<html>
	<body>
		<?php

		//Get info about posts from database
		$postInfo = dbGet($connection, "SELECT *, posts.id 'postid'  FROM posts INNER JOIN users ON users.id = posts.uid ORDER BY published DESC;");



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
            <div class="row vertical-align">
				<!-- Avatar-->
                <div class="col-md-4">
                    <img src="/resources/img/users/<?php echo $uid ?>/<?php echo $postAvatar; ?>" style="width: 100%; height: 100%;" alt="user avatar">

                </div>
                <div class="col-md-8">
					<div class="row">
						<!-- Post title -->
						<div class="col-md-12">
							<h4><?= $postTitle; ?></h4><br>
						</div>
						<!-- Post link -->
						<div class="col-md-12 padding-bottom">
							<a href="#"><?= $postLink; ?></a>
						</div>
						<!-- Link description  -->
						<div class="col-md-12 padding-bottom">
							<p><?= $postContent; ?></p>
						</div>

						<!-- Like and unlike counters -->
						<?php
	                    $likesNumber = dbGet($connection, "SELECT COUNT(id) AS likes FROM likes WHERE postid = '$postId'");
						$unlikesNumber = dbGet($connection, "SELECT COUNT(id) AS likes FROM unlikes WHERE postid = '$postId'");
	                     ?>

						 <!--Like counter -->
						<div class="col-md-12 padding-bottom">
							<div class="row vertical-align-spacebetween">
								<div class="col-md-6">
									<button type="button" name="button" class="btn btn-default grey"><span class="glyphicon glyphicon-thumbs-up red" aria-hidden="true"><a class="btn-accents" href="#"> Like</a></span></button>
								</div>
								<div class="col-md-6">
									<p><?php echo $likesNumber[0]['likes']?> people like this</p>
								</div>
							</div>
						</div>
						<!-- Dislike counter -->
						<!-- I really miss the option of unlike at most social media that's why I decided to make it separetely -->
						<div class="col-md-12 padding-bottom">
							<div class="row">
								<div class="col-md-6">
									<button type="button" name="button" class="btn btn-default grey"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"><a class="btn-accents" href="#"> Dislike</a></button>
								</div>
								<div class="col-md-6">
									<p><?php echo $unlikesNumber[0]['likes']?> people dislike this</p>
								</div>
							</div>

						</div>
						<!-- Comments -->
						<div class="col-md-12 padding-bottom">
						    <h5 class="red">To view and leave comments you should be logged in</h5>
						</div>

					</div>

                </div>
            </div>

		<?php
		}
		?>
	</body>
</html>
