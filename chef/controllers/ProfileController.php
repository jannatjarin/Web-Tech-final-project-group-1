<?php

include '../models/ProfileModel.php';

$profile = getProfile();

$success = "";

if(isset($_POST["update_profile"]))
{
    $display_name = $_POST["display_name"];

    $specialization = $_POST["specialization"];

    $bio = $_POST["bio"];

    $experience = $_POST["experience"];

    $website = $_POST["website"];

    $instagram = $_POST["instagram"];

    $youtube = $_POST["youtube"];

    $result = updateProfile(

        $display_name,
        $specialization,
        $bio,
        $experience,
        $website,
        $instagram,
        $youtube

    );

    if($result)
    {
        $success = "Profile Updated Successfully";

        $profile = getProfile();
    }
}

?>