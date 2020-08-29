<?php
/* $conn = new mysqli("localhost", "username", 'password', "database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Cannot connect";
}

if(isset($_POST['btn-save'])) {
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    $row = $stmt_result->fetch_assoc();
    $username = $_POST['user_name'];
    $email = $_POST['user_email'];
    $user_password = $_POST['password'];

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
        if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
        array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users ('user_id', 'first_name', 'last_name', 'email', 'password', 'date_added') 
                VALUES(NULL, $username, '', $email, $password, CURRENT_TIME)";
        mysqli_query($conn, $query);
    }

    /* $stmt = $conn->prepare("INSERT INTO 'users' ('user_id', 'first_name', 'last_name', 'email', 'password', 'date_added') VALUES (NULL, $user_name, '', '$user_email', $user_password, CURRENT_TIMESTAMP)");
        $stmt->execute();
        echo "registered";

    if($row['email']){
        $stmt = $conn->prepare("INSERT INTO 'users' ('user_id', 'first_name', 'last_name', 'email', 'password', 'date_added') VALUES (NULL, $user_name, '', '$user_email', $user_password, CURRENT_TIMESTAMP)");
        $stmt->execute();
        echo "registered";
    } else{
        echo "Cannot access email.";
    }
    
    if(!$row['email']){
    } else {
        echo "123";
    } */
/* } else {
    echo "error";
} */ 
?>

<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost", "username", 'password', "database");

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
      echo "User exists";
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      echo "Email exists";
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
      mysqli_query($db, $query);
      echo "registered";
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: success.php');
  }
}
