<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require("functions.php");

    if (!checkLogin($connection)) {
        header("Location: /");
        die();
    }

    $action = $_POST["commentAction"];
    if ($action === "createComment") {
        if (!isset($_POST["content"]) || empty($_POST["content"])) {
            $_SESSION["error"] = "Enter some content in order to comment.";
            header("Location: /");
            die();
        }

        $postId = $_POST["postId"];
		$content = mysqli_real_escape_string($connection, $_POST["content"]);
        $uid = $_SESSION["login"]["uid"];
        $date = date("Y-m-d H:i:s");
        dbPost($connection, "INSERT INTO comments (post_id, uid, content, published) VALUES ('$postId', '$uid', '$content', '$date')");
        header("Location: /");
        die();
    }
} else {
    header("Location: /");
    die();
}
