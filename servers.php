<?php
	session_start();
	$username="" ;
	$errors= array();

	$db= mysqli_connect('localhost', 'root', '',
	'acaciaadmin');

	if(isset($_POST['register'])){
	$username= mysqli_escape_string($db, $_POST['username']);
	$password1= mysqli_escape_string($db, $_POST['password1']);
	$password2= mysqli_escape_string($db, $_POST['password2']);
	if(empty($username)){
	array_push($errors," Phone Number is required" );
	}
	if(empty($password1)){
	array_push($errors," The Password is required" );
	}

	if($password1 != $password2){
	array_push($errors," The two passwords do not match" );
	}
	$s="SELECT * FROM hostel_reg where phone= '$username'" ;
	$result= mysqli_query($db, $s);
	$num= mysqli_num_rows($result);

	if($num == 1){
	array_push($errors," The phone number already exists" );
	}

	if(count($errors) == 0){
	$password= md5($password1);
	$sql="INSERT INTO hostel_reg (phone, password) VALUES
	('$username', '$password')" ;
	mysqli_query($db, $sql);
	$_SESSION['username']= $username;
	$_SESSION['success']="You are logged in" ;
	header('location: products.php');
	}
	}

	if (isset($_POST['login'])){
	$username= mysqli_escape_string($db, $_POST['username']);
	$password= mysqli_escape_string($db, $_POST['password']);
	if(empty($username)){
	array_push($errors," Phone Number is required" );
	}
	if(empty($password)){
	array_push($errors," The Password is required" );
	}
	if (count($errors) == 0 ){
	$password= md5($password);
	$query="SELECT * FROM hostel_reg WHERE phone= '$username'
	AND password= '$password'" ;
	$result= mysqli_query($db, $query);
	if (mysqli_num_rows($result) == 1){
	$_SESSION['username']= $username;
	$_SESSION['success']="You are logged in" ;
	header('location: products.php');
	}else{
	array_push($errors," Wrong Username or Password" );
	}
	}


	}
	?>