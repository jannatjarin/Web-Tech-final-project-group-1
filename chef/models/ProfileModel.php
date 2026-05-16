<?php

include 'db.php';

function getProfile()
{
    global $conn;

    $sql = "SELECT * FROM chef_profiles LIMIT 1";

    $result = $conn->query($sql);

    return $result->fetch_assoc();
}

function updateProfile($display_name, $specialization, $bio, $experience, $website, $instagram, $youtube)
{
    global $conn;

    $sql = "UPDATE chef_profiles

            SET display_name=?,
                specialization=?,
                bio=?,
                years_experience=?,
                website=?,
                instagram=?,
                youtube=?

            WHERE id=1";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(

        "sssisss",

        $display_name,
        $specialization,
        $bio,
        $experience,
        $website,
        $instagram,
        $youtube

    );

    return $stmt->execute();
}

?>