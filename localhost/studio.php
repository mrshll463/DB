<?php include("includes/connection.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("localhost connect lost");
mysqli_select_db($con, "musstreamserv") or die ("DB doesnt exists");
$result = mysqli_query($con, "SELECT studio_name, producer, budget, studio_id FROM `studio`");
    print "<table border=\"1\" >\n";
    print "<tr>\n<th>Studio name</th><th>producer</th><th>budjet</th>\n</tr>\n";
    while ($row = mysqli_fetch_array($result)) :
        print "<tr>\n";
        print "<td>".$row['studio_name']."</td>\n<td><center>".$row['producer']."<center></td>\n<td>".$row['budget']. "</td>\n
        <td><center>".$row['studio_id']."</td>\n";
        print "</tr>\n";
    endwhile;
    print "</table>";
?>
<form>
<input type="button" value="Back" onClick='location.href="login.php"'>
</form>