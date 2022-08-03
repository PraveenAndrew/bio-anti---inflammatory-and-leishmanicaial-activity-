<?php include_once "./navbar.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- css style -->
       <link rel="stylesheet" href="./css/style.css">
</head>
 <body class="bg-image">
       
           <div class="data_with_viewcount"> 
               <section class="database">
                     <h3>a database of anti-inflammatory activity results</h3>

                    <!-- php code -->

                    <?php  
                       $s="localhost";
                       $u="root";
                       $p="root";
                       $db="collegeproject";

                       $con = new mysqli($s,$u,$p,$db);
                       if($con->connect_error)
                       {
                              die("failed".$con->connect_error);
                       }
                       if(isset($_POST['submit'])) 
                       {
                              $search = $_POST['searchdata'];

                              $query = "select * from plants where botanicalname = '$search'";

                              $queryRun = mysqli_query($con,$query);

                              if($queryRun->num_rows>0)
                              {
                                   while($row = mysqli_fetch_array($queryRun))
                                     {
                                   ?> 
                                       
                                   <table>
                                          <caption class="caption">Details</caption>
                                          <tr><th>Botanical Name</th>
                                          <td><span class="tabletext"><?php echo $row["botanicalname"] ?></span></td>
                                          </tr>
                                          <tr><th>Image of the Plant:</th>
                                          <td><span class="tabletext"><?php echo '<img src="data:image;base64,'.base64_encode($row["imageoftheplant"]).'" alt="serverPrblm" align="center" class="plant-img" >'; ?><br><small class="verified">✅<i>verified</i></small></span></span></td>
                                          </tr>
                                          <tr><th>Family Name:</th>
                                          <td><span class="tabletext"><?php echo $row["familyname"] ?></span></td>
                                          </tr>
                                          <tr><th>part of the plant Reported:</th>
                                          <td><span class="tabletext"><?php echo $row["partoftheplantreported"] ?></span></td>
                                          </tr>
                                          <tr><th>Active constituents with   anti-inflammatory property:</th>
                                           <td><span class="tabletext"><?php echo $row["activeconstituents"] ?></span></td>
                                           </tr>
                                          <tr><th>Experimental Details:</th>
                                            <td><span class="tabletext"><?php echo $row["experimentaldetails"] ?></span></td>
                                          </tr>
                                          <tr><th>Literature reference:</th>
                                          <td><span class="tabletext"><?php echo $row["literaturereference"] ?></span></td>
                                         </tr>
                                   </table>
                                   <?php 
                                     }
                            }
                              else 
                              {
                              ?>
                                   <div class="center">
                                     <p class="error">Your Search Query doesn't match data</p>
                                   </div>
                              
                              <?php 
                              }
                          }
                          $con->close();
                      ?>
              </section>
           </div>

           <div class="backtosearch">
               <a href="http://localhost/msc-projects/bio2a/index.php">back2search</a>
         </div>
</body>
</html>
<?php include_once "./footer.php";  ?>