<?php
session_start();
include("../config.php");

header("Content-Type: application/json");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    echo json_encode([
        "status" => "error",
        "message" => "Unauthorized Access"
    ]);
    exit();
}

if(!isset($_POST['id']) || !isset($_POST['action']))
{
    echo json_encode([
        "status" => "error",
        "message" => "Invalid Request"
    ]);
    exit();
}

$id = $_POST['id'];
$action = $_POST['action'];

if($action == "activate")
{
    $stmt = $conn->prepare("UPDATE users SET is_active = 1 WHERE id = ?");
    $stmt->bind_param("i", $id);
}

elseif($action == "deactivate")
{
    $stmt = $conn->prepare("UPDATE users SET is_active = 0 WHERE id = ?");
    $stmt->bind_param("i", $id);
}

elseif($action == "make_moderator")
{
    $stmt = $conn->prepare("UPDATE users SET role = 'moderator' WHERE id = ?");
    $stmt->bind_param("i", $id);
}

elseif($action == "remove_moderator")
{
    $stmt = $conn->prepare("UPDATE users SET role = 'user' WHERE id = ?");
    $stmt->bind_param("i", $id);
}

else
{
    echo json_encode([
        "status" => "error",
        "message" => "Invalid Action"
    ]);
    exit();
}

if($stmt->execute())
{
    echo json_encode([
        "status" => "success",
        "message" => "User Updated Successfully"
    ]);
}
else
{
    echo json_encode([
        "status" => "error",
        "message" => "Database Error"
    ]);
}
?>