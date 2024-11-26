<?php
include '../connection.php';

if(isset($_GET['screen_id'])) {
    $screen_id = $_GET['screen_id'];

    $screen_id = mysqli_real_escape_string($conn, $screen_id);

    $sql = "DELETE FROM screen_info WHERE screen_id = $screen_id";

    if(mysqli_query($conn, $sql)) {
        header('Location: screens.php');
        exit;
    } else {
        echo "Cannot delete screen: " . mysqli_error($conn);
    }
} else {
    echo "No screen ID provided";
}
mysqli_close($conn);
?>