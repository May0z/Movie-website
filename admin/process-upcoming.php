<?php
include('../connection.php');

$up_name= $up_trailer= $err= $suc= "";
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif', 'webp');
$dir = "upcoming-images";
$submit = false;

if($_SERVER['REQUEST_METHOD']=="POST"){
  
function clear_input($field_data)
    {
        $field_data = trim($field_data);
        $field_data = stripslashes($field_data);
        $field_data = strip_tags($field_data);
        $field_data = htmlentities($field_data);

        return $field_data;
    }

    $required_fields = ['name', 'trailer'];
    $fields_empty = false;
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field]) || empty($_FILES['up_image']['name'])) {
            $fields_empty = true;
            break;
        }
    }

    if (!$fields_empty) {
        $up_name = clear_input($_POST['name']);
        $up_trailer = clear_input($_POST['trailer'])."&autoplay=1";

    if(!is_dir($dir)){
      mkdir($dir);
    }
      if($_FILES['up_image']['error']==0){
          $ext = pathinfo($_FILES['up_image']['name'], PATHINFO_EXTENSION);

        if(in_array($ext, $allowed_ext)){
          $file_name = basename($_FILES['up_image']['name']);
          $path = $dir . "/" . $file_name;
          $succ = move_uploaded_file($_FILES['up_image']['tmp_name'], $path);

          if($succ){

            $sql = " INSERT INTO upcoming_movies (movie_title, image, trailer) values('$up_name', '$path', '$up_trailer' );";

            $result = mysqli_query($conn, $sql);

            if($result){
              $submit = true;
              $suc = "Movie added successfully";
              /* header('Location: ' . $_SERVER['PHP_SELF']);
              exit(); */
            }else{
              $err = "Error: ". mysqli_error($conn);
            }

          }else{
            $err= "Error while uploading a file";
          }
        }else{
          $err = "File format not supported";
        }
      }else{
        $err="Error in file";
      }
  }else{
    $err="Please fill all the fields";
  }
}

?>