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
<?php include("includes/connection.php"); ?>
<form action="albumchange.php" method="post" class="l">
    <p>
        <label for="album_id">album_id:</label>
        <input type="number" name="album_id" id="album_id">
    </p>
    <p>
        <label for="album_name">album_name:</label>
        <input type="text" name="album_name" id="album_name">
    </p>
    <p>
        <label for="likes">likes:</label>
        <input type="number" name="likes" id="likes">
    </p>
    <p>
        <label for="views">views:</label>
        <input type="number" name="views" id="views">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Add"><br>
    <p>insert name, likes and views</p>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Delete"><br>
    <p>insert id</p>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Edit"><br>
    <p>insert id name, likes and views</p>
<br> <input class="button" value="Show table" onClick='location.href="album.php" ' > <br>
<br> <input class="button" value="Back" onClick='location.href="redirecting.php"'> <br>
</form>

<?php 
include("includes/connection.php");

if(isset($_POST["add"])){
$link = mysqli_connect("localhost", "root", "", "musstreamserv");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$album_name = mysqli_real_escape_string($link, $_REQUEST['album_name']);
$likes = mysqli_real_escape_string($link, $_REQUEST['likes']);
$views = mysqli_real_escape_string($link, $_REQUEST['views']); 

$sql = "INSERT INTO album ( album_name, likes, views) VALUES ('$album_name', '$likes', '$views')";
if(mysqli_query($link, $sql)){
    echo "Success!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}
else {}
?>

<?php
if(isset($_POST["delete"])){
$link = mysqli_connect("localhost", "root", "", "musstreamserv");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$album_id = mysqli_real_escape_string($link, $_REQUEST['album_id']);

$sql = "DELETE FROM album WHERE album_id='$album_id'";
if(mysqli_query($link, $sql)){
    echo "Success!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>

<?php
if(isset($_POST["update"])){
$link = mysqli_connect("localhost", "root", "", "musstreamserv");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$album_id = mysqli_real_escape_string($link, $_REQUEST['album_id']);
$album_name = mysqli_real_escape_string($link, $_REQUEST['album_name']);
$likes = mysqli_real_escape_string($link, $_REQUEST['likes']);
$views = mysqli_real_escape_string($link, $_REQUEST['views']);

$sql = "UPDATE `album` SET `album_name`='$album_name',`likes`=$likes,`views`=$views WHERE album_id = $album_id";
if(mysqli_query($link, $sql)){
    echo "Success!";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>
</head>