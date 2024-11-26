<?php
session_start();
  include('connection.php');

  $uemail = $upass = "";

  if($_SERVER['REQUEST_METHOD']=="POST"){

    $uemail = $_POST['uemail'];
    $upass = $_POST['upass'];

    if(isset($uemail, $upass) && !empty($uemail) && !empty($upass)){

      $sql = "SELECT * FROM user_info WHERE email = '$uemail' AND password = '$upass'";

      $query = mysqli_query($conn, $sql);

      if (mysqli_num_rows($query)<=0){
        $_SESSION['error']= "Invalid username or password";
        header('location: login.php');
        exit;
      }
      else{
        $rows = mysqli_fetch_assoc($query);
        if($rows['email'] == $uemail &&
            $rows['password'] == $upass){
              $_SESSION['id'] = $rows['user_id'];
              $_SESSION['name'] = $rows['username'];
              $_SESSION['email'] = $rows['email'];
              $_SESSION['is_logged_in'] = true;
              header('location: index.php');
              exit;
            }else{
              $_SESSION['error']="Invalid username or password";
              header('location: login.php');
              exit;
            }
      }
    }else{
      $_SESSION['error'] = "Log in failed";
      header('location: login.php');
      exit;
    }
  }
?>