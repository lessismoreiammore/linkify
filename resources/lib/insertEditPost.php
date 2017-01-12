<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// session_start();
    require("functions.php");

    if (!checkLogin($connection)) {
        header("Location: /");
        die();
    }

    $action = $_POST["editAction"];
    if ($action === "editPost") {
        if (empty($_POST["newContent"]) || empty($_POST["newTitle"])) {
            $_SESSION["error"] = "Something missing.";
            header("Location: /");
            die();
        }

        $content = mysqli_real_escape_string($connection, $_POST["newContent"]);
        $uid = $_SESSION["login"]["uid"];
		  $title = ($_POST["newTitle"]);
          $link = ($_POST["newLink"]);
		  $urlid = $_POST["urlid"];

		  if (!dbPost($connection, "UPDATE posts SET uid = '$uid', content = '$content', title = '$title', link = '$link' WHERE id = '$urlid'")) {
            $_SESSION["error"] = "Could not connect to the database, try again later.";
        } else {
            $_SESSION["message"] = "Success! Your changes has been registred.";
        }

        header("Location: /");
        die();
    }
} else {
    header("Location: /");
    die();
}
