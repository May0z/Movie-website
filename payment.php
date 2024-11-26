<?php
include('connection.php');
include('header.php');
if(isset($_SESSION, $_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){

}else{
  header('location: login.php');
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sajilo Cinemas</title>
</head>
<body>
  <div class="container mt-4 w-50">
  
  <?php
    if(isset($_SESSION, $_SESSION['error']) && !empty($_SESSION['error'])){
      echo"<div class='alert alert-danger my-4'>{$_SESSION['error']}</div>";
      unset($_SESSION['error']);
    }else{
      ?>
      <?php 
      $query_audi = mysqli_query($conn, "SELECT screen_name FROM screen_info where screen_id = {$_SESSION['audi']}");
      $audi_info = mysqli_fetch_assoc($query_audi);

      $query_time = mysqli_query($conn, "SELECT show_times FROM show_times where st_id = {$_SESSION['stime']}");
      $time_info = mysqli_fetch_assoc($query_time);

  ?>
    <h3>Booking Details</h3>
    <ul class="list-group">
  <li class="list-group-item">Movie Title: <div class="float-end"><?php echo $_SESSION['movie'];?></div></li>
  <li class="list-group-item">Auditorium: <div class="float-end"><?php echo  $audi_info['screen_name'];?></div></li>
  <li class="list-group-item">Show Date: <div class="float-end"><?php echo $_SESSION['date'];?></div></li>
  <li class="list-group-item">Start Time: <div class="float-end"><?php echo $time_info['show_times'];?></div></li>
  <li class="list-group-item">Number of Seats: <div class="float-end"><?php echo $_SESSION['seat'];?></div></li>
  <li class="list-group-item">Ticket ID: <div class="float-end"><?php echo $_SESSION['ticket_id'];?></div></li>
  <li class="list-group-item"><strong>Total Amount: <div class="float-end"><?php echo $_SESSION['amount'];?></div></strong></li>
</ul>
<div class="btn btn-primary btn-sm rounded-0 justify-content-end float-end px-3 py-2" onclick="redirectToPage()">Confirm</div>
<?php } ?>
  </div>
  <script>
     function redirectToPage() {
            window.location.href = 'payment-forward.php'; 
        }
  </script>
</body>
</html>