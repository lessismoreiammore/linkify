<?php
session_start();
require("resources/lib/functions.php");

$loggedIn = checkLogin($connection);

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Linkify</title>
     <link rel="stylesheet" href="/resources/css/reset.css">
 	 <link rel="stylesheet" href="/resources/css/style.css">
   </head>
   <body>

      <?php
      	  require("resources/blocks/components/header.php");

      	  if ($loggedIn) {
                  require("resources/blocks/home.php");
              } else {
      				require("resources/lib/allPosts.php");
                  require("resources/blocks/auth.php");
              }


      	 require("resources/blocks/components/error.php");
           require("resources/blocks/components/message.php");
      	   ?>

         </body>
</html>
