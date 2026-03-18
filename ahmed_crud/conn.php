<?php

$conn = mysqli_connect("127.0.0.1","root","","ahmed_crud");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

?>