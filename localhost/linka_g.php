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
    $result = mysqli_query($con, "SELECT * FROM `album`, `mgroup`,`album_group`
    WHERE `album_group`.group_id = `mgroup`.group_id 
    AND `album_group`.album_id = `album`.album_id");
    print "<table border=\"1\" >\n";
    print "<tr>\n<th>G_id</th>
            <th><center>Group</th>
            <th><center>id</th>
            <th><center>Album</th>
            <th><center>A_id</th>\n</tr> \n";
    while ($row = mysqli_fetch_array($result)) :
        print "<tr>\n";
        print "<td>".$row['group_id']."</td>\n
        <td><center>".$row['group_name']."</td>\n
        <td><center>".$row['id']."</td>\n
        <td><center>".$row['album_name']."</td>\n
        <td><center>".$row['album_id']."</td>\n";
        print "</tr>\n";
    endwhile;
    print "</table>";
?>
<br>
</br>
<form action="linka_g.php" method="post" class="l">
    <p>
        <label for="group_id">group_id:</label>
        <input type="text" name="group_id" id="group_id">
    </p>
    <p>
        <label for="album_id">album_id:</label>
        <input type="number" name="album_id" id="album_id">
    </p>    
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Add"><br>
    <p>insert g/a_id</p>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Delete"><br>
    <p>insert g/a_id</p>
<br> <input class="button" value="Back" onClick='location.href="redirecting.php"'> <br>
</form>

<?php 
include("includes/connection.php");

if(isset($_POST["add"])){
$link = mysqli_connect("localhost", "root", "", "musstreamserv");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$group_id = mysqli_real_escape_string($link, $_REQUEST['group_id']);
$album_id = mysqli_real_escape_string($link, $_REQUEST['album_id']); 

$sql = "INSERT INTO album_group ( group_id, album_id) VALUES ('$group_id', '$album_id')";
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
$album_id = mysqli_real_escape_string($link, $_REQUEST['album_id']);
$sql = "DELETE FROM `album_group` WHERE group_id='$group_id' AND
album_id = '$album_id'";
if(mysqli_query($link, $sql)){
    echo "Success!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>
</head>