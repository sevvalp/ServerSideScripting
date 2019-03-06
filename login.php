<ul>
  <li><a href="index.php">Home sweet home</a></li>
  <li><a href="index.php">Do you want to search for courses?</a></li>
  <li><a href="comment.php">Wanna comment on the courses?</a></li>
</ul>
<?php include('server.php');  
if(!empty($_SESSION['username'])){
	echo "You are already logged in!";?>
	<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
	Wanna start searching? <a href="index.php">Click here!</a>
	<?php exit; 
}?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>


<form method="post" action="login.php">
<?php include('errors.php'); ?>
<div class ="input-group">
<label>User Name:</label>
<input type="text" name="username" />
</div>
<div class ="input-group">
<label>Password:</label> 
<input type="password" name="password" />
</div>
<div class ="input-group">
<button type="submit" name="login" class="btn">Login</button>
</div>
<p>
Not yet a member? <a href="register.php">Sign up</a>
</p>
</form>
</body>
</html>
<?php
 @mysql_select_db("project", mysql_connect("localhost","root",""));
$username = mysql_real_escape_string(@$_POST['username']);
$password = mysql_real_escape_string(@$_POST['password']);
$password = md5($password);

?>