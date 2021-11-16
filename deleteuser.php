<!-- <?php 



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


//to add Customer
//take all 5 values from the form data


//to delete reservation only id;
$id = $_REQUEST["id"];
$user_name = $_REQUEST["user_name"];
$user_surname = $_REQUEST["user_surname"];
$user_address = $_REQUEST["user_address"];
$user_zipcode = $_REQUEST["user_zipcode"];
$user_phone = $_REQUEST["user_phone"];





//perfor

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

    <title>Delete User</title>
    <div class="container">
       <?php

        $sql2 = "DELETE  FROM myhotel.users WHERE id = '$id'";
        $deleteUser = $conn->query($sql2);

        if($deleteUser){
          
       
                    

                    echo nl2br("\n User-Id  : $id\n Name :$user_name ID: \n "
                        . " Surname :$user_surname  ");

                        '<div class=" container mt-3 card text-center" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2016/04/15/11/48/hotel-1330850__480.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">User deleted successfully!</p>';


                }else{
                    die("record is not deleted it is query error." .mysqli_error($id));
                }      
         


                //close connection
                mysqli_close($conn);
                
       
       
       ?>
    </div>



</head>
<body>

</body>
</html> -->