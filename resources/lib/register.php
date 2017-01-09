<?php
require("functions.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Checking if a value was inserted in each field
    if ($_POST["fullname"] !== "" && $_POST["username"] !== "" && $_POST["email"] !== "" && $_POST["password"] !== "") {
        // If recieving all information, an registration attempt starts, using the register function.
        registerUser($connection, $_POST["fullname"], $_POST["username"], $_POST["email"], $_POST["password"]);
    } else {
        // If there were missing fields, print error message.
        session_start();
        $_SESSION["error"] = "Missing fields when register user. Please try again.";
    }
    header("Location: /");
    die();
}
