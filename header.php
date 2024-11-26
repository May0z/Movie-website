<?php session_start();?>
<!doctype html>
<html lang="en">
    <head>
        <title>Menu</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg ">
  <div class="container-fluid text-light">
    <a class="navbar-brand ms-5" href="index.php"><!--<img src="image/qfx-logo.png" width="250" height="130">-->
        <h1 class="text-light fw-bold text-center"><span style="color: orange;">Sajilo</span><br> Cinemas</h1>
    </a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav-underline me-5">
        <li class="nav-item me-5">
          <a class="nav-link fs-4 " href="index.php">Home</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link fs-4" href="movies.php">Movies</a>
        </li>

        <li class="nav-item me-5">
          <?php
           if(isset($_SESSION, $_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){?>
          <a class="nav-link fs-4" href="bookings.php"><?php echo $_SESSION['name'];
            ?>
            </a>
            <?php
              }else{ ?>
          <a class="nav-link fs-4" href="login.php">Login</a>
             <?php }
            ?>
        </li>

        <li class="nav-item me-5">
        <?php
           if(isset($_SESSION, $_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){?>
          <a class="nav-link fs-4" href="logout.php">Logout</a>
            <?php
              }else{ ?>
          <a class="nav-link fs-4" href="register.php">Register</a>
             <?php }
            ?>
        </li>
              </ul>
  </div>
</nav>
        </header>
        <main></main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
