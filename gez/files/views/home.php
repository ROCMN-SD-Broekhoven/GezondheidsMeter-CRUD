<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    header("Location: /start");
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
    <link rel="stylesheet" href="/files/css/home.css">
    <title>Home</title>
</head>
<body class="background">

<!-- Dit is de header -->
<?php
    if (isset($_SESSION['login'])) {
        include "files/includes/header_start.php";
    } else {
        include "files/includes/header_home.php";
    }
?>

<h1 class="h1">Welkom bij Gezondheidsmeter</h1>
<p class="main">De website van Volksgezondheid waar u kunt testen, hoe gezond u bezig bent<br> en wat u eventueel nog kan verbeteren.</p>

<script src="/files/js/main.js"></script>

</body>
</html>
