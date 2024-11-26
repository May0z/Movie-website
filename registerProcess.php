<?php 
include('connection.php');

$uname = $uage = $ugender = $unumber = $uemail = $upass = $urepass = "";
$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    function clean_input($field_data)
    {
        $field_data = trim($field_data);
        $field_data = stripslashes($field_data);
        $field_data = strip_tags($field_data);
        $field_data = htmlentities($field_data);

        return $field_data;
    }

    $required_fields = ['uname', 'uage', 'gender', 'unumber', 'uemail', 'upass', 'urepass'];
    $fields_empty = false;
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $fields_empty = true;
            break;
        }
    }

    if (!$fields_empty) {
        $uname = clean_input($_POST['uname']);
        $uage = clean_input($_POST['uage']);
        $ugender = clean_input($_POST['gender']);
        $unumber = clean_input($_POST['unumber']);
        $uemail = clean_input($_POST['uemail']);
        $upass = clean_input($_POST['upass']);
        $urepass = clean_input($_POST['urepass']);

        if (!preg_match("/^[A-Za-z]+$/", $uname)) {
            $error = "** Only letters are valid for username**";
        } elseif (!preg_match("/^[0-9]+$/", $uage)) {
            $error = "** Invalid age **";
        } elseif (!preg_match("/^[0-9]+$/", $unumber) || strlen($unumber) != 10) {
            $error = "** Invalid number **";
        } elseif (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
            $error = "** Enter a Valid Email **";
        } elseif (strlen($upass) < 8) {
            $error = "** Password must be at least 8 characters **";
        } elseif ($upass != $urepass) {
            $error = "** Passwords do not match **";
        } else {
            // Insert user data into the database
            $sql = "INSERT INTO user_info (username, age, gender, contact, email, password) 
                    VALUES ('$uname', '$uage', '$ugender', '$unumber', '$uemail', '$upass')";

            $query = mysqli_query($conn, $sql);

            if ($query) {
                $success = "User Registered Successfully.";
            } else {
                $error = "Error: " . mysqli_error($con);
            }
        }
    } else {
        $error = "** Fill out all the fields **";
    }
}

?>