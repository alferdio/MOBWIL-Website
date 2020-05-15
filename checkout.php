<?php
session_start();
include 'koneksi.php';

//jika tidak ada $_SESSION["pelanggan"] maka dilarikan ke login.php
if (!isset($_SESSION["user"])) 
{
    echo "<script>alert('silahkan masuk terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>"; 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
</head>
<body>

<section class="konten" align="center" style="vertical-align: middle;">
     <br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br> 
    <p></p>
    <div class="container" align="center">
        <div id="circle1" align="center"></div>
        <div id="shadowring" align="center"></div>
        <div id="circle2" align="center"></div>
        <p id="output" align="center"></p>
        <canvas height="200" width="200" id="counter"/> 
    </div>

</section>
  <script type="application/javascript">
        var counter = document.getElementById('counter').getContext('2d');
        var no = 0; // Starting Point
        var pointToFill = 4.72;  //Point from where you want to fill the circle
        var cw = counter.canvas.width;  //Return canvas width
        var ch = counter.canvas.height; //Return canvas height
        var diff;   // find the different between current value (no) and trageted value (100)
        
        function fillCounter(){
            diff = ((no/100) * Math.PI*2*10);        
            counter.clearRect(0,0,cw,ch);   // Clear canvas every time when function is call
            counter.lineWidth = 15;     // size of stroke
            counter.fillStyle = '#ff8000';     // color that you want to fill in counter/circle
            counter.strokeStyle = '#FFCC99  ';    // Stroke Color
            counter.textAlign = 'center';
            counter.font = "25px monospace";    //set font size and face
            counter.fillText(no+'%',100,110);       //fillText(text,x,y);
            counter.beginPath();
            counter.arc(100,100,90,pointToFill,diff/10+pointToFill);    //arc(x,y,radius,start,stop)
            counter.stroke();   // to fill strok
            // now add condition
            

            if(no >= 100)
            {
                clearTimeout(fill);
                window.location.href="sensor.php"
            }
            no++;
        }
        
        
        var fill = setInterval(fillCounter,50);     
    </script>

</body>
</html>