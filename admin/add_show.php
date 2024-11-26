<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Show</title>
</head>

<body>
  <?php
  include('../connection.php');
  include('header.php');
  include('process-show.php');
  include('admin-session.php');
    ?>
  <main>
    <div class="container-fluid">
      <h1 class="bg-light bg-gradient text-secondary text-center border-bottom border-secondary-subtle border-2 py-2 ">Add Show</h1>
      <div class="row fw-bold">
        <div class="col">
          <div class="message">
          <?php 
            if(!empty($error)){
              echo "<div class='alert alert-danger me-2'>$error</div>";
            }else if(!empty($success)){
              echo "<div class='alert alert-success me-2'>$success</div>";
            }
          ?>
          </div>
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label class="form-label">Select Movie</label>
            <select class="form-select mb-3" name=" movie">
              <?php
              ?>
              <option selected value="" disabled>Select Movie</option>

              <?php
                        $sql = "SELECT * FROM movie_info";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['movie_id']}'>{$row['movie_name']}</option>";
                        }
                        ?>
              

            </select>
            <label class="form-label">Select Auditorium</label>
            <select class="form-select mb-3" name="audi">
              <option selected value="" disabled>Select Auditorium</option>

              <?php 
                $sc_sql = " SELECT * FROM screen_info ";
                $sc_result = mysqli_query($conn, $sc_sql);

                foreach($sc_result as $screens){
                  ?>
                    <option value="<?php echo $screens['screen_id'];?>"><?php echo $screens['screen_name'];?></option>
                  <?php
                }
              ?>

            </select>
            <label class="form-label">Select Time</label>
            <select class="form-select mb-3" name="stime[]" id="stime" size="3" multiple>
              
                <?php
                  $st_sql = "SELECT * FROM show_times";
                  $st_result = mysqli_query($conn, $st_sql);

                  foreach($st_result as $shows){
                    echo"<option value='{$shows['st_id']}'>{$shows['show_times']}</option>";
                  }
                ?>

            </select>
            <button type="submit" class="form-control btn btn-success btn-sm px-3 py-2 mb-3">Add Show</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>

</html>