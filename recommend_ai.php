<?php
header("Content-Type:application/json");
$conn=new mysqli("localhost","root","","library_db");
$b=$_GET['book']??'';
$q=$conn->prepare("SELECT genre,keywords FROM books WHERE title LIKE ?");
$s="%$b%"; $q->bind_param("s",$s); $q->execute();
$r=$q->get_result();
if(!$r->num_rows){ echo json_encode(["recommendations"=>[]]); exit; }
$d=$r->fetch_assoc();
$g=$d['genre']; $k=explode(",",$d['keywords'])[0];
$res=$conn->query("SELECT title,author FROM books WHERE genre='$g' OR keywords LIKE '%$k%'");
$out=[];
while($row=$res->fetch_assoc()) $out[]=$row['title']." by ".$row['author'];
echo json_encode(["recommendations"=>$out]);
?>