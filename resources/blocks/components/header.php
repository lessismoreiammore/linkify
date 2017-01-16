<?php
session_start();

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
			 <div class="col-md-2">
				 <div class="logo">
		 			<h1>LINKIFY</h1>
		 		</div>
			 </div>

             <!--If the user is logged in the menu will be shown in the right corner  -->
             <?php if ($loggedIn): ?>
                 <div class="col-md-4">
    				 <div class="welcomeMessage">
     					<h4>Welcome, <?php echo $user["username"] ?>!</h4>
     				</div>
    			 </div>
    			 <div class="col-md-6">

                     <div class="row vertical-align">
                         <div class="col-md-2">
                             <div class="userAvatar">
                                 <img class="img-responsive img-rounded" src="resources/img/users/<?php echo $user["id"]?>/<?php echo $user["avatar"] ?>" alt="user avatar" style="background-size: cover; height: 40px; border:1px solid #333">
                             </div>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-danger" href="/resources/blocks/components/writePost.php" role="button">Write a post</a>
                        </div>
                        <div class="col-md-6">
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
