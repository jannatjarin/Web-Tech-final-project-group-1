<?php
session_start();

if (!isset($_SESSION['shopping_list'])) {
    $_SESSION['shopping_list'] = [];
}


