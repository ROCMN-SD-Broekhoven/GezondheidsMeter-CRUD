<?php
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header("Location: /");
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
    <link rel="stylesheet" href="/files/css/result.css">
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

if(isset($_POST['submit'])) {
    $totaal = 0;
    foreach ($_POST['vraag'] as $antwoord) {
        $totaal += (int) $antwoord;
    }

    $Meter = new Meter();
    if ($Meter->newScore($totaal)) {
        if ($totaal > 0 && $totaal <= 14) {
            echo '<h2 class="h2">Kijk uit! dit kan beter!</h2>';
            echo '<h3 class="h3">Het gaat niet goed, probeer gezonder te zijn!</h3>';
        } elseif ($totaal >= 14 && $totaal < 24) {
            echo '<h2 class="h2">Kan gezonder!</h2>';
        } elseif ($totaal >= 24 && $totaal < 32) {
            echo '<h2 class="h2">Goed op weg!</h2>';
            echo '<h3 class="h3">Het gaat goed, maar het kan nog beter!</h3>';
        } elseif ($totaal >= 32 && $totaal <= 38) {
            echo '<h2 class="h2">Ga zo door!</h2>';
            echo '<h3 class="h3">Het gaat goed, hou dit vol!</h3>';
        }
    } else {
        echo '<h2 class="h2">Er is iets fout gegaan!</h2>';
    }
    echo '<h4 class="h4"><a href="/start">Ga terug naar de Home pagina</a></h4>';
}
?>
<p></p>
<script src="/files/js/main.js"></script>
</body>
</html>