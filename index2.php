<?php



include "config.php";



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../hotel/db/db.php";

$reservations = getroomsReserved();

$datein = '2021-11-04';
$dateout = '2021-12-11';



$hotelRooms = getRooms();


//var_dump($hotelRooms);

$mainHotel = getHotel();


$roomsBooked = getRoomsBooked();



  $msg = "";
 
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    
  
    $image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = __DIR__ . "\\images\\".$image;
          
    $db = mysqli_connect("localhost", "root", "root", "restaurant");
  
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
  <link rel="icon" href="./images/company.jpg" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Hotel Bezos</title>
</head>

<body>
  <!-- header include from footer folder-->
  <header>
    <?php
    
    include('./header/header.php');
    ?>

  </header>
  <!-- header include from footer folder-->
  <!-- main -->
  <main>
    <div class="container">

      <h1  class="hto">Welcome to Hotel Bezos</h1>
      <div class="headerrip">
                <?php

          if ($mainHotel->num_rows > 0) {
            // output data of each row
            while ($row = $mainHotel->fetch_assoc()) {

          ?>
          

        <div class="words">

          <h2 class="hover font-size:20px; font-family:"><?= $row["hotel_name"] ?></h2>

        </div>

        <?php
            }
          } else {
            echo "0 results";
          }

          ?>

      </div>
          <h2 class="text-center mt-2">Rooms Available</h2>
      <div class=" mt-5">

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"> </li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"> </li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>


          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class=" d-block w-100 h-100" src="https://cdn.pixabay.com/photo/2020/10/18/09/16/bedroom-5664221__480.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 h-100" src="https://cdn.pixabay.com/photo/2016/06/10/01/05/hotel-room-1447201__340.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2016/04/15/11/46/hotel-1330846__340.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2019/08/19/13/58/bed-4416515__340.jpg" alt="fourth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2020/01/15/18/01/room-4768551__340.jpg" alt="fifth slide">
            </div>
         
          </div>
          <a style="position: relative; left:50px;" class=" carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only ">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>


      <div class="container">

        <div class="col-md-12 text-center text-primary mt-3">
          <h3>Our Rooms</h3>
        </div>
        <div class="row ml-8" style="position: relative; left:200px;">

          <?php

          if ($hotelRooms->num_rows > 0) {
            // output data of each row
            while ($row = $hotelRooms->fetch_assoc()) {

          ?>
          
            <div class="row ml-auto">

              <div class="col-md-9 text-center">
                <!-- we must definitely create the path like this for adding a picture to db  -->
                <img  src="<?php echo "./images/" . $row['image']; ?>" class="card-img-top" alt="hotel_torino">
                <div class="card-body bg-warning ">
                  <h5 class="card-title">Rooms Available in Hotel Bezos</h5>
                  <!-- <h5 class="card-title"> Room <?= $row["id_rooms"] ?> </h5> -->
                  <p class="card-text"><?= $row["room_description"] ?></p>

                  
                  <i class="fas fa-person-booth"> Room Number : <?= $row["room_number"] ?></i>
                  <a href="bookRoom.php" class="btn btn-danger "> Book your Room</a>

                </div>
              </div>
            </div>


          <?php
            }
          } else {
            echo "0 results";
          }

          ?>


        </div>
      </div>
      
      
  </main>
  <!-- main -->
  <foooter>
      <?php

      include('./footer/footer.php');



      ?>
   
  </foooter>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>