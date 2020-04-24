/*
 * Author : Imdad Hossain
 * Created On : 10.03.2020
 * 
 */
<?php
session_start();

// initializing variables
$name = "";
$phone = "";
$email = "";
$errors = array();
$domain_name = "";
$save_email = "";
$save_password = ""; 
$times = 0;

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'wis');

// REGISTER USER
if (isset($_POST['reg_user'])) {
	registerUser();
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    loginUser();
}

function registerUser() {
   // receive all input values from the form
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($name)) { array_push($errors, "Name is required"); }
	if (empty($phone)) { array_push($errors, "Phone Number is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	if(1 === preg_match('~[0-9]~', $name)){ array_push($errors, "Improper: Name should not contain number"); }
	if(!(1 === preg_match('~[0-9]~', $phone))){ array_push($errors, "Improper: Phone should contain number only"); }
	if(! preg_match('/[A-Z]/', $password_1)){ array_push($errors, "Password must contain a upper case"); }
	if(!preg_match('~[0-9]~', $password_1)){ array_push($errors, "Password must contain a number"); }
	if(strlen($password_1)< 8){ array_push($errors, "Password must be 8 digits long");} 
	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM tblusers WHERE email='$email' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);
  
  

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  

	// Finally, register user if there are no errors in the form
	if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO tblusers (name, phone, email, password) 
  			  VALUES('$name', '$phone', '$email', '$password')";
  	mysqli_query($db, $query);
 
  	array_push($errors,"Registered successfully");

	}
}


function loginUser() {
		
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM tblusers WHERE email='$email' AND password='$password'";
		//$query1 = "SELECT LAST_INSERT_ID();"
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
			$user_check_query1 = "SELECT * FROM tblusers WHERE email='$email' LIMIT 1";
		$result1 = mysqli_query($db, $user_check_query1);
		$user1 = mysqli_fetch_assoc($result1);
		$_SESSION['email'] = $email;
		$_SESSION['success'] = "Welcome " . $user1['name']  ;
		if($email==='admin@gmail.com'){header('location: admin.php');}
		else{header('location: home.php');}
  	}else {
		//$times++;
  		array_push($errors, "Wrong email/password combination");
		
		if($times > 3){array_push($errors, "You tried too many times . Please try angain later");
		//sleep(18000);
		}
	 }
	}
}

?>