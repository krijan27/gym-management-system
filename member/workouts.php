<?php
require_once "../includes/auth.php";
requireMember();

require_once "../config/database.php";

$stmt = $pdo->query("
SELECT workouts.*, trainers.first_name, trainers.last_name
FROM workouts
INNER JOIN trainers
ON workouts.trainer_id = trainers.id
ORDER BY workout_date
");

$workouts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Dostupni treninzi</h2>

<table border="1" cellpadding="8">

<tr>
    <th>Naziv</th>
    <th>Opis</th>
    <th>Datum</th>
    <th>Vrijeme</th>
    <th>Trener</th>
    <th>Akcija</th>
</tr>

<?php foreach($workouts as $workout): ?>

<tr>

<td><?= htmlspecialchars($workout["title"]) ?></td>

<td><?= htmlspecialchars($workout["description"]) ?></td>

<td><?= $workout["workout_date"] ?></td>

<td><?= $workout["workout_time"] ?></td>

<td>
<?= $workout["first_name"] . " " . $workout["last_name"] ?>
</td>

<td>

<a href="register_workout.php?id=<?= $workout["id"] ?>">
Prijavi se
</a>

</td>

</tr>

<?php endforeach; ?>

</table>
