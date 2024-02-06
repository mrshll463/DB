<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <?php
    $db_hostname = "localhost";
    $db_database = "musstreamserv";
    $db_username = "root";
    $db_password = "";
    $db_server = mysqli_connect(localhost , root, "", musstreamserv)or 1;
     if(!$db_server)
        die("Неможливо підключитися до MySQL: ".mysqli_error());
    $result = mysqli_query(mysqli_connect(localhost , root, "", musstreamserv) ,"SELECT * FROM mgroup ") or 1;
    if (!$result)
        die ("Збій при доступі до бази даних: ".mysq1i_error());
    $x = 0;
    print "<center>";
    print "<table border=\"1\" >\n";
    print "<tr>\n<th>Group name</th><th>genre
    Name</th><th>followers</th>\n</tr>\n";
    while ($row = mysqli_fetch_array($result)) :
        print "<tr>\n";
        print "<td>".$row["group_name"]."</td>\n<td><center>".$row["genre"]."</center></td>\n<td>".$row["followers"]. "</td>\n";
        print "</tr>\n";
    endwhile;
    print "</table>";
    print "</center>";
    mysqli_close(mysqli_connect(localhost , root, "", musstreamserv));
    ?>
</body>
</html>