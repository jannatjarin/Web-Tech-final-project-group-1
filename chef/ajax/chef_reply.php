<?php

include '../models/db.php';

if(isset($_POST["review_id"]))
{
    $review_id = $_POST["review_id"];

    $reply = $_POST["reply"];

    $sql = "UPDATE reviews
            SET chef_reply=?
            WHERE id=?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("si", $reply, $review_id);

    if($stmt->execute())
    {
        echo "success";
    }
    else
    {
        echo "failed";
    }
}

?>