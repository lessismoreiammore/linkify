<?php

require("functions.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Check that username and password both have values.
    if ($_POST["username"] !== "" && $_POST["password"] !== "") {
        //If they have values start an attempt to login using the login function
        if ($uid = loginUser($connection, $_POST["username"], $_POST["password"])) {
            session_start();
            $_SESSION["login"] = [
                "uid" => $uid
            ];
				//Create cookie if remember box has been filled in.
            if (isset($_POST["remember"])) {
                createLoginCookie($connection, $uid);
            }
        }
    } else {
        //Print error message if fields are missing
        session_start();
        $_SESSION["error"] = "Missing fields when logging in. Please try again.";
    }
    header("Location: /");
    die();
}
