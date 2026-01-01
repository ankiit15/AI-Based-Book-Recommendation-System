<?php
session_start();
$conn = new mysqli("localhost","root","","library_db");

$u=$_POST['username'];
$p=$_POST['password'];

$q=$conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$q->bind_param("ss",$u,$p);
$q->execute();
$r=$q->get_result();

if($row=$r->fetch_assoc()){
$_SESSION['user']=$row['username'];
$_SESSION['role']=$row['role'];
if($row['role']=='admin') header("Location: dashboard_admin.php");
else header("Location: dashboard_user.php");
}else{
echo "Invalid Login";
}
?>