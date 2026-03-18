<?php
include 'conn.php';

/* TOTAL USERS */
$user_query = "SELECT COUNT(*) as total_users FROM users";
$user_result = mysqli_query($conn,$user_query);
$user_data = mysqli_fetch_assoc($user_result);
$total_users = $user_data['total_users'];


/* TODAY ORDERS */
$order_query = "SELECT COUNT(*) as total_orders FROM orders WHERE DATE(order_date)=CURDATE()";
$order_result = mysqli_query($conn,$order_query);
$order_data = mysqli_fetch_assoc($order_result);
$total_orders = $order_data['total_orders'];


/* TODAY REVENUE */
$revenue_query = "SELECT SUM(price) as total_revenue FROM orders WHERE DATE(order_date)=CURDATE()";
$revenue_result = mysqli_query($conn,$revenue_query);
$revenue_data = mysqli_fetch_assoc($revenue_result);
$total_revenue = $revenue_data['total_revenue'];

if($total_revenue == ""){
    $total_revenue = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>VIP Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">

<style>
.cards a{
text-decoration:none;
color:black;
}
</style>

</head>
<body>

<div class="container">

<div class="sidebar">
<div class="logo">VIP PANEL</div>

<ul>
<li class="active"><a href="dashboard.php">Dashboard</a></li>
<li><a href="users.php">Users</a></li>
<li><a href="orders.php">Orders</a></li>
</ul>

</div>

<div class="main">

<div class="topbar">

<div class="search">

</div>

<div class="profile">
<span>Admin</span>
<div class="avatar"></div>
</div>

</div>


<div class="cards">

<a href="users.php">
<div class="card">
<h3>Total Users</h3>
<p><?php echo $total_users; ?></p>
</div>
</a>

<a href="orders.php">
<div class="card">
<h3>Today Orders</h3>
<p><?php echo $total_orders; ?></p>
</div>
</a>

<div class="card">
<h3>Today Revenue</h3>
<p>Rs <?php echo $total_revenue; ?></p>
</div>


</div>

</div>

</div>

</body>
</html>