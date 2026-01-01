<?php
$conn=new mysqli("localhost","root","","library_db");
$t=$_POST['title']; $a=$_POST['author']; $g=$_POST['genre']; $k=$_POST['keywords'];
$stmt=$conn->prepare("INSERT INTO books(title,author,genre,keywords) VALUES(?,?,?,?)");
$stmt->bind_param("ssss",$t,$a,$g,$k);
$stmt->execute();
header("Location: dashboard_admin.php");
?>