<?php
session_start();

include('connection.php');


if(isset($_SESSION['user_id'], $_SESSION['movie'], $_SESSION['audi'], $_SESSION['date'], $_SESSION['stime'], $_SESSION['seat'], $_SESSION['amount'], $_SESSION['ticket_id'])){
  
    $fields = ['user_id', 'movie', 'audi', 'date', 'stime', 'seat', 'amount', 'ticket_id'];
    $field_empty = false;
    
    foreach($fields as $info){
        if(empty($_SESSION[$info])){
            $field_empty = true;
            break;
        }
    }

    if(!$field_empty){
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO bookings (user_id, movie, screen, date, start_time, number_of_seats, total_amount, ticket_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'isssssis', $_SESSION['user_id'], $_SESSION['movie'], $_SESSION['audi'], $_SESSION['date'], $_SESSION['stime'], $_SESSION['seat'], $_SESSION['amount'], $_SESSION['ticket_id']);
            $executed = mysqli_stmt_execute($stmt);

            if ($executed) {
                header('Location: bookings.php');
                exit;
            } else {
                echo "Database error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "SQL preparation error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Error Occurred: One or more fields are empty.";
        header('Location: payment.php');
        exit;
    }
} else {
    $_SESSION['error'] = "Error Occurred: Missing session variables.";
    header('Location: payment.php');
    exit;
}

mysqli_close($conn);
?>
