<?php
include '../connection.php';

if(isset($_GET['show_id'])) {
    $show_id = $_GET['show_id'];

    $show_id = mysqli_real_escape_string($conn, $show_id);

    $sql = "DELETE FROM shows WHERE show_id = $show_id";

    if(mysqli_query($conn, $sql)) {
        header('Location: shows.php');
        exit;
    } else {
        echo "Cannot delete show: " . mysqli_error($conn);
    }
} else {
    echo "No show ID provided";
}
mysqli_close($conn);
?>