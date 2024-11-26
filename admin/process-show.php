<?php 
include('../connection.php');

$error = $success = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve and validate form inputs
    $movie_id = isset($_POST['movie']) ? $_POST['movie'] : '';
    $screen_id = isset($_POST['audi']) ? $_POST['audi'] : '';
    $st_ids = isset($_POST['stime']) ? $_POST['stime'] : [];

    if (!empty($movie_id) && !empty($screen_id) && !empty($st_ids)) {
        // Insert main show details into the shows table
        $sql = "INSERT INTO shows (movie_id, screen_id) VALUES(?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ii", $movie_id, $screen_id);

            if (mysqli_stmt_execute($stmt)) {
                $show_id = mysqli_insert_id($conn); // Get the last inserted show ID

                // Prepare statement for inserting show times into the mapping table
                $sql_times = "INSERT INTO show_times_mapping (show_id, st_id) VALUES(?, ?)";
                $stmt_times = mysqli_prepare($conn, $sql_times);

                if ($stmt_times) {
                    foreach ($st_ids as $st_id) {
                        mysqli_stmt_bind_param($stmt_times, "ii", $show_id, $st_id);
                        mysqli_stmt_execute($stmt_times);
                    }

                    $success = "Show added successfully.";
                } else {
                    $error = "Error: " . mysqli_error($conn);
                }
            } else {
                $error = "Error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    } else {
        $error = "Please choose all required options.";
    }
}
?>
