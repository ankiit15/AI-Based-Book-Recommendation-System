<?php
session_start();
if($_SESSION['role']!='user') die("Access Denied");
$conn=new mysqli("localhost","root","","library_db");
$books=$conn->query("SELECT * FROM books");
?>
<h2>User Dashboard</h2>
<ul>
<?php while($b=$books->fetch_assoc()){ ?>
<li><?= $b['title']?> by <?= $b['author']?> 
<?php if($b['available']){ ?>
<a href="request_book.php?id=<?= $b['id']?>">Request</a>
<?php } ?>
</li>
<?php } ?>
</ul>

<h3>AI Recommendation</h3>
<input id="book"><button onclick="ai()">Recommend</button>
<ul id="r"></ul>

<script>
function ai(){
fetch("recommend_ai.php?book="+document.getElementById("book").value)
.then(r=>r.json())
.then(d=>{
let ul=document.getElementById("r"); ul.innerHTML="";
d.recommendations?.forEach(x=>{
let li=document.createElement("li"); li.innerText=x; ul.appendChild(li);
});
});
}
</script>
