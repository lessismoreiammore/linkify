<?php

// Creating the variable if a login session has started
$loggedIn = isset($_SESSION["login"]);
if ($loggedIn) {
    $user = getUserInfo($connection, $_SESSION["login"]["uid"]);
}

//Sets the error and message to variables
$error = $_SESSION["error"] ?? "";
$message = $_SESSION["message"] ?? "";
 ?>

<header>
     <div class="container">
         <div class="row vertical-align">
			 <div class="col-md-2 col-xs-4">
				 <div class="logo">
		 			<h1>LINKIFY</h1>
		 		</div>
			 </div>

             <!--If the user is logged in the menu will be shown in the right corner  -->
             <?php if ($loggedIn): ?>
                 <div class="col-md-4 col-xs-8">
    				 <div class="welcomeMessage">
     					<h4>Welcome, <?php echo $user["username"] ?>!</h4>
     				</div>
    			 </div>
    			 <div class="col-md-6 col-xs-12">

                     <div class="row vertical-align">
                         <div class="col-md-2 col-xs-4">
                             <div class="userAvatar">
                                 <!-- The pick of the avatar if the user is just registred -->
                                 <?php
                                 if(isset($user["avatar"])){?>
                                     <img class="img-responsive img-circle" src="<?php echo $resourcesDir?>img/users/<?php echo $user["id"]?>/<?php echo $user["avatar"] ?>" alt="user avatar" style="background-size: cover; height: 40px; border:1px solid #333">
                                <?php
                            }else{?>
                                <img class="img-responsive img-circle" src="<?php echo $resourcesDir?>img/users/newUser.png" alt="user avatar" style="background-size: cover; height: 40px; border:1px solid #333">
                            <?php
                            }
                                  ?>

                             </div>
                         </div>
                        <div class="col-md-4 col-xs-8">
                            <button class="btn btn-danger btn-accent white" data-toggle="modal" data-target=".bs-example-modal-lg"  role="button">Write a post</button>

                            <!-- Modal with input form -->
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title">New post</h1>
                                    </div>
                                    <?php
                                    require("writePost.php");
                                     ?>
                            </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-6 col-xs-12">
                                <ul>
                                    <li> <a href="/settings.php">Profile settings</a></li>
                                    <li><a href="/resources/lib/userPosts.php">My posts</a></li>
                                    <li><a href="/logout.php">Log out</a></li>
                             </ul>
                         </div>

     			    </div>

         </div>
        <?php endif; ?>
     </div>
 </div>
</header>
