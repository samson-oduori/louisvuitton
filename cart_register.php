<?php

	require('PHPMailer/PHPMailerAutoload.php');
	require('crediantial.php');
	
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Louis Vuitton online shopping | Cart Registration</title>
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
        
        #messages {
            color: red;
        }
    </style>

    <body>
        <script>
            function myfun() {
                var a = document.getElementById("mobilenumber").value;
                if (a.length < 10) {
                    document.getElementById("messages").innerHTML = "Error: Mobile number must be 10 digits";
                    return false;
                }
                if (a.length > 10) {
                    document.getElementById("messages").innerHTML = "Error: Mobile number must be 10 digits";
                    return false;
                }

                if ((a.charAt(0) != 0) && (a.charAt(0) != 7)) {
                    document.getElementById("messages").innerHTML = "Error: Mobile number must start with 07";
                    return false;
                }
            }
        </script>
        <?php
session_start();
$username = "";
$errors = array();

$conn = mysqli_connect("localhost", "root", "", "email");

if(isset($_POST['register'])){
		$name = mysqli_escape_string($conn, $_POST['name']);
		$email = mysqli_escape_string($conn, $_POST['email']);
		$phone = mysqli_escape_string($conn, $_POST['phone']);
		$password = mysqli_escape_string($conn, $_POST['password']);
		$repassword = mysqli_escape_string($conn, $_POST['repassword']);
		
		$token = md5(rand('10000','99999'));
		$status = "Inactive";
	
		if(empty($name)){
			array_push($errors, "Username is required");
		}
		if(empty($email)){
			array_push($errors, "Email is required");
		}
		
		$s = "SELECT * FROM register where phone = '$phone'";

		$result = mysqli_query($conn, $s);
		$num = mysqli_num_rows($result);

		if($num == 1){
			array_push($errors, "The Phone Number already exists");
		}
		
		if(empty($phone)){
			array_push($errors, "Phone Number is required");
		}
		if(empty($password)){
			array_push($errors, "The Password is required");
		}
	
		if($password != $repassword){
			array_push($errors, "The two passwords do not match");
		}
	$s = "SELECT * FROM register where email = '$email'";

		$result = mysqli_query($conn, $s);
		$num = mysqli_num_rows($result);

		if($num == 1){
			array_push($errors, "The Email Address already exists");
		}
		else 
			
		if(count($errors) == 0){
			$password = md5($password);
			$sql = "INSERT INTO register (name, email, phone, password, token, status) VALUES ('".$name."','".$email."','".$phone."','".$password."','".$token."','".$status."')";
			mysqli_query($conn, $sql);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are logged in";
		
		$last_id = mysqli_insert_id($conn);

		$url = 'http://'.$_SERVER['SERVER_NAME'].'/louis-vuitton-online-shopping/verify-account.php?id='.$last_id.'&token='.$token;

		$output = '<div>Thanks for the registration. Please click the link below for account activation. <br>'.$url.'</div>';

		if ($result == true){

			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->isSMTP(); // Send using SMTP
				$mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
				$mail->SMTPAuth = true; // Enable SMTP authentication
				$mail->Username = 'oduorisamson1@gmail.com'; // SMTP username
				$mail->Password = '1@Sam123Son1Nyakober'; // SMTP password
				$mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
				$mail->Port = 587; // TCP port to connect to

				//Recipients
				$mail->setFrom('no-reply@online-shop.com', 'Louis Vuitton');
				$mail->addAddress($email, $name); // Add a recipient
				// $mail->addAddress('ellen@example.com');  // Name is optional
				// $mail->addReplyTo('info@example.com', 'Information');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');

				// Attachments
				// $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
				//$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

				// Content
				$mail->isHTML(true); // Set email format to HTML

				$mail->Subject = 'Account Verification';
				$mail->Body    = $output;
				// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				$mail->send();
				array_push($errors, "<p class='success'>You are successfully Registered. Please check on your email for Account Verification</p >");
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
}

?>

            <div class="container">

                <form action="" method="post" onsubmit="return myfun()">
                    <div class="row">
                        <div class="col-md-5">
                            <h1>Register</h1>
                            <hr>
                            <?php include('errors.php'); ?>
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Enter Username">
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email Address">
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="text" name="phone" placeholder="Phone Number" id="mobilenumber" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" maxlength="10">                                <span id="messages"></span>
                            </div>

                            <div class="form-group">
                                <i class="fa fa-key icon"></i>
                                <input class="form-control" type="password" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="password" name="repassword" placeholder="Confirm Password">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success pull-left" type="submit" name="register" value="Register">
                                <p style="margin-top:20px;">Already have an account?
                                    <a href="cart_login.php">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
    </body>

    </html>