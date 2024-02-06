<?php 
 $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
 $password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

 if(mb_strlen($login)<5 || mb_strlen($login) > 50) {
     echo "wrong login length";
     exit();
 } else if(mb_strlen($password)<8 || mb_strlen($password) > 50) {
    echo "wrong password length. Pass should be longer than 7 symbols";
    exit();
}

$mysql = new mysqli('localhost', 'root', '', 'users');
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}
$reg = "INSERT INTO  `acc` (`login`, `password`)
VALUES('$login', '$password')";
if ($mysql->query($reg) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysql->error;
}

$mysql->close();

 echo $login;
 ?>