<?php
include '../connection.php';

if(isset($_GET['movie_id'])) {
    $movie_id = $_GET['movie_id'];

    $movie_id = mysqli_real_escape_string($conn, $movie_id);

    $sql = "DELETE FROM movie_info WHERE movie_id = $movie_id";

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