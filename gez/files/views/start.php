<?php
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header("Location: /");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/files/css/main.css">
    <link rel="stylesheet" href="/files/css/start.css">
    <link rel="stylesheet" href="/files/css/meter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <title>Startpagina</title>
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

<div class="meter">
    <div id="meter_container" class="meter_container">
        <div class="meter_background"></div>

        <div class="meter_background_green"></div>
        <div class="meter_background_yellow"></div>
        <div class="meter_background_orange"></div>
        <div class="meter_background_red"></div>

        <div class="meter_background_circle"></div>
        <div id="meter_arrow" class="meter_arrow"></div>
        <div class="meter_origin"></div>

        <canvas id="meter_canvas" class="meter_canvas" width="500" height="250"></canvas>
    </div>
    <div class="chart-container2">
        <canvas id="my_Chart"></canvas>
    </div>
</div>

<script src="/files/js/main.js"></script>
<script src="/files/js/meter.js"></script>
<script>
    var chart = JSC.chart('chartDiv', {
        debug: true,
        type: 'gauge ',
        legend_visible: false,
        chartArea_boxVisible: false,
        xAxis: {
            /*Used to position marker on top of axis line.*/
            scale: { range: [0, 1], invert: true }
        },
        palette: {
            pointValue: '%yValue',
            ranges: [
                { value: 350, color: '#FF5353' },
                { value: 600, color: '#FFD221' },
                { value: 700, color: '#77E6B4' },
                { value: [800, 850], color: '#21D683' }
            ]
        },
        yAxis: {
            defaultTick: { padding: 13, enabled: false },
            customTicks: [600, 700, 800],
            line: {
                width: 15,
                breaks_gap: 0.03,
                color: 'smartPalette'
            },
            scale: { range: [350, 850] }
        },
        defaultSeries: {
            opacity: 1,
            shape: {
                label: {
                    align: 'center',
                    verticalAlign: 'middle'
                }
            }
        },
        series: [
            {
                type: 'marker',
                name: 'Score',
                shape_label: {
                    text:
                        "720<br/> <span style='fontSize: 35'>Great!</span>",
                    style: { fontSize: 48 }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                        outline: {
                            width: 10,
                            color: 'currentColor'
                        },
                        fill: 'white',
                        type: 'circle',
                        visible: true,
                        size: 30
                    }
                },
                points: [[1, 720]]
            }
        ]
    });
</script>
<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "gezondheidsmeter");

// Assign variables
$labels = $datas = "";

// Select query to fetch data with page load
$sql = "select * from results Where UserID =".$_SESSION['uid']." order by ID desc limit 10";
$result = $conn->query($sql);

// Create data in comma seperated string
while($row = $result->fetch_assoc()){
    $labels .= "'" . $row['Date'] . "',";
    $datas .= $row['Score'] . ",";
}

// Remove the last comma from the string
$lbl = trim($labels, ",");
$val = trim($datas, ",");
?>

<script>
    var lbl = [<?= $lbl ?>]; // Get Labels from php variable
    var val = [<?= $val ?>]; // Get Data from php variable
    // Chart data with page load
    myData = {
        labels: lbl,
        datasets: [{
            label: "Antaal punten per dag",
            fill: false,
            data: val,
        }]
    };
    // Draw default chart with page load
    var ctx = document.getElementById('my_Chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',    // Define chart type
        data: myData    // Chart data
    });
</script>

<?php

$Meter = new Meter();
$p = $Meter->getMeterValues();

echo "<script>RotateArrow(".$p.")</script>"

?>

</body>
</html>
