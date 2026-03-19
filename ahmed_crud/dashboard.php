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

<style>

/* RESET */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins', sans-serif;
}

body{
background:linear-gradient(120deg,#eef2f7,#d9e4f5);
}

/* LAYOUT */
.container{
display:flex;
}

/* SIDEBAR */
.sidebar{
width:240px;
height:100vh;
background:linear-gradient(180deg,#141e30,#243b55);
color:#fff;
padding:20px;
position:fixed;
}

.logo{
font-size:22px;
font-weight:600;
text-align:center;
margin-bottom:40px;
}

.sidebar ul{
list-style:none;
}

.sidebar ul li{
margin:15px 0;
}

.sidebar ul li a{
text-decoration:none;
color:#fff;
padding:10px;
display:block;
border-radius:8px;
transition:0.3s;
}

.sidebar ul li a:hover,
.sidebar ul li.active a{
background:rgba(255,255,255,0.2);
}

/* MAIN */
.main{
margin-left:240px;
width:100%;
padding:20px;
}

/* TOPBAR */
.topbar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
background:#fff;
padding:15px 20px;
border-radius:10px;
box-shadow:0 4px 10px rgba(0,0,0,0.05);
}

.profile{
display:flex;
align-items:center;
gap:10px;
font-weight:500;
}

.avatar{
width:35px;
height:35px;
border-radius:50%;
background:linear-gradient(45deg,#667eea,#764ba2);
}

/* CARDS */
.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
}

.cards a{
text-decoration:none;
}

.card{
background:#fff;
padding:25px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
transition:0.3s;
position:relative;
overflow:hidden;
}

.card::before{
content:"";
position:absolute;
width:100%;
height:5px;
top:0;
left:0;
background:linear-gradient(90deg,#667eea,#764ba2);
}

.card:hover{
transform:translateY(-8px) scale(1.02);
}

.card h3{
font-size:16px;
color:#777;
margin-bottom:10px;
}

.card p{
font-size:28px;
font-weight:600;
color:#333;
}

.card:nth-child(1)::before{
background:linear-gradient(90deg,#36d1dc,#5b86e5);
}

.card:nth-child(2)::before{
background:linear-gradient(90deg,#ff9966,#ff5e62);
}

.card:nth-child(3)::before{
background:linear-gradient(90deg,#00c9ff,#92fe9d);
}

</style>

</head>
<body>

<div class="container">

<!-- SIDEBAR -->
<div class="sidebar">
<div class="logo">VIP PANEL</div>

<ul>
<li class="active"><a href="dashboard.php">Dashboard</a></li>
<li><a href="users.php">Users</a></li>
<li><a href="orders.php">Orders</a></li>
</ul>
</div>

<!-- MAIN -->
<div class="main">

<div class="topbar">
<h2>Dashboard</h2>

<div class="profile">
<span>Admin</span>
<div class="avatar"></div>
</div>
</div>

<!-- CARDS -->
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