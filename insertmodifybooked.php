<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../hotel/db/db.php";


date_default_timezone_set('Europe/Rome');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myhotel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn == false) {
    die("ERROR : could not connect. "
        . mysqli_connect_error());
}







if (isset($_POST["users_id"])) {

    $id = $_POST["id"];
    $roomId = $_POST["roomId"];
    $reservationId = $_POST["reservationId"];
    $users_id = $_POST["users_id"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];

 


    
        $sql = "UPDATE myhotel.rooms_reservation SET rooms_id_rooms = '$roomId',
         reservation_id_reservation = '$reservationId',
        
          users_id = '$users_id' ,
           start_date = '$start_date'  , 
           end_date = '$end_date' 
           where id =  '$id' ";
            

            

        if (mysqli_query($conn, $sql)) {


            $toReturn =
        
            '<div class=" container mt-3 card text-center" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2016/04/15/11/48/hotel-1330850__480.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"> Id : '.$id.' </h5>
                <h5 class="card-title"> Reservation Id :'. $reservationId .' </h5>
                <h5 class="card-title"> Users Id : '.$users_id.'</h5>
                <h5 class="card-title"> Check-In: '.$start_date.'</h5>
                <h5 class="card-title"> Check-Out : '.$end_date.'</h5>
                <h5 class="card-title"> Room Id : '.$roomId.'</h5>






                    <p class="card-text">Reservation has been modified successfully</p>';
                    if($toReturn == true){
                    header("location: roomBooked.php");

                    }


        } else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }



        //close connection
        mysqli_close($conn);
    }





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
    <link rel="stylesheet" href="../hotel/css/styles.css">

    <title>Document</title>
    <div class="container">
        <?php 
        
        echo $toReturn;
        
        ?>


       
    </div>



</head>

<body>

</body>

</html>