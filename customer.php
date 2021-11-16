<?php


require_once "../hotel/db/db.php";


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

      <h1 class="text-center text-bg-light ">Customers </h1>
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
    
          <table class="table mt-5">

          <h3 class="text-center pt-3">Customer Details</h3>
          
        <thead>

          <tr>
          <th scope="col ">id</th>
            <th scope="col"> Customer Name</th>
            <th scope="col"> Surname</th>
            <th scope="col">Address</th>
            <th scope="col">Zipcode</th>
            <th scope="col">Phone number</th>


          </tr>
        </thead>
        <?php

      if ($customers->num_rows > 1) {
        // output data of each row
        while ($row = $customers->fetch_assoc()) {

      ?> 
      
        <tbody>
          <tr>
            <td class="text-danger"><?= $row["id"] ?></td>
            <td><?=  $row["user_name"] ?></td >
            <td><?= $row["user_surname"] ?></td>
            <td><?= $row["user_address"] ?></td>
            <td><?= $row["user_zipcode"]?></td>
            <td><?= $row["user_phone"] ?></td>


          </tr>
          <?php
                  }
                } else {
                  echo "0 results";
                }

                ?>
          
        </tbody>

      </table>
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