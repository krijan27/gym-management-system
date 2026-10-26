<?php
require_once "../config/database.php";

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($first_name)) {
        $errors[] = "Ime je obavezno.";
    }

    if (empty($last_name)) {
        $errors[] = "Prezime je obavezno.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email nije ispravan.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Lozinka mora imati najmanje 6 znakova.";
    }

    if (empty($errors)) {
        $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->rowCount() > 0) {
            $errors[] = "Korisnik s tim emailom već postoji.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare(
                "INSERT INTO users (first_name, last_name, email, password, role)
                 VALUES (?, ?, ?, ?, 'clan')"
            );

            $stmt->execute([$first_name, $last_name, $email, $hashedPassword]);

            $success = "Registracija je uspješna. Sada se možeš prijaviti.";
        }
    }
}
?>

<h2>Registracija</h2>

<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<?php if ($success): ?>
    <p style="color:green;"><?php echo $success; ?></p>
<?php endif; ?>

<form method="POST">
    <label>Ime:</label><br>
    <input type="text" name="first_name"><br><br>

    <label>Prezime:</label><br>
    <input type="text" name="last_name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Lozinka:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Registriraj se</button>
</form>

<br>
<a href="login.php">Već imaš račun? Prijavi se</a>
