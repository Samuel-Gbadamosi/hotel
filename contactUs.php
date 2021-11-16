<?php


require_once "../hotel/db/db.php";

$formPopup = "false";

//sending mail though php on localserver

//edo confirmed it will work to send a contact me

if (isset($_POST['email'])) {
	$to = "damosisamuel@gmail.com"; // this is your Email address
	$from = $_POST['email']; // this is the sender's Email address
	$name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $description = $_POST['description'];
	$phone = $_POST["phone"];
	$subject = "form da hotel Bezos";
	$message = $name . " - " . $surname. " ".  $description . " " . $from . " " . $phone .  " " . $email ;
      //headers
	$headers = "From:hotelBezos.it";
	mail($to, $subject, $message, $headers);

	$formPopup = "true";
}




//$conn = new mysqli($servername, $username, $password, $dbname);



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
  <link rel="icon" href="./images/company.jpg" />

  <!-- //cdn fontawesome   -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Room Booking</title>
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

      <h1 class="text-center text-bg-light ">Contact us </h1>
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
          <h3>Contact Us</h3>
        </div>

        <!-- section form        -->
         <form method="post" action="" id="contactform">
        <div class="col-md-4" >
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-md-4" >
                        <label for="" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="col-md-4" >
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                  
                    <div class="col-md-4">
                        <label for="" class="form-label">Description</label>
                        <!-- instead of using this input we can use text area -->
                         <!-- <input type="text" class="form-control" id="description" name="description"> -->
                         <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                        <!-- <textarea name="description" id="description" id="" cols="30" rows="10"></textarea> -->
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                   

               
                    
                  
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form> 

        </div>
      </div>


      

      
    </div>




  </main>
  <!-- main -->
    <footer>
     <?php
     
     include('./footer/footer.php')
     ?>


    </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>