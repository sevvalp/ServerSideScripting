
<?php
include('server.php');
include('comment.php');
@mysql_select_db("project", mysql_connect("localhost","root",""));
$username= $_SESSION['username'];
$comment = $_POST['comment'];
$code = $_POST['code'];
$comment_length = strlen($comment);
$check=mysql_query("SELECT code FROM courses WHERE code='$code'");
$num=mysql_num_rows($check);
if($comment_length > 250) {
	header("location: comment.php?error=1");
}
else if($code=="" || $comment=="") { echo "Please fill al the fields."; }
else if($num<1) { echo "This course does not exist."; 
exit;}
else{
		mysql_query("INSERT INTO comments VALUES('$comment','$username','$code')");
        header("location: comment.php");
}
?>

