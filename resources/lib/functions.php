<?php

require("conn.php");

//Creating function to validate the given email on registration
function validateEmail($connection, $email)
{
    $valid = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
    } else {
        if (dbGet($connection, "SELECT id FROM users WHERE email = '$email'", true)) {
            $valid = false;
        }
    }
    return $valid;
}

//Creating function to validate the given username on registration
function validateUsername($connection, $userName)
{
    if (dbGet($connection, "SELECT id FROM users WHERE username = '$userName'", true)) {
        return false;
    }
    return true;
}

//Creating a function to return an array of values with content escaped
function escapeData($connection, $items)
{
    foreach ($items as $i => $item) {
        $items[$i] = mysqli_real_escape_string($connection, $item);
    }
    return $items;
}

// Creating the function for registration, using the validation functions.
function registerUser($connection, $fullName, $userName, $email, $password)
{
    // Escape all the data received from the user
    list($fullName, $userName, $email, $password) = escapeData($connection, [$fullName, $userName, $email, $password]);

    // Validate the given email
    if (!validateEmail($connection, $email)) {
        session_start();
        $_SESSION["error"] = "The email is already in use. Try another one.";
        return false;
    }

    // Validate the given username
    if (!validateUsername($connection, $userName)) {
        session_start();
        $_SESSION["error"] = "The username is already taken. Try another one.";
        return false;
    }

    // Hash the given password
    $password = password_hash($password, PASSWORD_BCRYPT);

    // Check if registration worked, otherwise print error message.
    session_start();
    if (!dbPost($connection, "INSERT INTO users (username, email, password, name) VALUES ('$userName', '$email', '$password', '$fullName')")) {
        $_SESSION["error"] = "Registration failed. Please try again later.";
        return false;
    } else {
        $_SESSION["message"] = "Registration completed! You can now log in.";
        return true;
    }
}

//Create function for logging in the user
function loginUser($connection, $userName, $password)
{
    // Using escape function for the username and password by the user
    list($userName, $password) = escapeData($connection, [$userName, $password]);

    // Get the right user based on the username that is typed in
    $user = dbGet($connection, "SELECT * FROM users WHERE email = '$userName' OR username = '$userName'", true);
    if ($user) {
        // Checks if the password matched with the right user's password.
        if (password_verify($password, $user["password"])) {
            return $user["id"];
        }
    }
	 // Print error message if password and username don't match
    session_start();
    $_SESSION["error"] = "Invalid username, email or password.";
    return false;
}

function validateCookie($connection)
{
    $values = explode("|", $_COOKIE["linkify"]);
    $entry = dbGet($connection, "SELECT uid FROM tokens WHERE uid = '$values[1]' AND one = '$values[0]' AND two = '$values[2]' AND expire >= NOW()", true);
    return ($entry) ? $entry["uid"]:false;
}

// Creates a function to see if user is logged in. Using both SESSION and COOKIE array.
function checkLogin($connection)
{
    session_start();
    if (!isset($_SESSION["login"])) {
        if (!isset($_COOKIE["linkify"])) {
            return false;
        }
        if (!($uid = validateCookie($connection))) {
            return false;
        }
        $_SESSION["login"] = [
            "uid" => $uid
        ];
    }
    return true;
}

// Get the corresponding user info when user has been logged in
function getUserInfo($connection, $identification, $type = "id")
{
    $identification = mysqli_real_escape_string($connection, $identification);
    $user = [];
    if ($type === "id") {
        $user = dbGet($connection, "SELECT id, username, email, name FROM users WHERE id = '$identification'", true);
    } else if ($type === "username") {
        $user = dbGet($connection, "SELECT id, username, email, name FROM users WHERE username = '$identification'", true);
    }
    return $user;
}

function validateUserPassword($connection, $uid, $password)
{
    $hash = dbGet($connection, "SELECT password FROM users WHERE id = '$uid'", true)["password"];
    return password_verify($password, $hash);
}

function imageName ($length = 32)
{
    $string = "";
    $chars = array_merge(range("A", "Z"), range("a", "z"), range(0, 9));
    for ($i = 0; $i < $length; $i++) {
        $string .= $chars[array_rand($chars)];
    }
    return $string;
}

function uploadImage ($connection, $imageInfo, $type, $uid)
{
    $name = imageName() . strrchr($imageInfo["name"], ".");
    if (!move_uploaded_file($imageInfo["tmp_name"], "../img/users/$uid/$name")) {
        $_SESSION["error"] = "There was a problem uploading your image.";
    } else {
        if ($type === "avatar") {
            dbPost($connection, "UPDATE users SET avatar = '$name' WHERE id = '$uid'");
        }
    }
}
