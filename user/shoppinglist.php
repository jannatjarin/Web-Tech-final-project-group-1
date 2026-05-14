<?php
session_start();

if (!isset($_SESSION['shopping_list'])) {
    $_SESSION['shopping_list'] = [];
}


if (isset($_POST['add_item'])) {

    $item = trim($_POST['item']);
    $qty = trim($_POST['qty']);
    $unit = trim($_POST['unit']);

    if ($item != "") {
        $_SESSION['shopping_list'][] = [
            "item" => $item,
            "qty" => $qty,
            "unit" => $unit
        ];
    }
}