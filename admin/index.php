<?php
require_once "../includes/auth.php";
requireAdmin();
?>

<h2>Administratorski panel</h2>

<p>Dobrodošli u administracijski dio aplikacije Gym App.</p>

<ul>
    <li><a href="trainers.php">Upravljanje trenerima</a></li>
    <li><a href="workouts.php">Upravljanje treninzima</a></li>
</ul>

<br>

<a href="../public/dashboard.php">
Povratak na početnu stranicu
</a>
