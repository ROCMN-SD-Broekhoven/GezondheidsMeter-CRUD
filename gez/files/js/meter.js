if (document.getElementById('meter_container')) {
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
}