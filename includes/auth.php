<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function requireLogin() {
    if (!isset($_SESSION["user_id"])) {
        header("Location: ../public/login.php");
        exit;
    }
}

function requireAdmin() {
    requireLogin();

    if ($_SESSION["role"] !== "admin") {
        die("Nemate dopuštenje za pristup ovoj stranici.");
    }
}

function requireMember() {
    requireLogin();

    if ($_SESSION["role"] !== "clan") {
        die("Nemate dopuštenje za pristup ovoj stranici.");
    }
}
