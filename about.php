<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Movie</title>
  <style>
    td {
      width: 50%;
    }
  </style>
</head>

<body>
  <?php
  include('header.php');

  ?>
  <main class="container-fluid mt-3">
    <div class="row">
      <!-- First Sub Container (70%) -->
      <?php
      $movie_id = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;
      $_SESSION['movie_id'] = $movie_id;

      // Validate the movie ID
      if ($movie_id <= 0) {
        echo "Invalid movie ID.";
        exit;
      }
      $sql1 = "SELECT * FROM movie_info WHERE movie_id = $movie_id";
      $query1 = mysqli_query($conn, $sql1);

      foreach ($query1 as $details) {
      ?>
        <div class="col-md-8 p-5">
          <div class="heading text-center bg-secondary bg-opacity-10">
            <h1><?php echo $details['movie_name'];
                ?></h1>
          </div>

          <div class="d-flex mt-4">
            <div class="p-2 w-25">
              <img src="<?php echo "admin/" . $details['image']; ?>" alt="Black Widow" class="img-fluid">
            </div>
            <div class="description p-2 ms-5 p-5">
              <p><strong>Cast:</strong> <?php echo $details['movie_cast']; ?></p>
              <p><strong>Release Date:</strong> <?php echo $details['release_date']; ?></p>
              <p><?php echo $details['movie_desc']; ?></p>
              <a href="<?php echo $details['trailer_url']; ?>" target="_blank" class="btn btn-warning btn-sm rounded-0">Watch Trailer</a>
            </div>
          </div>
        <?php } ?>

        <div class="heading2 mt-3 text-center bg-secondary bg-opacity-10 py-1">
          <h2>Available shows</h2>
        </div>
        <?php
        $sql2 = "SELECT s.*, si.screen_name FROM shows s 
          JOIN screen_info si ON s.screen_id = si.screen_id 
          WHERE s.movie_id = $movie_id";
        $query2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($query2) > 0) {

        ?>
        <form action="process-booking.php" method="post">
          <table class="table mt-3 text-center table-hover table-bordered">
            <tbody>

              <tr>
                <td>Auditorium</td>
                <td>
                  <div class="btn-group" role="group">
                    <?php while ($show = mysqli_fetch_assoc($query2)) { ?>
                      <input type="radio" class="btn-check" name="audi" id="audi<?php echo $show['screen_id']; ?>" value="<?php echo $show['screen_id']; ?>">
                      <label class="btn btn-outline-secondary rounded-0" for="audi<?php echo $show['screen_id']; ?>"><?php echo $show['screen_name']; ?></label>
                    <?php } ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Date</td>
                <td>
                  <?php $sql_date = "SELECT release_date FROM movie_info WHERE movie_id = $movie_id";
                  $query_date = mysqli_query($conn, $sql_date);
                  $row_date = mysqli_fetch_assoc($query_date);
                  ?>
                  <input type="date" id="show-date" name="show_date" class="" min="<?php echo date('Y-m-d') ?>">
                </td>
              </tr>
              <tr>
                <td>Show-Time</td>
                <td>
                  <?php
                  // Query to fetch show times
                  $sql3 = "SELECT DISTINCT st.st_id, st.show_times
                  FROM show_times st
                  JOIN show_times_mapping stm ON st.st_id = stm.st_id
                  JOIN shows s ON stm.show_id = s.show_id
                  ";
                  $query3 = mysqli_query($conn, $sql3);

                  while ($show_time = mysqli_fetch_assoc($query3)) {
                    $st_id = $show_time['st_id'];
                  ?>
                    <input type="radio" class="btn-check" name="stime" id="stime<?php echo $st_id; ?>" value="<?php echo $st_id; ?>">
                    <label class="btn btn-outline-secondary rounded-0" for="stime<?php echo $st_id; ?>"><?php echo $show_time['show_times']; ?></label>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>No. of Seats</td>
                <td><input type="number" id="number_of_seat" name="number_of_seat" min="1" onchange="show()"></td>
              </tr>
              <tr>
                <td>Amount</td>
                <td>Rs. <input type="text" name="amount" id="total_amount" readonly></td>
              </tr>
              <!-- Add more rows as needed -->

            </tbody>
          </table>
          <button class="btn btn-primary form-control">Book</button>
        </form>
        <?php } else {
          echo "<div class='heading2 mt-3 text-center bg-secondary  py-1'>
          <h2 class='text-light'>No shows available at the moment</h2>
        </div>";
        } ?>
        </div>

        <!-- Second Sub Container (30%) -->
        <?php
        $sql = "SELECT * FROM movie_info";
        $query = mysqli_query($conn, $sql);


        ?>
        <div class="col-md-4 pt-5">
          <h2 class="text-center">Film in Theatres</h2>
          <div class="list-group">
            <?php foreach ($query as $movies) {
            ?>
              <div class="card text-body-secondary rounded-0 border-0">
                <div class="row g-0">
                  <div class="col-md-6 px-5 pt-4">
                    <a href="about.php?movie_id=<?php echo $movies['movie_id'] ?>"><img src="<?php echo "admin/" . $movies['image']; ?>" class="card-img-top rounded-0"></a>
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <h5 class="card-title fw-bold text-danger"><?php echo $movies['movie_name']; ?></h5>
                      <p class="card-text "><strong>Cast:</strong> <?php echo $movies['movie_cast']; ?> </p>
                      <p class="card-text"><strong>Release Date:</strong> <?php echo $movies['release_date']; ?></p>
                      <p class="card-text"><?php echo $movies['movie_desc']; ?></p>

                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
    </div>
    </div>
  </main>
  <?php include('footer.php'); ?>
  <script>
    function show(){
      let noseats = parseInt(document.getElementById("number_of_seat").value);
      total = noseats * 150;
      document.getElementById("total_amount").value = total;
    }
  </script>
</body>

</html>