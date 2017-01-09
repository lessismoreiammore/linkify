<?php

//Creating the connection to the databse
$connection = mysqli_connect("localhost", "root", "root", "linkify");
mysqli_set_charset($connection, "utf8");

// Check  wheter connection works
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

// Creating function for the sql query and returns assoc/indexed array depending on the single variable
function dbGet($connection, $query, $single = false)
{
    $result = mysqli_query($connection, $query);

    $data = ($single) ? mysqli_fetch_assoc($result):[];
    if (!$single) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    
    mysqli_free_result($result);
    return $data;
}

// Creating the function for putting data into the databse. Success returns true and failure false.
function dbPost($connection, $query)
{
    return mysqli_query($connection, $query);
}
