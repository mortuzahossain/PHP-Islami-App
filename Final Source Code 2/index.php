<!DOCTYPE html>
<html>

<head>
    <title>Islami App</title>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="60">
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
    
    $randon = rand($min,$max);
    $query = "SELECT q.SuraID,q.VerseID,q.AyahText AS arabicAyah , b.AyahText AS banglaAyah , e.AyahText AS englishAyah FROM quran AS q, banglaquran AS b , englishquran AS e WHERE q.ID =$randon AND e.ID = $randon AND b.ID = $randon";
    mysqli_set_charset($con,'utf8');

    $result = mysqli_query($con,$query)->fetch_assoc();


} else {
    echo "Database Connectin Failed.";
}


?>


<body>

    <div class="fixed-header">
        <a href="index.php"><img src="img/hp-globe.gif" align="HOME"></a>
    </div>

    <div class="content-wraper background">
        <div class="content">
            <div class="show">
                <h1 class="arabic"><?php echo $result['arabicAyah']; ?></h1>
                <h1><?php echo $result['banglaAyah']; ?></h1>
                <h1><?php echo $result['englishAyah']; ?></h1>
                <p>Al-Quran: <?php echo $result['SuraID'].' : '.$result['VerseID']; ?></p>
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