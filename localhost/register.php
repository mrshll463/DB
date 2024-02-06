<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View db</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php include("includes/connection.php"); ?>
<div class="container mregister">
<div id="login">
 <h1>Create account</h1>
<form action="register.php" id="registerform" method="post"name="registerform">
<p><label for="user_pass">Имя пользователя<br>
<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
<p><label for="user_pass">Пароль<br>
<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Register"></p>
	  <p class="regtext"><a href= "login.php">Login</a>!</p>
 </form>
</div>
</div>
<?php
	if(isset($_POST["register"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
 $username=htmlspecialchars($_POST['username']);
 $password=htmlspecialchars($_POST['password']);
 $query=mysqli_query($con, "SELECT * FROM acc WHERE username='".$username."'");
  $numrows=mysqli_num_rows($query);
if($numrows==0)
   {
	$sql="INSERT INTO acc
  (username,password)
	VALUES('$username', '$password')";
  $result=mysqli_query($con, $sql);
 if($result){
	$message = "Account Successfully Created";
} else {
 $message = "Failed to insert data information!";
  }
	} else {
	$message = "That username already exists! Please try another one!";
   }
	} else {
	$message = "All fields are required!";
	}
	}
	?>
	<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>