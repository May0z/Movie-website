<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Screens</title>
</head>

<body>
  <?php
  include('../connection.php');
  include('header.php'); 
  include('process-time.php');
  include('admin-session.php');
  ?>
  <main>
    <div class="container-fluid">
      <h1 class="bg-light bg-gradient text-secondary text-center border-bottom border-secondary-subtle border-2 py-2 ">Auditoriums</h1>
      <div class="row fw-bold">
        <div class="col">
          <!-- <button class="btn btn-warning btn- me-3"><i class="fas fa-pen me-2"></i>add showtimes</button> -->
          <div class="message">
            <?php 
              if(!empty($error)){
                echo "<div class='alert alert-danger mb-2'>All feilds are required to be filled</div>";
              }elseif(!empty($success)){
                echo "<div class='alert alert-success mb-2'>Time added successfully</div>";
              }
            ?>
          </div>
          <div class="dropdown">
            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
            <i class="fas fa-pen me-2"></i>Add Showtimes
            </button>
            <form class="dropdown-menu p-4" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="mb-3">
                <label for="exampleDropdownFormEmail2" class="form-label">Add Showtime</label>
                <input type="time" class="form-control" id="exampleDropdownFormEmail2" name="stime">
              </div>
              <div class="mb-3">
              <button type="submit" class="btn btn-primary">Add</button>
              </div>
              
            </form>
          </div>

          <ul class="list-group rounded-0">
            <?php
            $sql = "SELECT * FROM screen_info";
            $query = mysqli_query($conn, $sql);

            foreach ($query as $screens) {
            ?>

              <li class="list-group-item bg-secondary d-flex justify-content-between align-items-center text-light">
                <div class="d-flex align-items-center">
                  <i class="fas fa-film pe-2"></i><?php echo $screens['screen_name']; ?>
                </div>
                <div class="me-3">
                  <button class="btn btn-danger btn-sm" onclick="redirectScreenDelete(<?php echo $screens['screen_id']; ?>)"><i class="fas fa-trash"></i></button>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </main>
  <script>
    function redirectScreenDelete(a){
      window.location = 'delete-screens.php?screen_id=' + a;
    }
  </script>
</body>

</html>