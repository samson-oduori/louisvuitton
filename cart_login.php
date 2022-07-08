<!DOCTYPE html>
<html>
<head>
	<title>Louis Vuitton online shopping | Login Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>
<style>
    body {
        margin-top: 40px;
    }
	.error{
	width: 100%;
	margin: 0px auto;
	padding: 10px;
	border: 0px solid #a94442;
	color: #a94442;
	background: #f2dede;
	border-radius: 5px;
	text-align: center;
}
.success{
   color:green;
}
a{
	color:red;
}

</style>

<body>

<?php
session_start();
$email = "";
$errors = array();

$conn = mysqli_connect("localhost", "root", "", "email");
if(isset($_POST['login'])){

    $email = mysqli_escape_string($conn, $_POST['email']);
	$password = mysqli_escape_string($conn, $_POST['password']);
	if(empty($email)){
		array_push($errors, "Email is required");
	}
	if(empty($password)){
		array_push($errors, "The Password is required");
	}
	if (count($errors) == 0 ){
		$password = md5($password);
		$query = "SELECT * FROM register WHERE email = '$email' AND password = '$password' AND status = 'Active'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1){
		
			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are logged in";
				header('location: products.php');
			}else{
				array_push($errors, "<p class='success'>Account not yet Verified or Invalid Email or password</p >");
			}
		}
		
		
	}

?>

	<div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-5">
                    <h1>Login</h1>
					
					<?php
						
						if (isset($_GET["newpwd"])) {
							if ($_GET["newpwd"] == "passwordupdated") {
								echo '<p class="success">Your password has been reset successfully</p>';
							}
						}
					
					?>
					
					<hr>
						<?php include('errors.php'); ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter Email Address">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Enter Password">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success pull-left" type="submit" name="login" value="Login">
					<p style="font-size:17px; margin-top:10px;"><a href="forgot-password.php">Forgot Password?</a></p>
					
						<p style="margin-top:10px; font-size:17px;">Don't have an account?
					<a href="cart_register.php">Register</a>
					</p>
                  </div>
            </div>
        </form>

    </div>
</body>
</html>