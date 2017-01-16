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
         <div class="row">
			 <div class="col-md-2">
				 <div class="logo">
		 			<h1>LINKIFY</h1>
		 		</div>
			 </div>
			 <div class="col-md-4">
				 <div class="welcomeMessage">
 					<p>Welcome, user!</p>
 				</div>
			 </div>
			 <div class="col-md-6">
				 <div class="mainMenu">
                     <div class="row">
                         <div class="col-md-6">

                         </div>
                         <div class="col-md-6">
                             <a href="#">Profile</a>
                             <a href="#">Settings</a>
                             <a href="#">My posts</a>
                             <a href="#">Log out</a>
                         </div>

                     </div>
 				</div>

			 </div>

         </div>

     </div>





        <!-- <?php if ($loggedin): ?> -->
            <!-- <div class="welcomeMessage">
                <p>Welcome, <?php echo $user["username"] ?></p>
            </div> -->
        <!-- <?php endif; ?> -->

</header>
