<?php
include '../connection.php';

if(isset($_GET['um_id'])) {
    $um_id = $_GET['um_id'];

    $um_id = mysqli_real_escape_string($conn, $um_id);

    $sql = "DELETE FROM upcoming_movies WHERE um_id = $um_id";

    if(mysqli_query($conn, $sql)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Cannot delete movie: " . mysqli_error($conn);
    }
} else {
    echo "No movie ID provided";
}
mysqli_close($conn);
?>

