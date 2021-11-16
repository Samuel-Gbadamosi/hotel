<?php


require_once "../hotel/db/db.php";

date_default_timezone_set('Europe/Rome');



$reservation = getroomsReserved();


if ($reservation->num_rows > 0) {
  // output data of each row
  while ($row = $reservation->fetch_assoc()) {
      $id = $row["id"];
    $roomId = $row["rooms_id_rooms"];
    $reservationId = $row["reservation_id_reservation"];
    $users_id = $row["users_id"];
    $start_date = $row["start_date"];
    $end_date = $row["end_date"];
  

    
?>
 <?php
  }
} else {
  echo "0 results";
}






//rooms from hotel
$hotelRooms = getRooms();

//main hotel
$mainHotel = getHotel();

//get customers
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


  <!-- link cdn fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Room Booking</title>
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

       

        <form method="post"  action="insertmodifybooked.php" style="position: relative; top:220px; font-size: 20px;">
        <div class="col-md-4 "  >
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id ?>">
                    </div>
        <div class="col-md-4 "  >
                        <label for="" class="form-label">ROOM ID</label>
                        <input type="text" class="form-control" id="roomId" name="roomId" value="<?php echo $roomId ?>">
                    </div>
                    <div class="col-md-4" >
                        <label for="" class="form-label">RESERVATION ID</label>
                        <input type="text" class="form-control" id="reservationId" name="reservationId" value="<?php echo $reservationId ?>">
                    </div>
                    <div class="col-md-4" >
                        <label for="" class="form-label">USER ID</label>

                        <input type="text" class="form-control" id="users_id" name="users_id" value="<?php echo $users_id?>">
                    </div>
                  
                    <div class="col-md-4">
                        <label for="" class="form-label">Check-In</label>
                        <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Check-Out</label>
                        <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date ?>">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>


                    <div style="position: relative; bottom:380px; " class="col-md-6 offset-md-6">
                      <img style="border-radius: 20px;" src="https://media.istockphoto.com/photos/illustration-of-business-team-informal-greeting-happy-working-people-picture-id1314814370?b=1&k=20&m=1314814370&s=170667a&w=0&h=8tZlw-SXDFxXKZN7iTYjPTp_bLpEjq0PO3DzMwr5kIo=" alt="">
                    </div>
               
        </form>

        </div>
      </div>

  






  </main>
  <!-- main -->
  <footer>

   <?php
   
   include('./footer/footer.php');
   
   ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>