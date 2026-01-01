<?php
session_start();
$conn=new mysqli("localhost","root","","library_db");
$id=$_GET['id'];
$conn->query("UPDATE books SET available=0 WHERE id=$id");
header("Location: dashboard_user.php");
?>