<?php

require_once "../hotel/db/db.php";


$mainHotel = getHotel();

$jointTable = getinnerJoin();

while ($row = $jointTable->fetch_assoc()) {
   // echo json_encode($row) . "<br>";
}
// foreach($jointTable as $jo){
//     echo $jo;
//     $jo = new DateTime();
    
// echo $jo->format('Y-m-d H:i:s') ;
// echo $jo->getdate;
// }







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- bootstrap link -->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" href="./images/company.jpg" />

  <!-- //cdn fontawesome   -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="icon" style="height: 50px; width:80px" type="image/png" href="img/company.jpg" >
    <title>Add Client</title>
</head>
<body>
<header>
    <?php
    
    include('./header/header.php');
    ?>

  </header>
    <main>
    <div class="container">



<div class="container">

<main>
    <div class="container">

      <h1 class="text-center text-bg-light ">Be Among Us</h1>
      <div class="headerrip">
                <?php

          if ($mainHotel->num_rows > 0) {
            // output data of each row
            while ($row = $mainHotel->fetch_assoc()) {

          ?>

        <div class="words">

          <h2><?= $row["hotel_name"] ?></h2>

        </div>

        <?php
            }
          } else {
            echo "0 results";
          }

          ?>

      </div>


      <div class="container">

        <div class="col-md-12 text-center text-primary mt-3">
          <h3>Register Below</h3>
        </div>

        <!-- section form        -->
        <form method="post" action="insertClient.php">
                    <div class="col-md-4" >
                      <!-- //room number would be getting through the id -->
                        <label for="" class="form-label">Name :</label>
                        <input type="text" required class="form-control" id="user_name" name="user_name">
                    </div>
                    <div class="col-md-4" >
                      <!-- //reservation id would be getting through the id  -->
                        <label for="" class="form-label">Surname :</label>
                        <input type="text" required class="form-control" id="user_surname" name="user_surname">
                    </div> 
                    <div class="col-md-4">
                      
                        <label for="" class="form-label"> Address :</label>
                        <input type="text" class="form-control" id="user_address" name="user_address">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Zipcode :</label>
                        <input type="text" required class="form-control" id="user_zipcode" name="user_zipcode">
                    
                      </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Phone number :</label>
                        <input type="text" required class="form-control" id="user_phone" name="user_phone">
                    </div>
                   

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
        <div>
                                <!-- we can display it when we want -->
              <div id="content" class="mt-3">
                <button class="btn btn-warning">Kindly use this to upload picture to the database if necessary</button>

                  <form method="POST" action="index2.php" enctype="multipart/form-data">
                    <input type="file" name="uploadfile" value=""/>
                      
                    <div>
                        <button class="btn btn-danger" type="submit" name="upload">UPLOAD</button>
                      </div>
                  </form>

                  </div>
        </div>

        </div>
      </div>
  </main>
</div>



</div>

    </main>
    <footer>
   <?php
   
   include('./footer/footer.php');
   
   ?>

    </footer>
</body>
</html>