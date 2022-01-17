<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gezondheidsmeter test</title>

    <style>
        html,
        body {
            font-family: Calibri, serif;
            background-color:rgb(200, 191, 231);
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
        }

        .meter_container {
            margin-top: 20px;
            position: relative;
            min-width: 500px;
            min-height: 250px;
            background-color: rgba(0, 0, 0, 0);
            display: flex;
            justify-content: center;
            align-items: flex-end;

            overflow: hidden;
            transform: scale(1);
        }

        .meter_background {
            position: absolute;
            background-color: #c9c9c9;
            width: 100%;
            height: 100%;
            border-radius: 250px 250px 0 0;
        }

        .meter_background_circle {
            position: absolute;
            background-color: white;
            width: 30%;
            height: 30%;
            border-radius: 100px 100px 0 0;
        }

        .meter_background_green {
            position: absolute;
            background-color: #58c219;
            width: 85%;
            height: 85%;
            border-radius: 250px 250px 0 0;
        }

        .meter_background_yellow {
            position: absolute;
            background-color: #84dc31;
            width: 85%;
            height: 85%;
            border-radius: 250px 250px 0 0;
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
            transform-origin: 50% 100%;
        }

        .meter_background_orange {
            position: absolute;
            background-color: #dcce31;
            width: 85%;
            height: 85%;
            border-radius: 250px 250px 0 0;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg);
            transform-origin: 50% 100%;
        }

        .meter_background_red {
            position: absolute;
            background-color: #dc4b31;
            width: 85%;
            height: 85%;
            border-radius: 250px 250px 0 0;
            -webkit-transform: rotate(-135deg);
            -moz-transform: rotate(-135deg);
            -o-transform: rotate(-135deg);
            transform: rotate(-135deg);
            transform-origin: 50% 100%;
        }

        .meter_arrow {
            position: absolute;
            width: 70%;
            height: 3%;
            transform-origin: 49% 100%;
            border-radius: 50%;
            background: linear-gradient(to right, black 0%, black 50%, white 51%, white 100%);

            /*Arrow rotation*/
            -webkit-transform: rotate(10deg);
            -moz-transform: rotate(10deg);
            -o-transform: rotate(10deg);
            transform: rotate(10deg);

            transition: 1s ease-in-out;
        }

        .meter_origin {
            position: absolute;
            background-color: black;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-bottom: -15px;
        }

        .meter_canvas {
            z-index: 9999;
        }
    </style>
</head>
<body>
<div class="meter_container">
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

<script>
    CanvasRenderingContext2D.prototype.fillTextCircle = function(text,x,y,radius,startRotation){
        let numRadsPerLetter = 3.1 / text.length;
        this.save();
        this.translate(x,y);
        this.rotate(startRotation);

        for(let i=0;i<text.length;i++){
            this.save();
            this.rotate((i*numRadsPerLetter)*0.9);

            this.fillText(text[i],0,-radius);
            this.restore();
        }
        this.restore();
    }

    let ctx = document.getElementById('meter_canvas').getContext('2d');
    ctx.font = "bold 20px Calibri";
    ctx.fillTextCircle("Kijk uit        Kan gezonder       Goed op weg       Ga zo door",250,250,223,4.9);

    function RotateArrow(procent) {
        let ArrowRotation = ((160 / 100) * procent) + 10;
        document.getElementById('meter_arrow').style.transform = 'rotate('+ArrowRotation+'deg)';
    }
</script>
</body>
</html>