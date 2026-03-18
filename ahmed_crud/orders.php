<?php
include 'conn.php';

/* STATUS UPDATE */
if(isset($_POST['update_status'])){
    $id = $_POST['order_id'];
    $status = $_POST['status'];

    mysqli_query($conn,"UPDATE orders SET status='$status' WHERE id='$id'");
}

/* PAGINATION SETTINGS */

$limit = 5;

$page = 1;

if(isset($_GET['page'])){
$page = $_GET['page'];
}

$offset = ($page - 1) * $limit;


/* TODAY ORDERS FETCH */

$sql = "SELECT * FROM orders 
WHERE DATE(order_date) = CURDATE() 
ORDER BY id DESC 
LIMIT $offset,$limit";

$result = mysqli_query($conn,$sql);


/* TOTAL TODAY ORDERS */

$total_query = "SELECT COUNT(*) as total 
FROM orders 
WHERE DATE(order_date)=CURDATE()";

$total_result = mysqli_query($conn,$total_query);
$total_data = mysqli_fetch_assoc($total_result);

$total_records = $total_data['total'];

$total_pages = ceil($total_records / $limit);

?>

<!DOCTYPE html>
<html>
<head>
<title>Orders</title>

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

/* dropdown */

select{
background:#2a2a2a;
color:white;
border:none;
padding:6px 10px;
border-radius:6px;
cursor:pointer;
}

select:hover{
background:#3a3a3a;
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

<h2>Today's Orders</h2>

<table>

<tr>
<th>Product</th>
<th>Customer</th>
<th>Price</th>
<th>Status</th>
<th>Date</th>
<th>Change Status</th>
</tr>

<?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['product_name']; ?></td>

<td><?php echo $row['customer_name']; ?></td>

<td>Rs <?php echo $row['price']; ?></td>

<td><?php echo $row['status']; ?></td>

<td><?php echo $row['order_date']; ?></td>

<td>

<form method="POST">

<input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">

<select name="status" onchange="this.form.submit()">

<option value="Pending" <?php if($row['status']=="Pending") echo "selected"; ?>>Pending</option>

<option value="Processing" <?php if($row['status']=="Processing") echo "selected"; ?>>Processing</option>

<option value="Completed" <?php if($row['status']=="Completed") echo "selected"; ?>>Delivered</option>

</select>

<input type="hidden" name="update_status">

</form>

</td>

</tr>

<?php
}

}else{

echo "<tr><td colspan='6'>No Orders Today</td></tr>";

}

?>

</table>


<!-- PAGINATION -->

<div class="pagination">

<?php

if($page > 1){
echo "<a href='orders.php?page=".($page-1)."'>Prev</a>";
}

for($i=1;$i<=$total_pages;$i++){

if($i == $page){
echo "<a class='active-page' href='orders.php?page=$i'>$i</a>";
}else{
echo "<a href='orders.php?page=$i'>$i</a>";
}

}

if($page < $total_pages){
echo "<a href='orders.php?page=".($page+1)."'>Next</a>";
}

?>

</div>

<br>

<a href="dashboard.php" class="back-btn">← Back</a>

</div>

</body>
</html>