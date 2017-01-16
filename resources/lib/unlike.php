<?php
session_start();

require("conn.php");

//Get uid of the user
$uId  = $_SESSION['login']['uid'];

if(isset($_GET['type'], $_GET['id'])){
    $type = $_GET['type'];
    // Make sure that id is stored as int
    $id =(int) $_GET['id'];

    switch ($type) {
        case 'post':
        // Need to check whether the post exists in database and whether the user has already voted
        $sql = "INSERT INTO unlikes (uid, postid)
            SELECT {$uId}, {$id}
            FROM posts
            WHERE EXISTS(
                SELECT id
                FROM posts
                WHERE id = {$id})
            AND NOT EXISTS(
                SELECT id
                FROM unlikes
                WHERE uid = {$uId}
                AND postid = {$id})
            LIMIT 1
            ";

            $connection->query($sql);
            break;
    }
}

header("Location: /");
die();
