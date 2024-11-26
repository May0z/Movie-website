<?php
include('../connection.php');

$name= $cast= $desc= $date= $trailer= $error= $success= "";
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif', 'webp');
$dir = "images";
$submitted = false;

if($_SERVER['REQUEST_METHOD']=="POST"){
  
function clean_input($field_data)
    {
        $field_data = trim($field_data);
        $field_data = stripslashes($field_data);
        $field_data = strip_tags($field_data);
        $field_data = htmlentities($field_data);

        return $field_data;
    }

    $required_fields = ['name', 'cast', 'desc', 'date', 'trailer'];
    $fields_empty = false;
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field]) || empty($_FILES['image']['name'])) {
            $fields_empty = true;
            break;
        }
    }

    if (!$fields_empty) {
        $name = clean_input($_POST['name']);
        $cast = clean_input($_POST['cast']);
        $desc = clean_input($_POST['desc']);
        $date = $_POST['date'];
        // $image = $_FILES['image']['name'];
        $trailer = clean_input($_POST['trailer']);

    if(!is_dir($dir)){
      mkdir($dir);
    }
      if($_FILES['image']['error']==0){
          $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        if(in_array($ext, $allowed_ext)){
          $file_name = basename($_FILES['image']['name']);
          $path = $dir . "/" . $file_name;
          $succ = move_uploaded_file($_FILES['image']['tmp_name'], $path);

          if($succ){

            $sql = " INSERT INTO movie_info (movie_name, movie_cast, movie_desc, release_date, image, trailer_url) values('$name', '$cast', '$desc', '$date', '$path', '$trailer' );";

            $result = mysqli_query($conn, $sql);

            if($result){
              $submitted = true;
              $success = "Movie added successfully";
              /* header('Location: ' . $_SERVER['PHP_SELF']);
              exit(); */
            }else{
              $error = "Error: ". mysqli_error($conn);
            }

          }else{
            $error= "Error while uploading a file";
          }
        }else{
          $error = "File format not supported";
        }
      }else{
        $error="Error in file";
      }
  }else{
    $error="Please fill all the fields";
  }
}

?>