<?php
include('../connection.php');

$sname= $seats= $price= $error= $succes= "";
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

if($_SERVER['REQUEST_METHOD']=="POST"){
  
function clean_input($field_data)
    {
        $field_data = trim($field_data);
        $field_data = stripslashes($field_data);
        $field_data = strip_tags($field_data);
        $field_data = htmlentities($field_data);

        return $field_data;
    }

    $required_fields = ['sname', 'seats'];
    $fields_empty = false;

    /* function validateTime($time) {
      // Check if the input matches the expected format (HH:MM:SS)
      if (!preg_match('/^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/', $time)) {
          return "Invalid time format. Please use HH:MM:SS format.";
      }
  
      // Optionally, parse the input to extract hours, minutes, and seconds
      list($hours, $minutes, $seconds) = explode(':', $time);
  
      // Check if the time falls within a valid range
      if ($hours < 0 || $hours > 23 || $minutes < 0 || $minutes > 59 || $seconds < 0 || $seconds > 59) {
          return "Invalid time range. Hours must be between 00 and 23, minutes and seconds must be between 00 and 59.";
      }
  
      // If all validations pass, return true or perform further processing
      return true;
  } */
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $fields_empty = true;
            break;
        }
    }

    if (!$fields_empty) {
        $sname = clean_input($_POST['sname']);
        $seats = clean_input($_POST['seats']);

        if (!preg_match("/^[A-Z a-z 0-9]+$/", $sname)) {
          $error = "Invalid name";
      } elseif (!preg_match("/^[0-9]+$/", $seats)) {
          $error = "Invalid input for seats";
    }else {
          // Insert user data into the database
          $sql = "INSERT INTO screen_info (screen_name, total_seats) values('$sname', '$seats')";
          $query = mysqli_query($conn, $sql);

          if($query){
            $success= "Screen added successfully";
          }else{
            $error = "Error: ". mysqli_error($conn);
          }
      }
  }else{
    $error="Please fill all the fields";
  }
}

?>