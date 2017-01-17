<?php
session_start();
require("functions.php");

$uid = $_SESSION["login"]["uid"];

//Get info about posts from database
$posts = dbGet($connection, "SELECT *, posts.id 'postid' FROM posts INNER JOIN users ON users.id = posts.uid WHERE uid = '$uid' ORDER BY published DESC;");

//Get info about comments from database
$comments = dbGet($connection, "SELECT * FROM comments INNER JOIN users ON users.id = comments.uid ORDER BY published DESC;");

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

  // Check if a user has written any posts
  $postsIds = dbGet($connection, "SELECT title FROM posts WHERE uid = '$uid';");

if(empty($postsIds)){
  require("userPostsEmpty.php");
}else{
    require("userPostsNotEmpty.php");
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
