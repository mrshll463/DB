<?php include("includes/connection.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("localhost connect lost");
mysqli_select_db($con, "musstreamserv") or die ("DB doesnt exists");
$result = mysqli_query($con, "SELECT * FROM `album`, `mgroup`, `album_group` WHERE `album_group`.album_id = `album`.album_id AND `album_group`.group_id = `mgroup`.group_id");

    print "<table border=\"1\" >\n";
    print "<tr>\n<th>Album name</th>
                <th>Group</th>
                <th>likes</th>
                <th>views</th>
                <th>id</th>\n</tr>\n";
    while ($row = mysqli_fetch_array($result)) :
        print "<tr>\n";
        print "<td>".$row['album_name']."</td>\n
        <td><center>".$row['group_name']."</center></td>\n
        <td><center>".$row['likes']."</center></td>\n
        <td><center>".$row['views']."</center></td>\n
                <td>".$row['album_id']. "</td>\n";
        print "</tr>\n";
    endwhile;
    print "</table>";
?>
<form>
<input type="button" value="Back" onClick='location.href="login.php"'>
</form>
