<?php


require_once "../hotel/db/db.php";


//$conn = new mysqli($servername, $username, $password, $dbname);

//$query = "SELECT * FROM Users";

//we use this to get users information
//$result = getUser();

$reservation = getroomsReserved();





foreach($reservation as $res){


//   $res->fgetc
 
//  var_dump($res);
}



// foreach($period as $dt){
//   echo $dt->format("1 Y-m-d H:i:s\n");
// }





  
 

$hotelRooms = getRooms();

$mainHotel = getHotel();

$customers = getUser();



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
  <link rel="stylesheet" href="./css/styles.css">
  <!-- link cdn fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Room Booking</title>
</head>

<body>
  <!-- header -->
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
  <!-- header -->
  <!-- main -->
  <main>
    <div class="container">

      <h1 class="text-center text-bg-light ">Book a Room</h1>
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

        <div class="col-md-12 text-center text-primary mt-5">
          <h3>Rooms Available in Hotel Bezos</h3>
        </div>

       

        <!-- section form        -->
        <form method="post"  action="insert.php" style="position: relative; top:220px; font-size: 20px;">
        <div class="col-md-4 "  >
                        <label for="" class="form-label">ROOM NUMBER</label>
                        <input type="text" class="form-control" id="roomId" name="roomId">
                    </div>
                    <div class="col-md-4" >
                        <label for="" class="form-label">RESERVATION ID</label>
                        <input type="text" class="form-control" id="reservationId" name="reservationId">
                    </div>
                    <div class="col-md-4" >
                        <label for="" class="form-label">USER ID</label>

                        <input type="text" class="form-control" id="users_id" name="users_id">
                    </div>
                  
                    <div class="col-md-4">
                        <label for="" class="form-label">Check-In</label>
                        <input type="datetime-local" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Check-Out</label>
                        <input type="datetime-local" class="form-control" id="end_date" name="end_date">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>


                    <div style="position: relative; bottom:380px; " class="col-md-6 offset-md-6">
                      <img style="border-radius: 20px;" src="https://media.istockphoto.com/photos/illustration-of-business-team-informal-greeting-happy-working-people-picture-id1314814370?b=1&k=20&m=1314814370&s=170667a&w=0&h=8tZlw-SXDFxXKZN7iTYjPTp_bLpEjq0PO3DzMwr5kIo=" alt="">
                    </div>
               
        </form>

        </div>
      </div>

      <div class="container">
      <div id="marco">
          <div id="cielo"></div>
          <div id="luna"></div>
          <div id="gato"></div>
          <div id="muro"></div>
          <div id="edificios"></div>
	    </div>
      </div>






  </main>
  <!-- main -->
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
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>