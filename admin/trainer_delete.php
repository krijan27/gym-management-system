<?php
require_once "../includes/auth.php";
requireAdmin();

require_once "../config/database.php";

if (!isset($_GET["id"])) {
    die("ID trenera nije naveden.");
}

$id = $_GET["id"];

$stmt = $pdo->prepare("DELETE FROM trainers WHERE id = ?");
$stmt->execute([$id]);

header("Location: trainers.php");
exit;
