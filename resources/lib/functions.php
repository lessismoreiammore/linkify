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
