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
  <!-- //cdn fontawesome   -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="icon" style="height: 50px; width:80px" type="image/png" href="img/company.jpg" >
    <title>Add Client</title>
</head>
<body>
<header>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="index.php">Hotel Bezos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
              <li class="nav-item">
                <a class="nav-link text-light" href="bookRoom.php">Book a Room</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="roomBooked.php">Rooms Booked</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="addClient.php">Add Client</a>

              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="contactUs.php">Contact Us</a>

              </li>
             
             
           
            </ul>
          
          </div>
        </div>
      </nav>
    </div>

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

                  <form method="POST" action="index.php" enctype="multipart/form-data">
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
    <div class="container fot pt-5">
      
    <div class="row">
      <div class="col-lg-5">
        <h3>Hotel Bezos</h3>
             <p> Hotel Bezos is one of the most exclusive hotel you could find around you, We offer Relaxation and amazing view from your room </p>
             <p>Visit Us and you will never regret the time you used to book with us.</p>
      </div>
      <div  class="col-lg-3">
        <h3>Navigation</h3>
        <div style="display: grid; ">
            <a class="pippo" href="index.php">Home</a>
            <a class="pippo" href="addClient.php">Join Us</a>
            <a class="pippo" href="bookRoom.php">Book a Room</a>
            <a class="pippo" href="contactUs.php">Contact Us</a>
         </div>
      
      </div>
      <div class="col-lg-4">
          <h3>Contact us</h3>
    
          <p> We can be reachable on this  </p>
          <small>Address : Via lamborghini 25</small>
          <small>Zipcode : 27058 </small>

            <p> Address : via lamborghini 25 
             Zipcode : 27058   </p>

      </div>

    </div>
    <div class="row mt-2">
      <div class="col-lg-5">
        <p> <i class="fab fa-facebook text-primary"> Visit Our Facebook Page</i>   </p>
      

      </div>
      <div class="col-lg-3"> 
        <a href="index.php"><i class="fab fa-instagram text-danger"> Visit Our Instagram Page</i></a>
      </div>
      <div class="col-lg-4">
        <p><i class="fab fa-mailchimp text-danger"> Get to know us better</i></p>
      </div>

    </div>
    


    </div>

  </footer>  
</body>
</html>