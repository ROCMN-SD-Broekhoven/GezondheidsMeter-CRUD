<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    header("Location: /start");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $Account = new Account();
    if ($Account->login($email, $password) == true) {
        header("Location: /start");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}
?>
<!Doctype html>
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
    <title>Inloggen</title>
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

<h1 class="h1">Login</h1>
<form class="flex lr-content" action="" method="post">
    <div class="lr-input">
        <label for="email">E-mail:</label>
        <input id="email" type="email" name="email" required autofocus>
    </div>
    <div class="lr-input">
        <label for="password">Wachtwoord:</label>
        <input id="password" type="password" name="password" maxlength="15" required>
    </div>
    <div class="lr-input">
        <a href="/register">Nog geen account? Klik op deze link en maak hem aan</a>
    </div>
    <div class="lr-input">
        <button type="submit" name="submit" class="button rounded">Login</button>
    </div>
</form>

<script src="/files/js/main.js"></script>
</body>
</html>