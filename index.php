<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Ticket Booking</title>
</head>
<body>
<?php
    include('connection.php');
    include('header.php');
?>
    <main>
        <div class="container-fluid ">
            <div class="showing m-4 mb-5" >
                <div class="showing-header text-center my-4"><h2><u>Now Showing</u></h2></div>
                
                <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php 
            $sql = "SELECT * FROM movie_info";
            $query = mysqli_query($conn, $sql);
            
            foreach($query as $movie){ ?>
           
            <div class="col">
                <div class="card text-body-secondary rounded-0 ">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="<?php echo "admin/".$movie['image']; ?>" class="card-img-top rounded-0" style="height: 100%;">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-danger"><?php echo $movie['movie_name']; ?></h5>
                            <p class="card-text "><span class="">Cast:</span> <?php echo $movie['movie_cast']; ?><br>
                            <span class="">Release Date: </span>
                                <?php echo $movie['release_date']; ?>    
                        </p>
                            <p class="card-text text-primary-emphasis"><?php echo $movie['movie_desc'];
                        ?></p>
                            <a href="about.php?movie_id=<?php echo $movie['movie_id'] ?>" class="btn btn-primary">Book</a>
                        </div>
                </div>
            </div>
        </div>
            </div>
            <?php }?>
        </div>
        </div>
        <hr class="border border-dark border-2 mb-4">

        <div class="upcoming m-4" >
                <div class="showing-header text-center my-4"><h2><u>Upcoming Movies Trailers</u></h2></div>
                <div class="row row-cols-1 row-cols-md-5 g-4">
            <?php
                $up_sql = "SELECT * FROM upcoming_movies";
                $up_query = mysqli_query($conn, $up_sql);

                foreach($up_query as $upcomings){
            ?>
            <div class="col">
                <div class="card w-75 text-body-secondary rounded-0">
                    <img src="<?php echo "admin/". $upcomings['image']; ?>">
                    <div class="card-body">
                        <h5 class="card-title text-center fw-bold"><?php echo $upcomings['movie_title']; ?></h5>
                        <a href="<?php echo $upcomings['trailer']; ?>" class="btn btn-danger w-100" target="_blank">Watch Trailer</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>
        </div>
    </main>
<footer>
    <?php 
        include('footer.php');
    ?>
</footer>
</body>
</html>