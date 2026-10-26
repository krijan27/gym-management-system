<?php
require_once "../includes/auth.php";
requireAdmin();

require_once "../config/database.php";

$id = $_GET['id'] ?? 0;

$trainers = $pdo->query("SELECT * FROM trainers")->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM workouts WHERE id = ?");
$stmt->execute([$id]);
$workout = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$workout) {
    die("Trening nije pronađen.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $workout_date = $_POST["workout_date"];
    $workout_time = $_POST["workout_time"];
    $capacity = $_POST["capacity"];
    $trainer_id = $_POST["trainer_id"];

    $stmt = $pdo->prepare("
        UPDATE workouts
        SET title=?, description=?, workout_date=?, workout_time=?, capacity=?, trainer_id=?
        WHERE id=?
    ");

    $stmt->execute([
        $title,
        $description,
        $workout_date,
        $workout_time,
        $capacity,
        $trainer_id,
        $id
    ]);

    header("Location: workouts.php");
    exit;
}
?>

<h2>Uredi trening</h2>

<form method="POST">

    <label>Naziv:</label><br>
    <input type="text" name="title"
        value="<?php echo htmlspecialchars($workout['title']); ?>">
    <br><br>

    <label>Opis:</label><br>
    <textarea name="description"><?php echo htmlspecialchars($workout['description']); ?></textarea>
    <br><br>

    <label>Datum:</label><br>
    <input type="date" name="workout_date"
        value="<?php echo $workout['workout_date']; ?>">
    <br><br>

    <label>Vrijeme:</label><br>
    <input type="time" name="workout_time"
        value="<?php echo substr($workout['workout_time'],0,5); ?>">
    <br><br>

    <label>Kapacitet:</label><br>
    <input type="number" name="capacity"
        value="<?php echo $workout['capacity']; ?>">
    <br><br>

    <label>Trener:</label><br>
    <select name="trainer_id">

        <?php foreach($trainers as $trainer): ?>

            <option
                value="<?php echo $trainer['id']; ?>"
                <?php if($trainer['id'] == $workout['trainer_id']) echo "selected"; ?>
            >
                <?php echo $trainer['first_name']." ".$trainer['last_name']; ?>
            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <button type="submit">
        Spremi promjene
    </button>

</form>

<br>

<a href="workouts.php">Natrag</a>
