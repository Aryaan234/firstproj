<?php
include 'conn.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $delete = "DELETE FROM users WHERE id = $id";

    if(mysqli_query($conn, $delete)){
        header("Location: users.php");
    } else {
        echo "Delete Failed";
    }
} else {
    echo "No ID Found";
}
?>