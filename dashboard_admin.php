<?php
session_start();
if($_SESSION['role']!='admin') die("Access Denied");
$conn=new mysqli("localhost","root","","library_db");
?>
<h2>Admin Dashboard</h2>
<form method="POST" action="add_book.php">
<input name="title" placeholder="Title" required>
<input name="author" placeholder="Author" required>
<input name="genre" placeholder="Genre">
<input name="keywords" placeholder="Keywords">
<button>Add Book</button>
</form>
