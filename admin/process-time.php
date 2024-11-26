<?php 
  include('../connection.php');

  $stime= $error= $euccess = "";
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $stime = $_POST['stime'];

    if(isset($stime) && !empty($stime)){

      
      $sql = "INSERT INTO show_times (show_times) VALUES('$stime')";
      $query = mysqli_query($conn, $sql);

      if($query){
        $success = "Time added successfully";
      }else{
        $error = "Error:". mysqli_error($conn);
      }
    }else{
      $error = "choose time";
    }
  }
?>