<ul>
  <li><a href="index.php">Home sweet home</a></li>
  <li><a href="index.php">Do you want to search for courses?</a></li>
</ul>

<head>
	 <?php 
	 include('server.php');
	
	 if(empty($_SESSION['username'])){
		 echo "You cannot comment on the courses without logging in.";
exit;
} ?>
</head>


<html>
<form action="post_comment.php" method="POST"> 
    <input type="text" name="code" value="Code of the course" onfocus="this.value==defaultValue?this.value='':null"><br>
    <textarea name="comment" cols="50" rows="2" onfocus="this.value==defaultValue?this.value='':null">Enter a comment</textarea>
    <input type="submit" value="Comment">

</form>
</html>

