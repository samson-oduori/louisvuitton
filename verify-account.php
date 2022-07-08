<?php 

$conn = mysqli_connect("localhost", "root", "", "email");

$id = $_GET['id'];
$token = $_GET['token'];
$update = "UPDATE register SET status = 'Active' WHERE id = '$id' AND token = '$token'";

$result = mysqli_query($conn, $update);

if ($result) {
    echo 'Your Account has been successfully Activated. You can now <a href="shop-login.php">Login</a>';
}else{
    echo "Account Not Verified";
}

?>