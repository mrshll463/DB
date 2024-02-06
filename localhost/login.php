<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<div class="container mlogin">
	<div id="login">
		<h1>Вход</h1>
		<form action="" id="loginform" method="post"name="loginform">
			<p><label for="user_login">Имя опльзователя<br>
				<input class="input" id="username" name="username"size="20"
				type="text" value=""></label></p>
				<p><label for="user_pass">Пароль<br>
					<input class="input" id="password" name="password"size="20"
					type="password" value=""></label></p> 
					<p class="submit"><input class="button" name="login"type= "submit" value="Log In"></p>
					<p class="regtext"><a href= "register.php">Register</a>!</p>
				</form>
			</div>
		</div>
		<?php
		session_start();
		?>
		<?php require_once("includes/connection.php"); ?>	 
		<?php
		if(isset($_SESSION["session_username"])){
			header("Location: intropage.php");
		}
		if(isset($_POST["login"])){
			if(!empty($_POST['username']) && !empty($_POST['password'])) {
				$username=htmlspecialchars($_POST['username']);
				$password=htmlspecialchars($_POST['password']);
				$query =mysqli_query($con, "SELECT * FROM acc WHERE username='".$username."' AND password='".$password."'");
				$numrows=mysqli_num_rows($query);
				if($numrows!=0)
				{
					while($row=mysqli_fetch_assoc($query))
					{
						$dbusername=$row['username'];
						$dbpassword=$row['password'];
					}
					if($username == $dbusername && $password == $dbpassword)
					{
						$_SESSION['session_username']=$username;	 
						header("Location: intropage.php");
					}
				} else {
					echo  "Invalid username or password!";
				}
			} else {
				$message = "All fields are required!";
			}
		}
		?>