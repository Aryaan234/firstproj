<?php
include 'conn.php';

/* PAGINATION SETTINGS */

$limit = 5;

$page = 1;

if(isset($_GET['page'])){
$page = $_GET['page'];
}

$offset = ($page - 1) * $limit;


/* USERS FETCH */

$sql = "SELECT * FROM users ORDER BY id DESC LIMIT $offset,$limit";
$result = mysqli_query($conn,$sql);


/* TOTAL USERS */

$total_query = "SELECT COUNT(*) as total FROM users";
$total_result = mysqli_query($conn,$total_query);
$total_data = mysqli_fetch_assoc($total_result);

$total_records = $total_data['total'];

$total_pages = ceil($total_records / $limit);

?>

<!DOCTYPE html>
<html>
<head>
<title>All Users</title>

<style>

body{
font-family: Arial, sans-serif;
background:#0f0f0f;
color:#ffffff;
margin:0;
padding:0;
}

/* container */

.table-box{
width:85%;
margin:60px auto;
background:#1a1a1a;
padding:30px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.6);
}

/* title */

h2{
text-align:center;
margin-bottom:25px;
color:#f1f1f1;
letter-spacing:1px;
}

/* table */

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#242424;
padding:14px;
text-align:left;
font-weight:600;
color:#e6e6e6;
}

table td{
padding:12px;
border-bottom:1px solid #2f2f2f;
color:#dcdcdc;
}

table tr{
transition:0.3s;
}

table tr:hover{
background:#222222;
}

/* buttons */

.action-btn{
padding:6px 14px;
border-radius:20px;
font-size:14px;
transition:0.3s;
}

/* update */

.update-btn{
background:#2e7d32;
color:white;
}

.update-btn:hover{
background:#388e3c;
}

/* delete */

.delete-btn{
background:#8e2b2b;
color:white;
}

.delete-btn:hover{
background:#a33636;
}

/* back button */

.back-btn{
display:inline-block;
margin-top:25px;
padding:10px 22px;
border-radius:25px;
background:#333;
color:white;
transition:0.3s;
}

.back-btn:hover{
background:#444;
}

a{
text-decoration:none;
color:white;
}


/* PAGINATION */

.pagination{
text-align:center;
margin-top:25px;
}

.pagination a{
display:inline-block;
padding:8px 14px;
margin:4px;
border-radius:8px;
background:#2a2a2a;
transition:0.3s;
}

.pagination a:hover{
background:#3a3a3a;
}

.active-page{
background:#2e7d32 !important;
}

</style>

</head>
<body>

<div class="table-box">

<h2>All Users</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['role']; ?></td>

<td>

<a class="action-btn update-btn" 
href="update_user.php?id=<?php echo $row['id']; ?>">
Update
</a>

<a class="action-btn delete-btn" 
href="delete_user.php?id=<?php echo $row['id']; ?>" 
onclick="return confirm('Are you sure?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

<!-- PAGINATION -->

<div class="pagination">

<?php

if($page > 1){
echo "<a href='users.php?page=".($page-1)."'>Prev</a>";
}

for($i=1;$i<=$total_pages;$i++){

if($i == $page){
echo "<a class='active-page' href='users.php?page=$i'>$i</a>";
}else{
echo "<a href='users.php?page=$i'>$i</a>";
}

}

if($page < $total_pages){
echo "<a href='users.php?page=".($page+1)."'>Next</a>";
}

?>

</div>

<br>

<a href="dashboard.php" class="back-btn">← Back</a>

</div>

</body>
</html>