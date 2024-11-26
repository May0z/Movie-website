<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Now Showing</title>
</head>

<body>
    <?php
    include('connection.php');
    include('header.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="showing m-4 mb-5">
                <div class="showing-header text-center my-4">
                    <h2>(NOW SHOWING)</h2>
                </div>
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    
                    <?php 
                            $sql = "SELECT * FROM movie_info";
                            $query = mysqli_query($conn, $sql);

                            foreach($query as $movies){
                        ?>
                    <div class="col">
                        
                        <div class="card text-body-secondary rounded-0 border-0">
                            <img src="<?php echo "admin/".$movies['image'];?>">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $movies['movie_name'];?></h5>
                                <p class="card-text text-primary"><span class="fw-bold">Cast: </span><?php echo $movies['movie_cast'];?> </p>
                                <div class="d-grid gap-2">
                                    <a href="about.php?movie_id=<?php echo $movies['movie_id'] ?>" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>