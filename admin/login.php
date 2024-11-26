<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-dark bg-opacity-10">
  <main>
    <div class="container w-25 mx-auto mt-5 text-center">
      <h2 class="fw-bold my-">Admin Panel</h2>
      <div class="login-box bg-white p-4">
        <form action="login-process.php" method="post">
           
            <?php 
              if(isset($_SESSION, $_SESSION['error']) && !empty($_SESSION['error'])){ ?>
              <p class="py-4 mb-3 bg-danger text-light rounded-1"><span>Alert!</span><br>
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
              }
            ?>
        </p>
          <p>Please log in to start your session</p>
        <input class="form-control form-control-sm rounded-0 border border-secondary-subtle py-2 mb-3" type="text" placeholder="Username" name="aname">
        <input class="form-control form-control-sm rounded-0 border border-secondary-subtle py-2 mb-3" type="password" placeholder="Password" name="apass">
            <button type="submit" class="btn btn-danger btn-sm px-3 py-2 mb-3">Login</button>
        </form>
      </div>
    </div>
  </main>
</body>
</html>