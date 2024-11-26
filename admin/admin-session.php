<?php
if(isset($_SESSION, $_SESSION['admin_log']) && $_SESSION['admin_log']){

}else{
  header('location: login.php');
  exit;
}
?>