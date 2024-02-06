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
<form action="msschange.php" method="post" class="l">
    <p>
        <label for="mss_id">mss_id:</label>
        <input type="number" name="mss_id" id="mss_id">
    </p>
    <p>
        <label for="mss_name">mss_name:</label>
        <input type="text" name="mss_name" id="mss_name">
    </p>
    <p>
        <label for="sub_price">sub_price:</label>
        <input type="number" name="sub_price" id="sub_price">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Add"><br>
    <p>insert name and sub_price</p>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Delete"><br>
    <p>insert id</p>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Edit"><br>
    <p>insert id name and sub_price</p>
<br> <input class="button" value="Show table" onClick='location.href="mss.php" ' > <br>
<br> <input class="button" value="Back" onClick='location.href="redirecting.php"'> <br>
</form>

<?php 
include("includes/connection.php");

if(isset($_POST["add"])){
$link = mysqli_connect("localhost", "root", "", "musstreamserv");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
/*$mss_id = mysqli_real_escape_string($link, $_REQUEST['mss_id']);*/
$mss_name = mysqli_real_escape_string($link, $_REQUEST['mss_name']);
$sub_price = mysqli_real_escape_string($link, $_REQUEST['sub_price']); 

$sql = "INSERT INTO mss ( mss_name, sub_price) VALUES ('$mss_name', '$sub_price')";
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
$mss_id = mysqli_real_escape_string($link, $_REQUEST['mss_id']);

$sql = "DELETE FROM mss WHERE mss_id='$mss_id'";
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

$mss_id = mysqli_real_escape_string($link, $_REQUEST['mss_id']);
$mss_name = mysqli_real_escape_string($link, $_REQUEST['mss_name']);
$sub_price = mysqli_real_escape_string($link, $_REQUEST['sub_price']);

$sql = /*"UPDATE mss SET, mss_name = '$mss_name', genre = '$genre', sub_price = '$sub_price' 
    WHERE mss_id = '$mss_id'";*/
"UPDATE `mss` SET `mss_name`='$mss_name',`sub_price`=$sub_price WHERE mss_id = $mss_id";
if(mysqli_query($link, $sql)){
    echo "Success!";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>
</head>