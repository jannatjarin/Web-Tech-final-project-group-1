<?php

include 'db.php';

function getReviews()
{
    global $conn;

    $sql = "SELECT * FROM reviews";

    $result = $conn->query($sql);

    return $result;
}

?>