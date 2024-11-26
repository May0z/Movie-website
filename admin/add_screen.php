<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Screen</title>
</head>
<body>
  <?php include('header.php');
  include('process-screen.php'); 
  include('admin-session.php');?>
  <main>
    <div class="container-fluid">
    <h1 class="bg-light bg-gradient text-secondary text-center border-bottom border-secondary-subtle border-2 py-2 ">Add Auditorium</h1>  
      <!-- <form action="#" method="post">
            <label class="form-label">Screen Name</label>
            <input type="text" class="form-control mb-3">
            <label class="form-label">Total Seats</label>
            <input type="text" class="form-control mb-3">
            <label class="form-label">Showing Time</label>
            <input type="time" class="form-control" name="" id="">
            <label class="form-label">Ticket Price</label>
            <input type="text" class="form-control mb-3">
            <button type="submit" class="form-control btn btn-success btn-sm px-3 py-2 mb-3">Add Screen</button>
          </form> -->
          <div class="row fw-bold">
            <div class="col">
              <div class="message"> 

              <?php
                if(!empty($error)){
                  echo"<div class='alert alert-danger'>$error</div>";
                }                else if(!empty($success)){
                  echo"<div class='alert alert-success'>$success</div>";
                }
              ?>

              </div>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <label class="form-label">Auditorium Name</label>
            <input type="text" class="form-control mb-4" name="sname">
            <label class="form-label">Total Seats</label>
            <input type="text" class="form-control mb-4" name="seats">
            <button type="submit" class="form-control btn btn-success btn-sm px-3 py-2 mb-3">Add Screen</button>
          </form>
            </div>
          </div>
    </div>
  </main>
</body>
</html>