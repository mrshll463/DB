<?php include("includes/connection.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("localhost connect lost");
mysqli_select_db($con, "musstreamserv") or die ("DB doesnt exists");
$result = mysqli_query($con, "SELECT * FROM `studio`, `mgroup`
    WHERE `studio`.studio_id = `mgroup`.studio_id ORDER BY group_name");
    print "<table border=\"1\" >\n";
    print "<tr>\n
    <th>Group name</th>
    <th>Studio</th>
    <th>genre</th>
    <th>followers</th>
    <th>id</th>
    \n</tr>\n";
    while ($row = mysqli_fetch_array($result)) :
        print "<tr>\n";
        print "<td>".$row['group_name']."</td>\n
        <td><center>".$row['studio_name']."</center></td>\n
        <td><center>".$row['genre']."</center></td>\n
        <td><center>".$row['followers']."</center></td>\n
        <td>".$row['group_id']. "</td>\n";
    endwhile;
    print "</table>";
?>
<form>
<input type="button" value="Back" onClick='location.href="login.php"'>
</form>
