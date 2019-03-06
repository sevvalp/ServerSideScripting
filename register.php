<ul>
  <li><a href="index.php">Home sweet home</a></li>
  <li><a href="index.php">Do you want to search for courses?</a></li>
  <li><a href="comment.php">Wanna comment on the courses?</a></li>
</ul>


<?php include('server.php');  
if(!empty($_SESSION['username'])){
	echo ("You must log out first to register as a new user.");?>
	<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
	<?php exit; 
}?>
<!DOCTYPE html>
<html>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>