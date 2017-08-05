<!DOCTYPE html>
<html>

<head>
    <title>Islami App</title>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="30">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'islami';

$min = 1;
$max = 6236;

$con = mysqli_connect($host,$user,$pass,$db_name);

if ($con) {
    
    $randon = myrandom($min,$max);
    
    $arabic_sql = "SELECT * FROM quran WHERE id = $randon";
    $bangla_sql = "SELECT * FROM banglaquran WHERE id = $randon";
    $english_sql = "SELECT * FROM englishquran WHERE id = $randon";

    $arabic_ayah = mysqli_query($con,$arabic_sql)->fetch_assoc();
    $bangla_ayah = mysqli_query($con,$bangla_sql)->fetch_assoc();
    $english_ayah = mysqli_query($con,$english_sql)->fetch_assoc();

} else {
    echo "Database Connectin Failed.";
}

function myrandom($min,$max)
{
    return rand($min,$max);
}

?>


<body>

    <div class="fixed-header">
        <a href="index.php"><img src="img/hp-globe.gif" align="HOME"></a>
    </div>

    <div class="content-wraper background">
        <div class="content">
            <div class="show">
                <h1 class="arabic"><?php echo $arabic_ayah['AyahText']; ?></h1>
                <h1><?php echo $bangla_ayah['AyahText']; ?></h1>
                <h1><?php echo $english_ayah['AyahText']; ?></h1>
                <p>Al-Quran: <?php echo $arabic_ayah['SuraID'].' : '.$arabic_ayah['VerseID']; ?></p>
            </div>
        </div>
    </div>


    <div class="fixedicon">
        <a href="http://www.facebook.com"><img src="img/fb.png" alt="Facebook" /></a>
        <a href="http://www.twitter.com"><img src="img/tw.png" alt="Twitter" /></a>
        <a href="http://www.google.com"><img src="img/gl.png" alt="GooglePlus" /></a>
        <a href="http://www.linkedin.com"><img src="img/in.png" alt="LinkedIn" /></a>
    </div>

</body>

</html>