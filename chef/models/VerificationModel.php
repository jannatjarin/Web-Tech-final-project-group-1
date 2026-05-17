<?php

include 'db.php';

function addVerificationRequest($motivation, $credentials, $portfolio)
{
    global $conn;

    $status = "Pending";

    $sql = "INSERT INTO verification_requests(

            user_id,
            motivation,
            credentials,
            portfolio,
            status

            )

            VALUES(?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $user_id = 1;

    $stmt->bind_param(

        "issss",

        $user_id,
        $motivation,
        $credentials,
        $portfolio,
        $status

    );

    return $stmt->execute();
}

?>