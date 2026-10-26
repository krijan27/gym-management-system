<?php
require_once "../includes/auth.php";
requireAdmin();

require_once "../config/database.php";

$stmt = $pdo->query("
    SELECT workouts.*, trainers.first_name, trainers.last_name
    FROM workouts
    INNER JOIN trainers ON workouts.trainer_id = trainers.id
    ORDER BY workouts.workout_date DESC
");

$workouts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Popis treninga</h2>

<a href="workout_create.php">Dodaj novi trening</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Opis</th>
        <th>Datum</th>
        <th>Vrijeme</th>
        <th>Kapacitet</th>
        <th>Trener</th>
        <th>Akcije</th>
    </tr>

    <?php foreach ($workouts as $workout): ?>
        <tr>
            <td><?php echo $workout["id"]; ?></td>
            <td><?php echo htmlspecialchars($workout["title"]); ?></td>
            <td><?php echo htmlspecialchars($workout["description"]); ?></td>
            <td><?php echo $workout["workout_date"]; ?></td>
            <td><?php echo $workout["workout_time"]; ?></td>
            <td><?php echo $workout["capacity"]; ?></td>
            <td>
                <?php echo htmlspecialchars($workout["first_name"] . " " . $workout["last_name"]); ?>
            </td>
            <td>
                <a href="workout_edit.php?id=<?php echo $workout["id"]; ?>">Uredi</a>
                |
                <a href="workout_delete.php?id=<?php echo $workout["id"]; ?>"
                   onclick="return confirm('Jeste li sigurni da želite obrisati trening?');">
                   Obriši
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="index.php">Natrag na admin panel</a>
