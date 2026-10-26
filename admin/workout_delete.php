<?php
require_once "../includes/auth.php";
requireAdmin();

require_once "../config/database.php";

$id = $_GET["id"] ?? 0;

$stmt = $pdo->prepare("DELETE FROM workouts WHERE id = ?");
$stmt->execute([$id]);

header("Location: workouts.php");
exit;
