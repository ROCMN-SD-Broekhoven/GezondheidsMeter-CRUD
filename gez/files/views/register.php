<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    header("Location: /start");
}

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $length = $_POST['length'];
    $weight = $_POST['weight'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password_repeat'];

    $Account = new Account();
    if ($Account->register($firstname, $lastname, $birthday, $email, $gender, $length, $weight, $password1, $password2) == true) {
        header("Location: /login");
    } else {
        echo "<script>alert('Something went wrong.')</script>";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/files/css/main.css">
    <link rel="stylesheet" href="/files/css/login_register.css">
    <title>Register</title>
</head>
<body>

<!-- Dit is de header -->
<?php
if (isset($_SESSION['login'])) {
    include "files/includes/header_start.php";
} else {
    include "files/includes/header_home.php";
}
?>

<h1 class="h1">Registreren</h1>
<form class="flex lr-content" action="" method="post">
    <div class="lr-input">
        <label for="firstName">Voornaam:</label>
        <input id="firstName" type="text" name="firstName" required autofocus>
    </div>
    <div class="lr-input">
        <label for="lastName">Achternaam:</label>
        <input id="lastName" type="text" name="lastName" required>
    </div>
    <div class="lr-input">
        <label for="birthday">Geboortedatum:</label>
        <input id="birthday" type="date" name="birthday" required>
    </div>
    <div class="lr-input">
        <label for="gender">Geslacht:</label>
        <select id="gender" name="gender" required>
            <option value="">---</option>
            <option value="M">Man</option>
            <option value="F">Vrouw</option>
        </select>
    </div>
    <div class="lr-input">
        <label for="length">Lengte: (cm)</label>
        <input id="length" type="number" step="1" min="0" max="300" name="length" required>
    </div>
    <div class="lr-input">
        <label for="weight">Gewicht: (kg)</label>
        <input id="weight" type="number" step="1" min="0" name="weight" required>
    </div>
    <div class="lr-input">
        <label for="email">E-mail:</label>
        <input id="email" type="email" name="email" required>
    </div>
    <div class="lr-input">
        <label for="password">Wachtwoord:</label>
        <input id="password" type="password" name="password" maxlength="15" required>
    </div>
    <div class="lr-input">
        <label for="password_repeat">Herhaal wachtwoord:</label>
        <input id="password_repeat" type="password" name="password_repeat" maxlength="15" required>
    </div>
    <div class="lr-input">
        <a href="/login" class="link">Al een account? Klik op deze link</a>
    </div>
    <div class="lr-input">
        <button type="submit" name="submit" class="button rounded">Aanmelden</button>
    </div>
</form>

<script src="/files/js/main.js"></script>
</body>
</html>