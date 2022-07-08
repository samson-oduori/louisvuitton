<?php

	require('PHPMailer/PHPMailerAutoload.php');
	require('crediantial.php');
	

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Louis Vuitton online shopping | Forgot Password</title>
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

if (isset($_POST['forgrt'])) {
	$email = mysqli_escape_string($conn, $_POST['email']);
	
	$select = "SELECT * FROM register WHERE email = '$email'";
	$result = mysqli_query($conn, $select);
	$count = mysqli_num_rows($result);
	$data = mysqli_fetch_array($result);
	
	$idData = $data['id'];
	
	$tokenData = $data['token'];
	
	$emailData = $data['email'];
	$nameData = $data['name'];
	
	$url = 'http://'.$_SERVER['SERVER_NAME'].'/louis-vuitton-online-shopping/change-pass.php?id='.$idData.'&email='.$emailData.'&token='.$tokenData;
	
	$output = '<div>Please click the link below to complete the password reset action. <br>'.$url.'</div>';
	
	if ($email == $emailData) {
		
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
				$mail->addAddress($email, $nameData); // Add a recipient
				// $mail->addAddress('ellen@example.com');  // Name is optional
				// $mail->addReplyTo('info@example.com', 'Information');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');

				// Attachments
				// $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
				//$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

				// Content
				$mail->isHTML(true); // Set email format to HTML

				$mail->Subject = 'Reset Password';
				$mail->Body    = $output;
				// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				$mail->send();
				array_push($errors, "<p class='success'>We sent you an e-mail to reset your password. Please check it to complete the action.</p >");
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		
		
	} else {
		array_push($errors, "Invalid Email Address!");
	}
	
}
?>

            <div class="container">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <h1>Reset Password</h1>
                            <hr>

                            <?php include('errors.php'); ?>

                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Enter Email Address" required="">
                            </div>


                            <div class="form-group">
                                <input class="btn btn-success pull-left" type="submit" name="forgrt" value="Submit">
                                <p style="font-size:17px; margin-top:10px;">Don't want to reset password? <a href="shop-login.php">Login</a></p>

                            </div>
                        </div>
                </form>

                </div>
    </body>

    </html>