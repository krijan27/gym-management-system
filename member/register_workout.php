<?php
require_once "../includes/auth.php";
requireMember();

require_once "../config/database.php";

$workout_id = $_GET["id"];
$user_id = $_SESSION["user_id"];

$stmt = $pdo->prepare("
INSERT IGNORE INTO workout_registrations
(user_id, workout_id)
VALUES (?, ?)
");

$stmt->execute([
    $user_id,
    $workout_id
]);

header("Location: workouts.php");
exit;
