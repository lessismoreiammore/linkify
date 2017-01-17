<?php
session_start();
require("resources/lib/functions.php");
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

		require("resources/blocks/components/header.php");
		require("resources/blocks/components/error.php");
        require("resources/blocks/components/message.php");

		$uid = $_SESSION["login"]["uid"];
		$users = dbGet($connection, "SELECT * FROM users WHERE id = '$uid';");

		foreach($users as $user) {
			$name = $user["name"];
			$username = $user["username"];
			$email = $user["email"];
			$avatar = $user["avatar"];

		}

		?>
		<div class="container">
			<div class="row margin-bottom margin-top vertical-align">
				<div class="col-md-4">
					<img src="/resources/img/users/<?php echo $uid ?>/<?php echo $avatar; ?>" style="width: 100%; height: 100%;" alt="">
				</div>
				<div class="col-md-4 side-borders">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<p>Name: </p>
								</div>
								<div class="col-md-6">
									<h5 class="text-left"><?= $name; ?></h5>
								</div>
							</div>

						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<p>Username: </p>
								</div>
								<div class="col-md-6">
									<h5><?= $username; ?></h5>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<p>Email: </p>
								</div>
								<div class="col-md-6">
									<h5><?= $email; ?></h5>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-md-4">
					<span class="glyphicon glyphicon-asterisk"></span>
					<span class="glyphicon glyphicon-asterisk"></span>
					<span class="glyphicon glyphicon-asterisk"></span>
					<span class="glyphicon glyphicon-asterisk"></span>
					<span class="glyphicon glyphicon-asterisk"></span>
				</div>
			</div>
			<div class="row vertical-align">
				<div class="col-md-4">
					<a href="/resources/blocks/settings/changeAvatar.php" class="btn btn-accent btn-danger white">Change Avatar</a>
				</div>
				<div class="col-md-4">
					<a href="/resources/blocks/settings/changeInfo.php" class="btn btn-accent btn-danger white">Edit info</a>
				</div>
				<div class="col-md-4">
					<a href="/resources/blocks/settings/changePassword.php" class="btn btn-accent btn-danger white">Change Password</a>
				</div>


			</div>

		</div>

        <footer>
            <h5><span class="glyphicon glyphicon-copyright-mark "></span><a href="#">   lessismoreiammore</a></h5>
        </footer>


            <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</body>
</html>
