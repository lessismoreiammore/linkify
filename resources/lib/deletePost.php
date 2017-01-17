<?php

//get the post id from the form
$postDelid = $_POST["idPost"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// session_start();
    require("functions.php");

    if (!checkLogin($connection)) {
        header("Location: /");
        die();
    }

//delete a row from the database according to the id
    $action = $_POST["deleteAction"];
    if ($action === "deletePost") {
        if (!dbPost($connection, "DELETE FROM posts WHERE id = '$postDelid'")) {
                    $_SESSION["error"] = "Could not connect to the database, try again later.";
                } else {
                    $_SESSION["message"] = "Success! The post has been deleted.";
                    }

        header("Location: /");
        die();
    }
} else {
    header("Location: /");
    die();
}
