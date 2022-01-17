<?php

if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header("Location: /");
}

$Meter = new Meter();
if ($Meter->checkToday()) {
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
    <link rel="stylesheet" href="/files/css/daily.css">
    <title>Dagelijkse test</title>
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

<form class="daily-form" method="post" action="/result">
    <?php
    $Daily = new Daily();
    $vragen = $Daily->getQuestions();

//        $vragen = [
//            '<label class="lbls">Hoe heeft u vandaag geslapen?',
//            '<label class="lbls">Hoe lang heeft heeft u vandaag bewogen?',
//            '<label class="lbls">Hoeveel water heeft u vandaag gedronken?',
//            '<label class="lbls">Heeft u vandaag gezond gegeten?',
//            '<label class="lbls">Hoeveel uur heeft u vandaag achter een beeldscherm gezeten?',
//            '<label class="lbls">Hoe bent u vandaag van A naar B gegaan?',
//            '<label class="lbls">Heeft u vandaag last gehad van hartkloppingen of andere hartkwalen?',
//            '<label class="lbls">Heeft u last gehad van longklachten?',
//            '<label class="lbls">Heeft u last gehad van hooikoorts?',
//            '<label class="lbls">Rookt u sigaretten?',
//            '<label class="lbls">Gebruikt u drugs?',
//        ];
//    $query_select = "SELECT * FROM questions ORDER BY id DESC;";
//    $result_select = mysqli_query($query_select) or die(mysqli_eror());
//    while($row = mysqli_fetch_array($result_select))
//        $rows[] = $row;
//    foreach($rows as $row) {
//        $ename = stripslashes($row['questiontext']);
//        $eemail = stripcslashes($row['catagory']);
//        $eid = $row['id'];
//        '<label class="lbls">'.$ename;
//
//    }
//
//        $antwoorden = [
//            [
//                'Slecht',
//                'Matig',
//                'Gemiddeld',
//                'Goed',
//            ],
//            [
//                'Niet',
//                'Minder dan 1 uur',
//                'Tussen 1 uur en 2 uur',
//                'meer dan 2 uur',
//            ],
//            [
//                'Minder dan 0,5 liter',
//                'Tussen 0,5 en 1 liter',
//                'Tussen 1 en 2 liter',
//                '2 liter of meer',
//            ],
//            [
//                'Nee',
//                'Ja',
//            ],
//            [
//                'meer dan 10 uur',
    //                'Tussen 5 uur en 10 uur',
//                'Tussen 1 uur en 5 uur',
//                'Minder dan 1 uur',
//            ],
//            [
//                'Met de trein of auto',
//                'Lopend of met de fiets',
//            ],
//            [
//                'Ja',
//                'Nee',
//            ],
//            [
//                'Ja',
//                'Nee',
//            ],
//            [
//                'Ja',
//                'Nee',
//            ],
//            [
//                'Ja',
//                'Nee',
//            ],
//            [
//                'Ja',
//                'Nee',
//            ],
//        ];
//    $query_select = "SELECT * FROM questions ORDER BY id DESC;";
//    $result_select = mysqli_query($query_select) or die(mysqli_error());
//    $vragen = array();
//    while($vraag = mysqli_fetch_array($result_select))
//        $vragen[] = $vraag;
//

//    $index = 0;
//    var_dump($index);
//    echo "<br>";
//    echo "<br>";
//    var_dump($vragen);
//    echo "<br>";
//    echo "<br>";
//    var_dump($antwoorden);
//    echo "<br>";
//    echo "<br>";

    foreach ($vragen as $index => $vraag) {
        echo "<div class='question'>$vraag[1]</div>";

        $antwoorden = $Daily->getAnswers($vraag[0]);
        foreach ($antwoorden as $antwoord) {
            echo "<div class='input-container'>
                <input required id='vraag[".$index."][".$antwoord[0]."]' type='radio' value='".$antwoord[2]."' name='vraag[$index]'>
                <label for='vraag[".$index."][".$antwoord[0]."]'>$antwoord[1]</label>
                </div>";
        }
    }
    ?>
    <button class="daily-form-submit" type="submit" name="submit">Versturen</button>
</form>

<script src="/files/js/main.js"></script>
</body>
</html>
