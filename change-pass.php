<!DOCTYPE html>
<html>

<head>
    <title>Louis Vuitton online shopping | Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>
<style>
    body {
        margin-top: 40px;
    }
    
    .error {
        width: 100%;
        margin: 0px auto;
        padding: 10px;
        border: 0px solid #a94442;
        color: #a94442;
        background: #f2dede;
        border-radius: 5px;
        text-align: center;
    }
    
    .success {
        color: green;
    }
    
    a {
        color: red;
    }
</style>

<body>

    <?php

session_start();
$email = "";
$errors = array();

$conn = mysqli_connect("localhost", "root", "", "email");

if (isset($_POST['change'])) {
	$id = mysqli_escape_string($conn, $_GET['id']);
	$token = mysqli_escape_string($conn, $_GET['token']);
	$email = mysqli_escape_string($conn, $_GET['email']);
	
	$oldPass = mysqli_escape_string($conn, $_POST['oldPass']);
	$newPass = mysqli_escape_string($conn, $_POST['newPass']);
	$rePass = mysqli_escape_string($conn, $_POST['rePass']);
	
	$select = "SELECT * FROM register WHERE id = '$id' AND email='$email' AND token = '$token'";
	$result = mysqli_query($conn, $select);
	$count = mysqli_num_rows($result);
	$data = mysqli_fetch_array($result);
	
	$password = $data['password'];
		if ((md5($oldPass)) == $password) {
			if ($newPass == $rePass) {
			
			$newPass = md5($newPass);
			$update = "UPDATE register SET password = '$newPass' WHERE email = '$email' AND id = '$id' AND token ='$token'";
			$resultSucc = mysqli_query($conn, $update);
			if ($resultSucc){
				array_push($errors, "Your Password was changed successfully. You may login now");
			}
			
		}else{
			array_push($errors, "The two passwords do not match");
		}
		}else{
			array_push($errors, "The old password did not match our records. Please try again!");
		}
		
		
	
	
}

?>

        <div class="container">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-5">
                        <h1>Create New Password</h1>
                        <hr>

                        <?php include('errors.php'); ?>

                        <div class="form-group">
                            <input class="form-control" type="password" name="oldPass" placeholder="Enter Your Old Password" required="">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" name="newPass" placeholder="Enter New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required="">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" name="rePass" placeholder="Confirm New Password" required="">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-success pull-left" type="submit" name="change" value="Submit">

                            <p style="margin-top:20px;">Don't want to create new password?
                                <a href="shop-login.php">Login</a>
                            </p>

                        </div>
                    </div>
            </form>

            </div>
</body>

</html>