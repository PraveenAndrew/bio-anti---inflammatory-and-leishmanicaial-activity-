<?php 
   include_once "./navbar.php";
   
      $s = "localhost";
      $u = "root";
      $p = "root";
      $db = "collegeproject";
   
      $con = new mysqli($s,$u,$p,$db);
      if($con->connect_error)
      {
             die("failed".$con->connect_error);
      }
         $query = "select * from user_count";
         $query_run = mysqli_query($con,$query);
         while($row = mysqli_fetch_array($query_run))
         {      
                $current_count = $row['counts'];
                $new_count = $current_count + 1;
                $update_query = mysqli_query($con,"update user_count set counts = $new_count");
      ?>
<!DOCTYPE html>
<html lang="en">
       <head>
              <link rel="stylesheet" href="./css/style.css">
       </head>
<body class="bg-image">
   <div class="data_with_viewcount">
              <section class="database">
                     <h3>a database of anti-leishmaniasis activity</h3>
                     <form action="result.php" method="post">
                            <div>
                                   <label for="">search:</label>
                                   <input type="search" name="searchdata" id="" placeholder="search here: example(maytenus)">
                            </div>
                            <button type="submit" class="btn" name="submit">submit</button>
                     </form>
              </section>
              <section class="view_count-insert_data">
                     <div class="view-count">
                            <p>Viewcount <span class="from_database"><?php echo $new_count ?></span></p>
                            <?php 
                             }
         ?>
                     </div>
                     <div class="insert-data">
                            <a href="http://localhost/msc-projects/index.php" class="btn-insert home-page">Go to Home Page</a>
                     </div>
                     <div class="insert-data">
                            <a href="http://localhost/msc-projects/bio2b/insertData.php" class="btn-insert">Insert Data</a>
                     </div>
              </section>
   </div>

</body>

<?php  include_once "./footer.php"; ?>
</html>