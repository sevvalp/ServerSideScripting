<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { 
  array_push($errors, "Username is required"); 
  }
  if (empty($email)) { 
  array_push($errors, "Email is required"); 
  }
  if (empty($password_1)) { 
  array_push($errors, "Password is required"); 
  }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$sql = "INSERT INTO account (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $sql);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
  if ($username) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  
}
 // log user in from login page
 if (isset ($_POST['login'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	// form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
	
	if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database
	// first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $query = "SELECT * FROM account WHERE username='$username' AND password='$password'";
  $result = mysqli_query($db, $query);
  if(mysqli_num_rows($result) ==1){
	  $_SESSION['username'] = $username;
	  $_SESSION['success'] = "You have been successfully logged in";
  	header('location: index.php');
  }else{
	  array_push($errors, "Wrong username/password combination ");
  }
	}
 }

// logout
if (isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}
?>