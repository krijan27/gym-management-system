<?php
require_once "../includes/auth.php";
requireAdmin();

require_once "../config/database.php";

$stmt = $pdo->query("SELECT * FROM trainers ORDER BY id DESC");
$trainers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Popis trenera</h2>

<a href="trainer_create.php">Dodaj novog trenera</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Ime</th>
        <th>Prezime</th>
        <th>Specijalizacija</th>
        <th>Email</th>
        <th>Akcije</th>
    </tr>

    <?php foreach ($trainers as $trainer): ?>
        <tr>
            <td><?php echo $trainer["id"]; ?></td>
            <td><?php echo htmlspecialchars($trainer["first_name"]); ?></td>
            <td><?php echo htmlspecialchars($trainer["last_name"]); ?></td>
            <td><?php echo htmlspecialchars($trainer["specialization"]); ?></td>
            <td><?php echo htmlspecialchars($trainer["email"]); ?></td>
            <td>
                <a href="trainer_edit.php?id=<?php echo $trainer["id"]; ?>">Uredi</a>
                |
                <a href="trainer_delete.php?id=<?php echo $trainer["id"]; ?>"
                   onclick="return confirm('Jeste li sigurni da želite obrisati trenera?');">
                   Obriši
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="index.php">Natrag na admin panel</a>
