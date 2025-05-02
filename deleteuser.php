<?php
@include 'config.php';
include 'admin_header.php';
if(!$conn){
    die('connection error'.mysqli_connect_error());
}
$id=$_GET['id'];

$delete= "DELETE FROM `user_form` WHERE `id`='$id' ";
mysqli_query($conn,$delete);
header('location:players.php');
?>