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
