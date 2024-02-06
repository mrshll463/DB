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

<?php
    mysqli_connect("localhost", "root", "") or die ("localhost connect lost");
    mysqli_select_db($con, "musstreamserv") or die ("DB doesnt exists");
    $result = mysqli_query($con, "SELECT * FROM `mss`, `studio`, `studio_mss` 
    WHERE `studio_mss`.studio_id = `studio`.studio_id 
    AND `studio_mss`.mss_id = `mss`.mss_id ORDER BY id");
    print "<table border=\"1\" >\n";
    print "<tr>\n<th>S_id</th>
            <th><center>Studio</th>
            <th><center>id</th>
            <th><center>MSS</th>
            <th><center>M_id</th>\n</tr> \n";
    while ($row = mysqli_fetch_array($result)) :
        print "<tr>\n";
        print "<td>".$row['studio_id']."</td>\n
        <td><center>".$row['studio_name']."</td>\n
        <td><center>".$row['id']."</td>\n
        <td><center>".$row['mss_name']."</td>\n
        <td><center>".$row['mss_id']."</td>\n";
        print "</tr>\n";
    endwhile;
    print "</table>";
?>
<br>
</br>
<form action="linkm_s.php" method="post" class="l">
	<p>
        <label for="studio_id">studio_id:</label>
        <input type="text" name="studio_id" id="studio_id">
    </p>
    <p>
        <label for="mss_id">mss_id:</label>
        <input type="number" name="mss_id" id="mss_id">
    </p>    
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Add"><br>
    <p>insert s/m_id</p>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Delete"><br>
    <p>insert s/m_id</p>
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
$mss_id = mysqli_real_escape_string($link, $_REQUEST['mss_id']); 

$sql = "INSERT INTO studio_mss ( studio_id, mss_id) VALUES ('$studio_id', '$mss_id')";
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
$id = mysqli_real_escape_string($link, $_REQUEST['id']);
$sql = "DELETE FROM `studio_mss` WHERE studio_id='$studio_id' AND
mss_id = '$mss_id'";
if(mysqli_query($link, $sql)){
    echo "Success!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>
</head>