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


//to add Customer
//take all 5 values from the form data

//create a variable in string 
$toReturn = "Not Added";



//create an iffest to be sure and pass the details in form 
//to set the time interval so dates wont be repeated in the database

if (isset($_REQUEST["roomId"])) {

    $roomId = $_REQUEST["roomId"];
    $reservationId = $_REQUEST["reservationId"];
    $users_id = $_REQUEST["users_id"];
    $start_date = $_REQUEST["start_date"];
    $end_date = $_REQUEST["end_date"];

    //we create a checkin and checout date
    $checkIn =  strtotime("2021-11-04");
    $checkOut =  strtotime("2021-12-11");

    //testing
 
    // $checkIn = strtotime("YYYY-mm-dd HH:ii:ss" , $start_date);
    // $checkOut = strtotime( "Y-m-d H:i:s" , $end_date);

    //we save our start_date in a strotime($start_date)
    //but we must use this format so the date can be converted to a string especially with the format
    $start_date = date('Y-m-d H:i:s' ,strtotime($start_date));
    $end_date = date('Y-m-d H:i:s' , strtotime( $end_date));

    //we set it to true
    $youCan = true;

    //if dates are related to current booking we change it to false so a new client cant book
    if ($start_date >= $checkIn && $start_date <= $checkOut || $end_date <= $checkOut && $end_date >= $checkIn) {
        $youCan = false;
    }

    //if you can then we can proceed and let the client book a reservation 
    if ($youCan) {
        $sql = "INSERT INTO myhotel.rooms_reservation ( rooms_id_rooms , reservation_id_reservation , users_id , start_date  , end_date  ) VALUES
            ('$roomId' , '$reservationId' , '$users_id' , '$start_date' , '$end_date' )";


        if (mysqli_query($conn, $sql)) {

            $toReturn =  
            '<div class=" container mt-3 card text-center" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2016/04/15/11/48/hotel-1330850__480.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"> Users Id : '.$users_id.'</h5>
                <h5 class="card-title"> Check-In: '.$start_date.'</h5>
                <h5 class="card-title"> Check-Out : '.$end_date.'</h5>
                <h5 class="card-title"> Room Id : '.$roomId.'</h5>





                    <p class="card-text">Reservation has been Booked successfully</p>';

                                         header("location: roomBooked.php");


        } else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }



        //close connection
        mysqli_close($conn);
    }
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