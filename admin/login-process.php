<?php
session_start();
$aname = $apass = "";
$username = "admin@admin.com";
$password = "adminadmin";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $aname = $_POST['aname'];
  $apass = $_POST['apass'];

  if (isset($aname, $apass) && !empty($aname) && !empty($apass)) {

    if (
      $aname == $username &&
      $apass == $password
    ) {
      $_SESSION['admin_log'] = true;
      header('location: index.php');
      exit;
    } else {
      $_SESSION['error'] = "Invalid username or password";
      header('location: login.php');
      exit;
    }
  } else {
    $_SESSION['error'] = "Log in failed";
    header('location: login.php');
    exit;
  }
}
?>