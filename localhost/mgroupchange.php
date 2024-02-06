<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit group</title>
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
<form action="mgroupchange.php" method="post" class="l">
    <p>
        <label for="group_id">group_id:</label>
        <input type="number" name="group_id" id="group_id">
    </p>
    <p>
    <label for="studio_id">studio_id:</label>
    <input type="number" name="studio_id" id="studio_id">
    </p>
    <p>
        <label for="group_name">group_name:</label>
        <input type="text" name="group_name" id="group_name">
    </p>
    <p>
        <label for="genre">genre:</label>
        <input type="text" name="genre" id="genre">
    </p>
    <p>
        <label for="followers">followers:</label>
        <input type="number" name="followers" id="followers">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Add"><br>
    <p>insert name, genre and followers</p>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Delete"><br>
    <p>insert id</p>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Edit"><br>
    <p>insert id name, genre and followers</p>
<br> <input class="button" value="Show table" onClick='location.href="mgroup.php" ' > <br>
<br> <input class="button" value="Back" onClick='location.href="redirecting.php"'> <br>
</form>

<?php 
include("includes/connection.php");

if(isset($_POST["add"])){
$link = mysqli_connect("localhost", "root", "", "musstreamserv");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$studio_id = mysqli_real_escape_string($link, $_REQUEST['studio_id']);
$group_name = mysqli_real_escape_string($link, $_REQUEST['group_name']);
$genre = mysqli_real_escape_string($link, $_REQUEST['genre']);
$followers = mysqli_real_escape_string($link, $_REQUEST['followers']); 

$sql = "INSERT INTO mgroup (studio_id, group_name, genre, followers) VALUES ('$studio_id', '$group_name', '$genre', '$followers')";
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
$group_id = mysqli_real_escape_string($link, $_REQUEST['group_id']);

$sql = "DELETE FROM mgroup WHERE group_id='$group_id'";
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

$group_id = mysqli_real_escape_string($link, $_REQUEST['group_id']);
$studio_id = mysqli_real_escape_string($link, $_REQUEST['studio_id']);
$group_name = mysqli_real_escape_string($link, $_REQUEST['group_name']);
$genre = mysqli_real_escape_string($link, $_REQUEST['genre']);
$followers = mysqli_real_escape_string($link, $_REQUEST['followers']);

$sql = "UPDATE `mgroup` SET `studio_id`='studio_id', `group_name`='$group_name',`genre`='$genre',`followers`=$followers WHERE group_id = $group_id";
if(mysqli_query($link, $sql)){
    echo "Success!";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>
</head>