<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>
</head>
<body>
  <?php include('header.php'); 
    include('process-add.php');
    include('process-upcoming.php');
    include('admin-session.php');
  ?>
  <main>
  <div class="container-fluid">
      <h1 class="bg-light bg-gradient text-secondary text-center py-2 mb-0">Add Movies</h1>
      <div class="row border-top border-2 border-secondary-subtle">
        <div class="col-md-6 p-3 bg-success bg-opacity-10 border-end border-secondary-subtle fw-bold">
          <h3 class="text-center"><u>Add New Movie</u></h3>

          
            <div class="message">
              <?php 
              if($submitted){ 
              echo "<div class='alert alert-success'>$success</div>";
               }else if(!empty($error)){
                echo "<div class='alert alert-danger'>$error</div>";
               }
            ?></div>

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label class="form-label">Movie Name</label>
            <input type="text" class="form-control mb-3" name="name">
            <label class="form-label">Movie Cast</label>
            <input type="text" class="form-control mb-3" name="cast">
            <label class="form-label">Description</label>
            <textarea class="form-control mb-3" name="desc"></textarea>
            <label class="form-label">Release Date</label>
            <input type="date" class="form-control mb-3" name="date">
            <label class="form-label">Add Image</label>
            <input type="file" class="form-control mb-3" name="image" accept="image/*">
            <label class="form-label">Trailer link</label>
            <input type="text" class="form-control mb-3" name="trailer">
            <button type="submit" class="form-control btn btn-success btn-sm px-3 py-2 mb-3">Add</button>
          </form>
        </div>
        <div class="col-md-6 p-3 bg-danger bg-opacity-10 fw-bold">
          <h3 class="text-center"><u>Add Upcoming Movie</u></h3>

          <div class="message">
              <?php 
              if($submit){ 
              echo "<div class='alert alert-success'>$suc</div>";
               }else if(!empty($err)){
                echo "<div class='alert alert-danger'>$err</div>";
               }
            ?></div>

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label class="form-label">Movie Name</label>
            <input type="text" class="form-control mb-3" name="name">
            <label class="form-label">Add Image</label>
            <input type="file" class="form-control mb-3" name="up_image" accept="images/*">
            <label class="form-label">Trailer link</label>
            <input type="text" class="form-control mb-3" name="trailer">
            <button type="submit" class="form-control btn btn-success btn-sm px-3 py-2 mb-3">Add</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>
</html>