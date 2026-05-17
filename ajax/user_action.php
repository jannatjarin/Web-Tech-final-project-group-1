<?php
session_start();
include("../config.php");

header('Content-Type: application/json');

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    echo json_encode([
        'success' => false,
        'message' => 'Unauthorized Access'
    ]);

    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_POST['id'];
    $action = $_POST['action'];

    if($action == 'activate')
    {
        $stmt = $conn->prepare("UPDATE users SET is_active=1 WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        echo json_encode([
            'success' => true,
            'message' => 'User Activated Successfully'
        ]);
    }

    else if($action == 'deactivate')
    {
        $stmt = $conn->prepare("UPDATE users SET is_active=0 WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        echo json_encode([
            'success' => true,
            'message' => 'User Deactivated Successfully'
        ]);
    }

    else if($action == 'make_moderator')
    {
        $stmt = $conn->prepare("UPDATE users SET role='moderator' WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        echo json_encode([
            'success' => true,
            'message' => 'User Promoted To Moderator'
        ]);
    }

    else if($action == 'remove_moderator')
    {
        $stmt = $conn->prepare("UPDATE users SET role='user' WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        echo json_encode([
            'success' => true,
            'message' => 'Moderator Removed Successfully'
        ]);
    }
}
?>
