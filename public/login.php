<?php
session_start();
require_once "../config/database.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email nije ispravan.";
    }

    if (empty($password)) {
        $errors[] = "Lozinka je obavezna.";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["first_name"];
            $_SESSION["role"] = $user["role"];

            header("Location: dashboard.php");
            exit;
        } else {
            $errors[] = "Pogrešan email ili lozinka.";
        }
    }
}
?>

<h2>Prijava</h2>

<?php foreach ($errors as $error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endforeach; ?>

<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Lozinka:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Prijavi se</button>
</form>

<br>
<a href="register.php">Nemaš račun? Registriraj se</a>
