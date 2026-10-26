<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

require_once "../config/database.php";
?>

<h2>Početna stranica</h2>

<p>Pozdrav, <?php echo $_SESSION["user_name"]; ?>!</p>

<p>Tvoja uloga: <?php echo $_SESSION["role"]; ?></p>

<?php if($_SESSION["role"] == "admin"): ?>

<?php

$users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$trainers = $pdo->query("SELECT COUNT(*) FROM trainers")->fetchColumn();
$workouts = $pdo->query("SELECT COUNT(*) FROM workouts")->fetchColumn();
$registrations = $pdo->query("SELECT COUNT(*) FROM workout_registrations")->fetchColumn();

?>

<h3>Statistika</h3>

<ul>
    <li>Broj korisnika: <?php echo $users; ?></li>
    <li>Broj trenera: <?php echo $trainers; ?></li>
    <li>Broj treninga: <?php echo $workouts; ?></li>
    <li>Broj prijava: <?php echo $registrations; ?></li>
</ul>

<a href="../admin/trainers.php">Upravljanje trenerima</a>
<br><br>

<a href="../admin/workouts.php">Upravljanje treninzima</a>

<?php else: ?>

<h3>Član teretane</h3>

<a href="../member/workouts.php">
Dostupni treninzi
</a>

<br><br>

<a href="../member/my_workouts.php">
Moji treninzi
</a>

<?php endif; ?>

<br><br>

<a href="logout.php">
Odjava
</a>
