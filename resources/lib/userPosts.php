<?php
session_start();
require("functions.php");
$uid = $_SESSION["login"]["uid"];

//Get info about posts from database
$posts = dbGet($connection, "SELECT *, posts.id 'postid' FROM posts INNER JOIN users ON users.id = posts.uid WHERE uid = '$uid' ORDER BY published DESC;");

//Get info about comments from database
$comments = dbGet($connection, "SELECT * FROM comments INNER JOIN users ON users.id = comments.uid ORDER BY published DESC;");

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


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Linkify</title>
    <link rel="stylesheet" href="/resources/css/reset.css">
    <link rel="stylesheet" href="/resources/css/stylee.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
		<?php
        $resourcesDir = "../";
        require(__DIR__."/../blocks/components/header.php");
			?>

			<div class="container">
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
    	                    $likesNumber = dbGet($connection, "SELECT COUNT(id) AS likes FROM likes WHERE postid = '$postid'");
    						          $unlikesNumber = dbGet($connection, "SELECT COUNT(id) AS likes FROM unlikes WHERE postid = '$postid'");
    	                     ?>

    						 <!--Like and dislike counters output -->
    						<div class="col-md-12 padding-bottom">
    							<div class="row">
    								<div class="col-md-12">
    									<p><?php echo $likesNumber[0]['likes']?> people like this</p>
                      <p><?php echo $unlikesNumber[0]['likes']?> people dislike this</p>
    								</div>

    							</div>
    						</div>

    					</div>

                    </div>
                </div>

                <div class="row margin-top">

                  <div class="col-md-8">
                      <!-- Edit post -->
                      <form method="POST" action="/resources/lib/editPost.php">
                        <fieldset>
                            <legend>Edit your post here</legend>
                        <div class="form-group">
                          <input type="hidden" name="editAction" value="editPost">
                          <input type="hidden" name="urlid" value="<?= $postid?>">
                        </div>
                        <div class="form-group">
                          <label for="newTitle"></label>
                          <input type="text" name="newTitle" value= "<?= $postTitle?>" id="newTitle" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="newLink"></label>
                           <textarea name="newLink" placeholder="<?= $postLink?>" id="newLink" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <label for=""></label>
                          <textarea name="newContent" placeholder="<?= $postContent?>" id="newContent" class="form-control"></textarea>
                        </div>
                         <button class="btn btn-accent btn-danger white" type="submit">Edit</button>
                       </fieldset>
                      </form>
                  </div>

                  <div class="col-md-4">
                      <!-- Delete post -->
                      <form method="POST" action="/resources/lib/deletePost.php">
                        <fieldset>
                            <legend>Delete your post here</legend>
                        <div class="form-group">
                          <input type="hidden" name="deleteAction" value="deletePost">
                          <input type="hidden" name="idPost" value="<?= $postid ?>">
                        </div>
                         <button class="btn btn-accent btn-danger white" type="submit">Delete</button>
                       </fieldset>
                      </form>
                  </div>

                </div>

			</div>


		<?php
		}
		?>

        <footer>
            <h5><span class="glyphicon glyphicon-copyright-mark "></span><a href="#">   lessismoreiammore</a></h5>
        </footer>

            <script src="/resources/js/script.js"></script>
            <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         </body>
    </html>
