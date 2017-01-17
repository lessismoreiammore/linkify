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
 	 <link rel="stylesheet" href="/resources/css/stylee.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   </head>
   <body>

      <?php
        $resourcesDir = "resources/";
      	  require("resources/blocks/components/header.php");?>
        <div class="container main-container">
            <div class="row">
                <?php
               if ($loggedIn) {
                        require("resources/blocks/home.php");
                   } else {?>
                       <div class="row">
                           <div class="col-md-8">
                               <?php
                                    require("resources/lib/allPosts.php");
                                ?>
                           </div>
                           <div class="col-md-4">
                               <?php
                                    require("resources/blocks/auth.php");
                                ?>
                           </div>

                       </div>

                    <?php
                   }

             require("resources/blocks/components/error.php");
             require("resources/blocks/components/message.php");
                ?>
            </div>
        </div>

        <footer>
            <h5><span class="glyphicon glyphicon-copyright-mark "></span><a href="#">   lessismoreiammore</a></h5>
        </footer>

            <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         </body>
</html>
