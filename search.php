<ul>
  <li><a href="index.php">Home sweet home</a></li>
  <li><a href="index.php">Do you want to search for courses?</a></li>
  <li><a href="comment.php">Wanna comment on the courses?</a></li>
</ul>

<?php
    @mysql_select_db("project", mysql_connect("localhost","root",""));
    $query = $_POST['query'];
    $topic = mysql_query("select * from courses where code like '%$query%'");
$number=mysql_num_rows($topic); 
    if($query=="") {
        echo "You can not make a blank call";
}
else if ($number<1) { echo "No results found for your search <a href='index.php'> Turn back.</a>";} 
else {
    while($find = mysql_fetch_array($topic)) {
        $code = $find['code'];
        $name = $find['name'];
        $link = $find['link'];
    echo $code." ".$name." ";
    echo '<a href="' . $link . '">Go to page of the course</a>';
    }
}

$find_data = mysql_query("SELECT * FROM comments WHERE code='$code'");
while($row = @mysql_fetch_assoc($find_data)) {
    $username= $row['username'];
    $comment = $row['comment'];
    echo "<br />$comment - $username<p>"; 
}
?>