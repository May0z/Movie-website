<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Control Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
</head>

<body>
        <div class="d-flex float-start" id="wrapper">
                <!-- Sidebar -->
                <div class="bg-white" id="sidebar-wrapper">
                        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>AdminHub</div>
                        <div class="list-group list-group-flush my-3">
                                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-house me-2"></i>Home</a>
                                <a href="add_movie.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-clapperboard me-2"></i>Add Movie</a>
                                <a href="add_screen.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-desktop me-2"></i>Add Auditorium</a>
                                <a href="add_show.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-ticket me-2"></i>Add Show</a>
                                <a href="shows.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-film me-2"></i>Shows</a>
                                <a href="screens.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-eye me-2"></i>Screens</a>


                                <button class="list-group-item list-group-item-action bg-transparent primary-text fw-bold dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-circle me-2"></i>Admin Online
                                </button>
                                <ul class="dropdown-menu">
                                        <li><a href="logout.php" class="dropdown-item text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
                                        </li>
                                </ul>



                        </div>
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
</body>

</html>