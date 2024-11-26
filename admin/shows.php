<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shows</title>
</head>

<body>
  <?php 
  include('../connection.php');
  include('header.php'); 
  include('admin-session.php');
  $sql = "SELECT 
            shows.show_id,
            screen_info.screen_name,
            movie_info.movie_name,
            GROUP_CONCAT(show_times.show_times SEPARATOR ', ') as show_times
        FROM 
            shows
        JOIN 
            screen_info ON shows.screen_id = screen_info.screen_id
        JOIN 
            movie_info ON shows.movie_id = movie_info.movie_id
        JOIN 
            show_times_mapping ON shows.show_id = show_times_mapping.show_id
        JOIN 
            show_times ON show_times_mapping.st_id = show_times.st_id
        GROUP BY
            shows.show_id, screen_info.screen_name, movie_info.movie_name";

$query = mysqli_query($conn, $sql);

if (!$query) {
    echo "Error: " . mysqli_error($conn);
    exit;
}

$sno = 1;
  ?>
  
  <main>
    <div class="container-fluid">
      <h1 class="bg-light bg-gradient text-secondary text-center border-bottom border-secondary-subtle border-2 py-2 ">View Shows</h1>
      <div class="row">
        <div class="col">
          <h3><u>Running Movies</u></h3>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Auditorium</th>
                <th scope="col">Show Time</th>
                <th scope="col">Movie</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
              <tr>
              <td><?php echo $sno++; ?></td>
                    <td><?php echo htmlspecialchars($row['screen_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['show_times']); ?></td>
                    <td><?php echo htmlspecialchars($row['movie_name']); ?></td>
                <td>
                  <button class="btn btn-warning btn-sm" onclick="redirectShowDelete(<?php echo $row['show_id']?>)"><i class="fas fa-trash me-2"></i>Stop Show</button>
                </td>
                <?php }?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <script>
    function redirectShowDelete(s){
      window.location = 'delete-shows.php?show_id='+s;
    }
  </script>
</body>

</html>