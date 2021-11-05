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

if($conn == false){
 die("ERROR : could not connect. "
  . mysqli_connect_error());
}


//testing insert details
/*
$roomId = $_REQUEST["rooms_id_rooms"];
$reservationId = $_REQUEST["reservation_id_reservation"];
$user_name = $_REQUEST["user_name"];
$user_surname = $_REQUEST["user_surname"];
$start_date = $_REQUEST["start_date"];
$end_date = $_REQUEST["end_date"];
*/
//to add clients below
$userName = $_REQUEST["user_name"];
$userSurname = $_REQUEST["user_surname"];
$userAddress = $_REQUEST["user_address"];
$userZipcode = $_REQUEST["user_zipcode"];
$userPhone = $_REQUEST["user_phone"];







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

    <title>Document</title>
    <div class="container">
       <?php
                
            $sql = "INSERT INTO myhotel.users ( user_name , user_surname , user_address , user_zipcode , user_phone ) VALUES
            ('$userName' , '$userSurname' , '$userAddress' , '$userZipcode' , '$userPhone' )";

                if(mysqli_query($conn, $sql)){
                
                
            

                    echo nl2br("\n Name : $userName \n Surname: $userSurname \n "
                        . " Address : $userAddress \n   Zipcode : $userZipcode \n  Phone number : $userPhone");

                        '<div class=" container mt-3 card text-center" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2016/04/15/11/48/hotel-1330850__480.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">data stored in a database successfully</p>';


                        
                        
                } else{
                    echo "ERROR: Hush! Sorry $sql. " 
                        . mysqli_error($conn);
                }



                //close connection
                mysqli_close($conn);
                
       
       
       ?>
    </div>



</head>
<body>

</body>
</html>