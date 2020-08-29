<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'username');
   define('DB_PASSWORD', 'password');
   define('DB_DATABASE', 'database');
   $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
 
   $error  = array();
   $res    = array();
 
        
        if(empty($_POST['email']))
        {
            $error[] = "Email field is required";    
        }
    
        if(empty($_POST['password']))
        {
            $error[] = "Password field is required";    
        }
        if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Enter Valid Email address";
        } 
         
        if(count($error)>0)
        {
            $resp['msg']    = $error;
            $resp['status'] = false;    
            echo json_encode($resp);
            exit;
        }
 
        $statement = $db->prepare("select * from users where email = :email" );
        $statement->execute(array(':email' => $_POST['email']));
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        $password = md5($_POST['password']);
        if(count($row)>0) {
           if(($password!=$row[0]['password'])) {
                $error[] = "Password is not valid.";
                $resp['msg']  = $error;
                $resp['status']   = false;    
                echo json_encode($resp);

                exit; 
           }
          session_start();
          $_SESSION['user_id'] = $row[0]['user_id'];
          $resp['redirect']    = "dashboard.php";
          $resp['status']      = true;    
          echo json_encode($resp);
          exit;    
       } else {
          $error[] = "Email does not match";
          $resp['msg']  = $error;
          $resp['status']   = false;    
          echo json_encode($resp);
          exit;    
     }
?>
