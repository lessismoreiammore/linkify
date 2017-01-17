<?php
session_start();
require("../../lib/functions.php");

$uid = $_SESSION["login"]["uid"];
$users = dbGet($connection, "SELECT * FROM users WHERE id = '$uid';");

foreach($users as $user) {
	$avatar = $user["avatar"];
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
       <div class="containter">
          <div class="row vertical-align">
             <div class="col-md-6">
                <img src="/resources/img/users/<?php echo $uid ?>/<?php echo $avatar; ?>"  alt="user avatar">
             </div>
             <div class="col-md-6">
                <form action="../../lib/settings.php" method="POST" enctype="multipart/form-data" style="width:80%">
                   <div class="form-group">
                      <input type="hidden" name="action" value="changeAvatar">
                   </div>
                   <div class="form-group">
                      <input type="file" name="avatar" accept="image/png, image/jpeg">
                   </div>
                   <div class="form-group">
                      <label for="passwordAvatar"></label>
                      <input type="password" id="passwordAvatar" placeholder="Password" name="password" class="form-control">
                   </div>
          			<button class="btn btn-accent btn-danger white" type="submit">Save changes</button>

          		</form>
             </div>
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
