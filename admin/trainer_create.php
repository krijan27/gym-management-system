<?php
require_once "../includes/auth.php";
requireAdmin();

require_once "../config/database.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $specialization = trim($_POST["specialization"]);
    $email = trim($_POST["email"]);

    if (empty($first_name)) {
        $errors[] = "Ime je obavezno.";
    }

    if (empty($last_name)) {
        $errors[] = "Prezime je obavezno.";
    }

    if (empty($specialization)) {
        $errors[] = "Specijalizacija je obavezna.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email nije ispravan.";
    }

    if (empty($errors)) {

        $stmt = $pdo->prepare("
            INSERT INTO trainers
            (first_name, last_name, specialization, email)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([
            $first_name,
            $last_name,
            $specialization,
            $email
        ]);

        header("Location: trainers.php");
        exit;
    }
}
?>

<h2>Dodavanje trenera</h2>

<?php foreach ($errors as $error): ?>
    <p style="color:red;">
        <?php echo $error; ?>
    </p>
<?php endforeach; ?>

<form method="POST">

    <label>Ime:</label><br>
    <input type="text" name="first_name"><br><br>

    <label>Prezime:</label><br>
    <input type="text" name="last_name"><br><br>

    <label>Specijalizacija:</label><br>
    <input type="text" name="specialization"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <button type="submit">
        Spremi trenera
    </button>

</form>

<br>

<a href="trainers.php">
    Povratak na popis trenera
</a>
