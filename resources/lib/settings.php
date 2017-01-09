<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	session_start();
    require("functions.php");

    $action = $_POST["action"] ?? "";

    if ($action === "changeInfo") {
        if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {
            $_SESSION["error"] = "Missing field. Check all fields and try again.";
            header("Location: /resources/blocks/settings/changeInfo.php");
            die();
        }

        if (!validateUserPassword($connection, $_SESSION["login"]["uid"], $_POST["password"])) {
            $_SESSION["error"] = "Wrong password, try again.";
            header("Location: /resources/blocks/settings/changeInfo.php");
            die();
        }

        $uid = $_SESSION["login"]["uid"];
        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $email = mysqli_real_escape_string($connection, $_POST["email"]);

        if (!dbPost($connection, "UPDATE users SET username = '$username', email = '$email' WHERE id = '$uid'")) {
            $_SESSION["error"] = "Could not connect to the database, try again later.";
        } else {
            $_SESSION["message"] = "Success! Your changes has been registred.";
        }

        header("Location: /settings.php");
        die();
	  } else if ($action === "changePassword") {

        if (empty($_POST["newPassword"]) || empty($_POST["repeatPassword"]) || empty($_POST["password"])) {
            $_SESSION["error"] = "All fields required, try again.";
            header("Location: /resources/blocks/settings/changePassword.php");
            die();
        }

        if ($_POST["newPassword"] !== $_POST["repeatPassword"]) {
            $_SESSION["error"] = "The entered passwords do not match, try again.";
            header("Location: /resources/blocks/settings/changePassword.php");
            die();
        }

        if (!validateUserPassword($connection, $_SESSION["login"]["uid"], $_POST["password"])) {
            $_SESSION["error"] = "Invalid password.";
            header("Location: /resources/blocks/settings/changePassword.php");
            die();
        }

        $uid = $_SESSION["login"]["uid"];
        $password = password_hash($_POST["newPassword"], PASSWORD_BCRYPT);
        if (!dbPost($connection, "UPDATE users SET password = '$password' WHERE id = '$uid'")) {
            $_SESSION["error"] = "Something went wrong with the database request.";
        } else {
            $_SESSION["message"] = "Your password has now been changed.";
        }

        header("Location: /settings.php");
        die();
    } else if ($action === "changeAvatar") {

        if (!validateUserPassword($connection, $_SESSION["login"]["uid"], $_POST["password"])) {
            $_SESSION["error"] = "Invalid password.";
            header("Location: /resources/blocks/settings/changeAvatar.php");
            die();
        }

        if (!file_exists("../img/users")) {
            mkdir("../img/users");
        }
        if (!file_exists("../img/users/{$_SESSION["login"]["uid"]}")) {
            mkdir("../img/users/{$_SESSION["login"]["uid"]}");
        }

        if ($_FILES["avatar"]["error"] === 0) {
            uploadImage($connection, $_FILES["avatar"], "avatar", $_SESSION["login"]["uid"]);
        }

        header("Location: /resources/blocks/settings/changeAvatar.php");
        die();
    }



  }




?>
