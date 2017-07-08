<?php

session_start();

if (!isset($_SESSION["email"]) || $_SESSION["email"] == NULL || $_SESSION['role_id'] !== 1 ) {
    $url = 'index.php?action=login';
    header("Location: " . $url);
    exit();
}