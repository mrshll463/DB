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
    input{
        margin-right: 99%;
    }
    </style>
</head>
<?php
session_start();
if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
<div id="welcome">
<h2 class="l">User: <span><?php echo $_SESSION['session_username'];?></span></h2>
</div>
<form class="l">
<input class="button" value="Albums" onClick='location.href="album.php" ' > <br>
<br> <input class="button" value="Music groups" onClick='location.href="mgroup.php"'> <br>
<br> <input class="button" value="Studios" onClick='location.href="studio.php"'> <br>
<br> <input class="button" value="Streaming servises" onClick='location.href="mss.php"'> <br>
<br> <input class="button" value="Add/delete" onClick='location.href="redirecting.php"'> <br>
</form>
 <p><a href="logout.php" class="l">Exit</a></p>
<?php endif; ?>
</html>
