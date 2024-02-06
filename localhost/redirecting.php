<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View db</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .l{
        margin-left: 10%;
    }
    </style>
</head>
<?php include("includes/connection.php"); ?>
<form class="l">
    Table:
<br> <input class="button" value="Album" onClick='location.href="albumchange.php" ' > <br>
<br> <input class="button" value="Link album and group" onClick='location.href="linka_g.php"'> <br>
<br> <input class="button" value="Mus group" onClick='location.href="mgroupchange.php"'> <br>

<br> <input class="button" value="Studio" onClick='location.href="studiochange.php"'> <br>
<br> <input class="button" value="Link studio and Mss" onClick='location.href="linkm_s.php"'> <br>
<br> <input class="button" value="Streaming serv" onClick='location.href="msschange.php"'> <br>
<br> <input class="button" value="Back" onClick='location.href="intropage.php"'> <br>
</form>