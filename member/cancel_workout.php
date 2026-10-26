<?php
require_once "../includes/auth.php";
requireMember();

require_once "../config/database.php";

$id = $_GET["id"] ?? 0;

$stmt = $pdo->prepare("
DELETE FROM workout_registrations
WHERE id = ?
");

$stmt->execute([$id]);

header("Location: my_workouts.php");
exit;
