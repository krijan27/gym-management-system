<?php
require_once "../includes/auth.php";
requireMember();

require_once "../config/database.php";

$user_id = $_SESSION["user_id"];

$stmt = $pdo->prepare("
SELECT 
    workout_registrations.id AS registration_id,
    workouts.title,
    workouts.description,
    workouts.workout_date,
    workouts.workout_time,
    trainers.first_name,
    trainers.last_name
FROM workout_registrations
INNER JOIN workouts ON workout_registrations.workout_id = workouts.id
INNER JOIN trainers ON workouts.trainer_id = trainers.id
WHERE workout_registrations.user_id = ?
ORDER BY workouts.workout_date
");

$stmt->execute([$user_id]);
$registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Moji treninzi</h2>

<a href="workouts.php">Dostupni treninzi</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Naziv</th>
        <th>Opis</th>
        <th>Datum</th>
        <th>Vrijeme</th>
        <th>Trener</th>
        <th>Akcija</th>
    </tr>

    <?php foreach ($registrations as $registration): ?>
        <tr>
            <td><?php echo htmlspecialchars($registration["title"]); ?></td>
            <td><?php echo htmlspecialchars($registration["description"]); ?></td>
            <td><?php echo $registration["workout_date"]; ?></td>
            <td><?php echo $registration["workout_time"]; ?></td>
            <td>
                <?php echo htmlspecialchars($registration["first_name"] . " " . $registration["last_name"]); ?>
            </td>
            <td>
                <a href="cancel_workout.php?id=<?php echo $registration["registration_id"]; ?>"
                   onclick="return confirm('Jeste li sigurni da se želite odjaviti s treninga?');">
                   Odjavi se
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="../public/dashboard.php">Natrag na dashboard</a>
