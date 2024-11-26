<?php
  session_start();
  include('connection.php');
  include('user-session.php');
  

  if(isset($_SESSION, $_SESSION['name']) && !empty($_SESSION['name'])){
    $error= $success= "";

  if($_SERVER['REQUEST_METHOD']=="POST"){
      $user_id = $_SESSION['user_id'] = isset($_SESSION['id']) ? $_SESSION['id'] : '';
      $audi = $_SESSION['audi'] = isset($_POST['audi']) ? $_POST['audi']: '';
      $date = $_SESSION['date'] = isset($_POST['show_date']) ? $_POST['show_date']: '';
      $stime = $_SESSION['stime'] = isset($_POST['stime']) ? $_POST['stime'] : '';
      $seat = $_SESSION['seat'] = isset($_POST['number_of_seat']) ? $_POST['number_of_seat'] : '';
      $amount = $_SESSION['amount'] = isset($_POST['amount']) ? $_POST['amount'] : '';
      

    if(!empty($audi) && !empty($date) && !empty($stime) && !empty($seat) && !empty($amount) && !empty($user_id)){
      if($seat>0){
      $ticket_id = $_SESSION['ticket_id'] = "TKT".time();
      $sql_data = "SELECT movie_name FROM movie_info where movie_id = {$_SESSION['movie_id']}";

      $query_data = mysqli_query($conn,$sql_data );
      $movie_row = mysqli_fetch_assoc($query_data);
      $_SESSION['movie'] = $movie_row['movie_name'];

      /* $sql = "INSERT INTO bookings (user_id, movie, screen, date, start_time, number_of_seats, total_amount, ticket_id)
                VALUES('$user_id','{$movie_row['movie_name']}', '$audi', '$date', '$stime', '$seat', '$amount', '$ticket_id');  
              ";
      $query= mysqli_query($conn, $sql); */
        header('location: payment.php');
        exit;
    }else{
      $_SESSION['error'] = "Error: Seat was not selected";
      header('location: payment.php');
        exit;
    }
    }else{
      $_SESSION['error'] = "Error: ALL FIELDS ARE REQUIRED TO BE FILLED";
      header('location: payment.php');
        exit;
      //echo $error;
    }  
  }
}else{
  header('location: login.php');
  exit;
}
?>