<?php
include('../connection.php');
include('header.php');
include('admin-session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Home</title>
</head>
<body>
  <main>
    <div class="container-fluid">
      <h1 class="bg-light bg-gradient text-secondary text-center py-2 mb-0">Movies</h1>
      <div class="row border-top border-2 border-secondary-subtle">
        <div class="col-md-6 p-3 bg-success bg-opacity-10 border-end border-secondary-subtle">
          <h3><u>Running Movies</u></h3>
          <ul class="list-group rounded-0">
            <?php
              $sql = "SELECT * FROM movie_info";
              $query = mysqli_query($conn, $sql);

              foreach($query as $movies){
            ?>
          <li class="list-group-item bg-secondary d-flex justify-content-between align-items-center text-light">
              <div class="d-flex align-items-center">
                  <i class="fas fa-film pe-2"></i><?php echo $movies['movie_name'];?>
              </div>
          <button id="delete_movies" class="btn btn-danger btn-sm" onclick="redirectMovieDelete(<?php echo $movies['movie_id'];?>)"><i class="fas fa-trash"></i></buttton>
          </li>
          <?php }?>
          </ul>
        </div>

        <div class="col-md-6 p-3 bg-danger bg-opacity-10">
          <h3><u>Upcoming Movies</u></h3>
          <ul class="list-group rounded-0">
          <?php
              $up_sql = "SELECT * FROM upcoming_movies";
              $up_query = mysqli_query($conn, $up_sql);

              foreach($up_query as $upcomings){
            ?>
          <li class="list-group-item bg-secondary d-flex justify-content-between align-items-center text-light">
              <div class="d-flex align-items-center">
                  <i class="fas fa-film pe-2"></i><?php echo $upcomings['movie_title'];?>
              </div>
          <button id="delete_upcomings" class="btn btn-danger btn-sm" onclick="redirectDelete(<?php echo $upcomings['um_id'];?>)"><i class="fas fa-trash"></i></button>
          </li>
          <?php }?>
          </ul>
        </div>
      </div>
    </div>
  </main>
  <script>
    function redirectDelete(u) {
    window.location = 'delete-upcomings.php?um_id=' + u;
  }
  function redirectMovieDelete(m){
    window.location = 'delete-movies.php?movie_id=' + m;
  }
  </script>
</body>
</html>