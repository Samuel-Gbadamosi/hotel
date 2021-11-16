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
  <link rel="icon" href="./images/company.jpg" />

   <!-- link cdn fontawesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Hotel Bezos</title>
</head>

<body>
  <!-- header -->
  <header>
    <?php
    
    include('./header/header.php');
    ?>

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
                  <h5 class="card-title"> Room <?= $row["room_number"] ?> </h5>
                  <p class="card-text">Description : <?= $row["room_description"]?></p>
                  <div class="col">
                    <!-- delete form  -->
                    <form action="delete.php" method="post">
                     <div class="row">
                       <div class="col">
                       <!-- <input type="visible" class="btn btn-warning" name="roomId" value="<?php echo  $row['id'] ?>"> -->

                       <input type="hidden" class="btn btn-warning" name="roomId" value="<?php echo  $row['rooms_id_rooms'] ?>">


                       <input type="hidden" class="btn btn-warning" name="reservation_id_reservation" value="<?php echo  $row['reservation_id_reservation'] ?>">

                       </div>

                     </div>
                   
              
                   <label  class="btn btn-primary" for=""> Name : </label>
                   <label  class="btn btn-primary" for=""> <?=  getUserFromId($row["users_id"])  ?></label>

                   <input type="hidden" class="btn btn-warning" name="users_id" value="<?php  echo 'user id  : ' . $row['users_id']  ?>"> 

                  <div class="row">
                    
                      <div class="col-lg-12 mt-2">
                      <label  class="btn btn-primary" for="">Check In :</label>
                      
                      <input type="text" class="btn btn-warning" name="start_date" value="<?php  echo 'Departure : ' . $row['start_date'] ?>"> 

                      </div>
                      <div class="col-lg-12 mt-2 mb-2">
                      <label  class="btn btn-primary" for="">Check Out :</label>
                   <input type="text" class="btn btn-warning" name="end_date" value="<?php  echo 'Arrival : ' . $row['end_date'] ?>"> 

                      </div>
                  </div>
                 

                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <input class="btn btn-danger" type="submit" name="submit" value="Remove">

                    
                    <!-- takes us to the editRoom page -->
                     <a class="btn btn-primary" href="editRoomBooked.php?id=<?php echo $row['id']; ?>">edit</a>
                    
                    </form>
                  </div>

                </div>
              </div>
              
          <?php
            }
          } else {
            echo "No Rooms booked at the moment";
          }

          ?>
           

            </div>




        </div>
      </div>


     

    </div>




  </main>
  <!-- main -->
   <footer>
    <?php 
    
     include('./footer/footer.php');
    ?>
    
   </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>