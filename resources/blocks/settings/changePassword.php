<?php
session_start();
require("../../lib/functions.php");
require("../../blocks/components/error.php");
require("../../blocks/components/message.php");

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
        require("../../blocks/components/header.php");
      ?>
      <div class="container">
        <div class="row">
          <form action="../../lib/settings.php" method="POST" class="margin-top">
              <div class="form-group">
                  	<input type="hidden" name="action" value="changePassword">
              </div>
              <div class="form-group">
                  <label for="passwordPassword"></label>
                  	<input class="form-control" type="password" name="newPassword" id="passwordPassword" placeholder="New password">
              </div>
              <div class="form-group">
                <label for="repeatPassword"></label>
                <input type="password" name="repeatPassword" class="form-control" id="repeatPassword" placeholder="Repeat password">
              </div>
              <div class="form-group">
                <label for=""></label>
                	<input type="password" name="password" class="form-control" id="oldPassword" placeholder="Old password">
              </div>
          	<button class="btn btn-accent btn-danger white" type="submit" name="button">Save</button>
          </form>
        </div>

      </div>



<footer>
    <h5><span class="glyphicon glyphicon-copyright-mark "></span><a href="#">   lessismoreiammore</a></h5>
</footer>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>
