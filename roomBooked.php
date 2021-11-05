<?php


require_once "../hotel/db/db.php";


//$conn = new mysqli($servername, $username, $password, $dbname);

//$query = "SELECT * FROM Users";

//we use this to get users information
//$result = getUser();
$usersHotel = getUser();
//hotelRooms
$hotelRooms = getRooms();

//main Hotel Details
$mainHotel = getHotel();

//$customers = getUser();

//rooms Booked
$roomsBooked = getimagesAll();

// $jointTable = getimagesAll()->fetch_all();
// var_dump($jointTable);





  $msg = "";
 
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    
  
    $image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = __DIR__ . "\\images\\".$image;
          
    $db = mysqli_connect("localhost", "root", "", "myhotel");
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO myhotel.rooms (image) VALUES ('$image')";
  
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
   // $result = mysqli_query($db, "SELECT * FROM myhotel.rooms where id = $id");

//   $result = mysqli_query($db, "SELECT image FROM myhotel.rooms");
//   while($data = mysqli_fetch_array($result))
// {
//   $image = $data['Filename'];
//       ?>
<!-- // <img src="<?php echo $data['Filename']; ?>"> -->
  
<?php

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
   <!-- link cdn fontawesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Hotel Bezos</title>
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

      <h1 class="text-center text-bg-light ">Rooms Booked in our hotel</h1>
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

        <div class="col text-center text-primary mt-3">
          <h3>Rooms Booked in Hotel Bezos</h3>
        </div>
        <div class="row  ">

          <?php

          if ($roomsBooked->num_rows > 0) {
            // output data of each row
            while ($row = $roomsBooked->fetch_assoc()) {
                

          ?>

              <div class=" text-center">
              <img  src="<?php echo "./images/" . $row['image']; ?>" class="card-img-top" alt="hotel_torino">
                <div class="card-body bg-info ">
                  <h5 class="card-title"> <?= $row["rooms_id_rooms"] ?> Rooms Booked </h5>
                  <p class="card-text"></p>
                  <div class="col">
                    <form action="delete.php" method="post">
                   
                  <a href="" class="btn btn-danger"> Name : <?=  getUserFromId($row["users_id"])  ?> </a>
                  <div class="row">
                      <div class="col-lg-12 mt-2">
                      <label  class="btn btn-primary" for="">Check In :</label>
                      
                  <input type="text" class="btn btn-warning"  name="start_date" value="<?php  echo 'Arrival : ' .$row['start_date']  ?>"> 

                      </div>
                      <div class="col-lg-12 mt-2 mb-2">
                      <label  class="btn btn-primary" for="">Check Out :</label>
                   <input type="text" class="btn btn-warning" name="end_date" value="<?php  echo 'Departure : ' . $row['end_date'] ?>"> 

                      </div>
                  </div>
                  <!-- <input type="date_format" class="btn btn-primary"  name="start_date" value="<?php  echo 'Check-In :' .$row['start_date']  ?>"> -->
                  <!-- <input type="text" class="btn btn-primary" name="end_date" value="<?php  echo   $row['end_date'] ?>"> -->

                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <input class="btn btn-danger" type="submit" name="submit" value="Remove">
                  
                    </form>
                  </div>

                </div>
              </div>
              
          <?php
            }
          } else {
            echo "No Rooms Booked at the moment";
          }

          ?>
           

            </div>




        </div>
      </div>


     

      <div class="container">
        <div>
       
        </div>
        
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>