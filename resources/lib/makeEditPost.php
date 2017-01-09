<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
        $date = date("Y-m-d H:i:s");
		  $title = $_POST["newTitle"];
		  $urlid = $_POST["urlid"];
        dbPost($connection, "UPDATE posts SET uid = '$uid', content = '$content', published = '$date', title = '$title' WHERE postid = '$urlid';)");
        header("Location: /");
        die();
    }
} else {
    header("Location: /");
    die();
}
