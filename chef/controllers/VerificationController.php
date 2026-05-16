<?php

include '../models/VerificationModel.php';

$success = "";

if(isset($_POST["submit_request"]))
{
    $motivation = $_POST["motivation"];

    $credentials = $_POST["credentials"];

    $portfolio = $_POST["portfolio"];

    $result = addVerificationRequest(

        $motivation,
        $credentials,
        $portfolio

    );

    if($result)
    {
        $success = "Verification Request Submitted";
    }
}

?>