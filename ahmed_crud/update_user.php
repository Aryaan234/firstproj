<?php
include 'conn.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No ID Found";
    exit();
}

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $update = "UPDATE users 
               SET name='$name', email='$email', role='$role' 
               WHERE id=$id";

    if(mysqli_query($conn, $update)){
        header("Location: users.php");
    } else {
        echo "Update Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Update User</title>

<style>

body{
font-family: Arial, sans-serif;
background:#0f0f0f;
color:#ffffff;
margin:0;
padding:0;
}

/* container */

.form-box{
width:420px;
margin:80px auto;
background:#1a1a1a;
padding:35px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.6);
}

/* title */

h2{
text-align:center;
margin-bottom:25px;
color:#f1f1f1;
}

/* labels */

label{
display:block;
margin-bottom:6px;
color:#dddddd;
font-size:14px;
}

/* inputs */

input{
width:100%;
padding:10px;
border-radius:8px;
border:1px solid #2f2f2f;
background:#111;
color:white;
margin-bottom:18px;
outline:none;
transition:0.3s;
}

input:focus{
border-color:#444;
background:#141414;
}

/* buttons */

button{
width:100%;
padding:10px;
border:none;
border-radius:25px;
background:#2e7d32;
color:white;
font-size:15px;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#388e3c;
}

/* back button */

.back-btn{
display:inline-block;
margin-top:20px;
padding:9px 20px;
border-radius:25px;
background:#333;
color:white;
text-decoration:none;
transition:0.3s;
}

.back-btn:hover{
background:#444;
}

</style>

</head>
<body>

<div class="form-box">

<h2>Update User</h2>

<form method="POST">

<label>Name</label>
<input type="text" name="name" value="<?php echo $row['name']; ?>">

<label>Email</label>
<input type="email" name="email" value="<?php echo $row['email']; ?>">

<label>Role</label>
<input type="text" name="role" value="<?php echo $row['role']; ?>">

<button type="submit" name="update">Update User</button>

</form>

<a href="users.php" class="back-btn">← Back</a>

</div>

</body>
</html>