<?php
session_start();
require("../../lib/functions.php");

$uid = $_SESSION["login"]["uid"];
$users = dbGet($connection, "SELECT * FROM users WHERE id = '$uid';");

foreach($users as $user) {
	$username = $user["username"];
	$email = $user["email"];
}

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
        $resourcesDir = "../../";
        require(__DIR__."/../components/header.php");
      ?>
      <div class="container">
        <div class="row">
          <form action="../../lib/settings.php" method="POST" class="margin-top">
            <div class="form-group">
              <input type="hidden" name="action" value="changeInfo">
            </div>
            <div class="form-group">
              <label for="usernameInfo"></label>
              <input class="form-control" type="text" name="username" id="usernameInfo" value="<?= $username; ?>">
            </div>
            <div class="form-group">
              <label for="emailInfo"></label>
                <input type="email" id = "emailInfo" class="form-control" name="email" value="<?= $email; ?>">
            </div>
            <div class="form-group">
              <label for="passwordInfo"></label>
                <input type="password" name="password" id="passwordInfo" class="form-control" placeholder="Password">
            </div>
          	<button type="submit" class="btn btn-accent btn-danger white">Save changes</button>
          </form>
        </div>

      </div>

      <?php
      require("../../blocks/components/error.php");
      require("../../blocks/components/message.php");
       ?>


<footer>
    <h5><span class="glyphicon glyphicon-copyright-mark "></span><a href="#">   lessismoreiammore</a></h5>
</footer>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   </body>
   </html>
