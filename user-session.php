<?php

if(isset($_SESSION, $_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){

}else{
  header('location: login.php');
exit;
}

?>