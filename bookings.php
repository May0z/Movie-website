<?php
include('header.php');
include('connection.php');

if(isset($_SESSION, $_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){

}else{
  header('Location: login.php');
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
  <div class="container mx-auto m-3 w-50">
    <h2 class="text-center">My Bookings</h2>
    <?php
        $sql = "SELECT * FROM bookings WHERE user_id = {$_SESSION['id']}";
        $query = mysqli_query($conn, $sql);


      if(mysqli_num_rows($query)>0){
        while($rows = mysqli_fetch_assoc($query)){
          $sql_screen = "SELECT screen_name FROM screen_info WHERE screen_id = {$rows['screen']}";
          $query_screen = mysqli_query($conn, $sql_screen);
          $screeninfo = mysqli_fetch_assoc($query_screen);
      ?>
    <div class="booking my-3">
     
  <ul class="list-group">
  <li class="list-group-item"><strong>Movie Title:</strong> <div class="float-end"><?php echo $rows['movie'];?></div></li>
  <li class="list-group-item"><strong>Auditorium:</strong> <div class="float-end"><?php echo  $screeninfo['screen_name'];?></div></li>
  <li class="list-group-item"><strong>Show Date:</strong> <div class="float-end"><?php echo $rows['date'];?></div></li>
  <li class="list-group-item"><strong>Start Time:</strong> <div class="float-end"><?php echo $rows['start_time'];?></div></li>
  <li class="list-group-item"><strong>Number of Seats:</strong> <div class="float-end"><?php echo $rows['number_of_seats'];?></div></li>
  <li class="list-group-item"><strong>Ticket ID:</strong> <div class="float-end"><?php echo $rows['ticket_id'];?></div></li>
  </ul>
  <?php } 
  ?>
  </div> 
  <?php }else{
    echo "<div class='heading2 mt-3 text-center bg-secondary  py-1'>
    <h2 class='text-light'>No Bookings Yet</h2>
  </div>";  
  }
    ?>
  </div>
</body>
</html>