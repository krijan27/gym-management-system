<?php
require_once "../includes/auth.php";
requireAdmin();

require_once "../config/database.php";

$errors = [];

$trainers = $pdo->query("SELECT * FROM trainers")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $workout_date = $_POST["workout_date"];
    $workout_time = $_POST["workout_time"];
    $capacity = $_POST["capacity"];
    $trainer_id = $_POST["trainer_id"];

    if (empty($title)) {
        $errors[] = "Naziv treninga je obavezan.";
    }

    if ($capacity <= 0) {
        $errors[] = "Kapacitet mora biti veći od 0.";
    }

    if (empty($errors)) {

        $stmt = $pdo->prepare("
            INSERT INTO workouts
            (title, description, workout_date, workout_time, capacity, trainer_id)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $title,
            $description,
            $workout_date,
            $workout_time,
            $capacity,
            $trainer_id
        ]);

        header("Location: workouts.php");
        exit;
    }
}
?>

<h2>Dodavanje treninga</h2>

<?php foreach ($errors as $error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endforeach; ?>

<form method="POST">

    <label>Naziv treninga:</label><br>
    <input type="text" name="title"><br><br>

    <label>Opis:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Datum:</label><br>
    <input type="date" name="workout_date"><br><br>

    <label>Vrijeme:</label><br>
    <input type="time" name="workout_time"><br><br>

    <label>Kapacitet:</label><br>
    <input type="number" name="capacity"><br><br>

    <label>Trener:</label><br>
    <select name="trainer_id">

        <?php foreach($trainers as $trainer): ?>

            <option value="<?php echo $trainer["id"]; ?>">
                <?php echo $trainer["first_name"] . " " . $trainer["last_name"]; ?>
            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <button type="submit">
        Spremi trening
    </button>

</form>

<br>

<a href="workouts.php">
    Povratak na popis treninga
</a>
