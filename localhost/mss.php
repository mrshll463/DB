<?php include("includes/connection.php"); ?>
<?php
    mysqli_connect("localhost", "root", "") or die ("localhost connect lost");
    mysqli_select_db($con, "musstreamserv") or die ("DB doesnt exists");
    $result = mysqli_query($con, "SELECT * FROM `mss`, `studio`, `studio_mss` 
    WHERE `studio_mss`.studio_id = `studio`.studio_id 
    AND `studio_mss`.mss_id = `mss`.mss_id ORDER BY mss_name");
    print "<table border=\"1\" >\n";
    print "<tr>\n<th>Streaming serv name</th>
            <th>Studio</th>
            <th>Subscription price</th>
            <th>id</th>\n</tr> \n";
    while ($row = mysqli_fetch_array($result)) :
        print "<tr>\n";
        print "<td>".$row['mss_name']."</td>\n
        <td><center>".$row['studio_name']."</td>\n
        <td><center>".$row['sub_price']."</td>\n
        <td>".$row['mss_id']."</td>\n";
        print "</tr>\n";
    endwhile;
    print "</table>";
?>
<form>
<input type="button" value="Back" onClick='location.href="login.php"'>
</form>