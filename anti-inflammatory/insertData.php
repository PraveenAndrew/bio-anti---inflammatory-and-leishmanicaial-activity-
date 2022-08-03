<?php include_once "./navbar.php"; ?>
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
      if(isset($_POST['upload']))
      {
             $bioName = $_POST['botanic_name'];
             $familyName = $_POST['family_name'];
             $plantReport = $_POST['reports'];
             $active = $_POST['active'];
             $experiment = $_POST['experiment'];
             $liternature = $_POST['literature'];
       //       images verfication
             $image_name = $_FILES['uploadImage']['name'];
             $extension = pathinfo($image_name,PATHINFO_EXTENSION);

             $image = addslashes(file_get_contents($_FILES['uploadImage']['tmp_name']));

             $query = mysqli_query($con,"insert into plants(botanicalname,imageoftheplant,familyname,partoftheplantreported,activeconstituents,experimentaldetails,literaturereference) values('$bioName','$image','$familyName','$plantReport','$active','$experiment','$liternature')");

             if($query)
             {
              echo $r =  "<script type=\"text/javascript\">
              Swal.fire({
              title: 'Process Success',
              text: 'Successfully Insert The Data',
              icon: 'success',
              timer: 2000,
              confirmButtonText: 'Thank You' });
              setTimeout(function(){
                   window.location.href = 'insertData.php';
                         },2000);

              
              </script>";
          }
             else
             {
              echo $r =  "<script type=\"text/javascript\">
              Swal.fire({
              title: 'ERROR',
              text: 'Something Went Wrong , please try again.',
              icon: 'error',
              timer: 2000,
              confirmButtonText: 'ok' });
              setTimeout(function(){
                     window.location.href = 'insertData.php';
                           },2000);
              </script>";
             }
        }
       
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- css custom style -->
      <link rel="stylesheet" href="./css/style.css">
     
</head>
<body class="bg-image">
   
    <div class="forms">
    
        <section class="wrapper">
               <div class="title">
                      Upload Botanical Details
               </div>
               <form action="insertData.php" method="post" enctype="multipart/form-data">
                      <div class="input_field">
                             <label for="">Enter Botanical Name</label>
                             <input type="text" name="botanic_name" id="" class="input" placeholder="Enter botanical name" required> 
                      </div>
                      <div class="input_field">
                             <label for="">Enter Families Name</label>
                             <input type="text" name="family_name" id="" class="input" placeholder="Enter families name" required> 
                      </div>
                      <div class="input_field">
                             <label for="">Enter Plant Reports</label>
                             <textarea name="reports" class="textarea" placeholder="Enter plant reports" required></textarea>
                      </div>
                      <div class="input_field">
                             <label for="">Enter Active Constitutents</label>
                             <input type="text" name="active" id="" class="input" placeholder="Enter active constitutents" required> 
                      </div>
                      <div class="input_field">
                             <label for="">Enter Experiment Details</label>
                             <textarea name="experiment" class="textarea" placeholder="Enter Experiment details" required></textarea>
                      </div>
                      <div class="input_field">
                             <label for="">Enter Literature Reference</label>
                             <input type="text" name="literature" class="input" placeholder="Enter literature reference" required> 
                      </div>
                      <div class="input_field">
                             <label for="">Uplaod File Image</label>
                             <input type="file" class="input" name="uploadImage" required> 
                      </div>
                      <div class="input_field">
                             <input type="submit" value="Upload" class="upload_btn" name="upload"> 
                      </div>
               </form>
        </section>
    
    </div>

    <div class="backtosearch">
           <a href="http://localhost/msc-projects/bio2a/index.php">back2home</a>
    </div>

       
</body>
</html>

<?php include_once "./footer.php";  ?>

