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
<form action="studiochange.php" method="post" class="l">
    <p>
        <label for="studio_id">studio_id:</label>
        <input type="number" name="studio_id" id="studio_id">
    </p>
    <p>
        <label for="studio_name">studio_name:</label>
        <input type="text" name="studio_name" id="studio_name">
    </p>
    <p>
        <label for="producer">producer:</label>
        <input type="text" name="producer" id="producer">
    </p>
    <p>
        <label for="budget">budget:</label>
        <input type="number" name="budget" id="budget">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Add"><br>
    <p>insert name, producer and budget</p>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Delete"><br>
    <p>insert id</p>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Edit"><br>
    <p>insert id name, producer and budget</p>
<br> <input class="button" value="Show table" onClick='location.href="studio.php" ' > <br>
<br> <input class="button" value="Back" onClick='location.href="redirecting.php"'> <br>
</form>

<?php 
include("includes/connection.php");

if(isset($_POST["add"])){
$link = mysqli_connect("localhost", "root", "", "musstreamserv");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
/*$studio_id = mysqli_real_escape_string($link, $_REQUEST['studio_id']);*/
$studio_name = mysqli_real_escape_string($link, $_REQUEST['studio_name']);
$producer = mysqli_real_escape_string($link, $_REQUEST['producer']);
$budget = mysqli_real_escape_string($link, $_REQUEST['budget']); 

$sql = "INSERT INTO studio ( studio_name, producer, budget) VALUES ('$studio_name', '$producer', '$budget')";
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
$studio_id = mysqli_real_escape_string($link, $_REQUEST['studio_id']);

$sql = "DELETE FROM studio WHERE studio_id='$studio_id'";
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

$studio_id = mysqli_real_escape_string($link, $_REQUEST['studio_id']);
$studio_name = mysqli_real_escape_string($link, $_REQUEST['studio_name']);
$producer = mysqli_real_escape_string($link, $_REQUEST['producer']);
$budget = mysqli_real_escape_string($link, $_REQUEST['budget']);

$sql = /*"UPDATE studio SET, studio_name = '$studio_name', producer = '$producer', budget = '$budget' 
    WHERE studio_id = '$studio_id'";*/
"UPDATE `studio` SET `studio_name`='$studio_name',`producer`='$producer',`budget`=$budget WHERE studio_id = $studio_id";
if(mysqli_query($link, $sql)){
    echo "Success!";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>
</head>