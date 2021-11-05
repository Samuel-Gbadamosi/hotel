<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myhotel";



// Create connection database
function createConnection()
{
    
    global $servername,$username ,$password,$dbname ;
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}








 //reservations


 

 // foreach($result as $res){
 //   var_dump($res);
 //  }
 function getReservation()
 {

     $conn = createConnection();

     $sql2 = "SELECT * FROM reservation";
     $resReservation =  $conn->query($sql2);

     closeConnection($conn);

     return $resReservation;

 }

 function getUser()
 {
     $conn = createConnection();

     $sql2 = "SELECT * FROM myhotel.users";
     $resUser =  $conn->query($sql2);

     closeConnection($conn);

     return $resUser;

 }


 function getRooms()
 {
     $conn = createConnection();

     $sql2 = "SELECT * FROM myhotel.rooms";
     $resRooms =  $conn->query($sql2);
  

     closeConnection($conn);

     return $resRooms;

 }


 function getHotel()
 {
     $conn = createConnection();

     $sql2 = "SELECT * FROM myhotel.hotel";
     $resHotel =  $conn->query($sql2);
  
     closeConnection($conn);
     return $resHotel;
 }


 function getRoomsBooked(){

    $conn = createConnection();


    $sql2 = "SELECT * FROM myhotel.rooms_reservation";

        
    // $enteredDate = strtotime($stime);
    // $checkInDateBegin = strtotime($sdate);
    // $checkOutDateEnd = strtotime($edate);

    // if($enteredDate >= $checkInDateBegin && $enteredDate <= $checkOutDateEnd){
    //     echo "in between";
    // }else{
    //     echo "no";
    // }

    $resbooked = $conn->query($sql2);

    closeConnection($conn);

    return $resbooked;
 }

//getUserfrom id
function getUserFromId($id)
{
    
    $conn = createConnection();
    
    $sql2 = "SELECT user_name FROM myhotel.users Where id=$id";
    $user = $conn->query($sql2);

    $resultstring = $user->fetch_row()[0];


    closeConnection($conn);

   
    return $resultstring;

}

function getroomPic($id){
    $conn = createConnection();

    $sql2 = "SELECT image FROM myhotel.rooms where id=$id";
    $roompic = $conn->query($sql2);
    $resultstring = $roompic->fetch_row()[0];
    closeConnection($conn);
    return $resultstring;

}



//deletereservation
function deleteReservation($id){

    $conn = createConnection();

    $sql2 = "DELETE  FROM myhotel.rooms_reservation WHERE id = '$id'";
    $deleteRes = $conn->query($sql2);

    if($deleteRes){
        echo "record has been deleted";
    }else{
        die("record is not deleted it is query error." .mysqli_error($id));
    }


    closeConnection($conn);

    return $deleteRes;
}

//inner join joining 3 tables together
 function getinnerJoin(){


    
     $conn = createConnection();

     //when creating an inner join we definitely call the first columns in first table
     //then we inner join the second table we wanna join it with
     //on rooms_reservvation.id = first table id(reservation.id_reservation)
     //two joins including the users table
    $sql2 = "SELECT *
      FROM myhotel.reservation 
      INNER JOIN rooms_reservation 
      ON rooms_reservation.reservation_id_reservation = reservation.id_reservation
      INNER JOIN users 
      on users.id = rooms_reservation.users_id";
     
     $innerjointables = $conn->query($sql2);

    
     closeConnection($conn);

     return $innerjointables;

   

 }

// combination of rooms and reservation
 function getimagesAll(){

    $conn = createConnection();

   $sql2 = "SELECT *
   FROM myhotel.rooms
   INNER JOIN rooms_reservation
   ON rooms_reservation.rooms_id_rooms = rooms.id_rooms";
   
   $joinRoomsImg = $conn->query($sql2);


    closeConnection($conn);

    return $joinRoomsImg;

 }


 function getroomsReserved(){

    $conn = createConnection();

    // $sql2 = "SELECT *
    // FROM myhotel.rooms
    // LEFT JOIN myhotel.rooms_reservation 
    // ON rooms.id_rooms = myhotel.rooms_reservation
    // WHERE start_date > '2021-11-09' and end_date < '2022-11-02' ";

    // $sql2 = "SELECT rooms_reservation.reservation_id_reservation
    // DATEDIFF(start_date , end_date) AS days
    // FROM myhotel.rooms_reservation";

    $sql2 = "SELECT rooms_reservation.reservation_id_reservation , start_date , end_date
    FROM myhotel.rooms_reservation
    WHERE start_date BETWEEN '2021-10-01' AND '2021-12-22'
    AND end_date BETWEEN '2021-11-01' AND '2021-12-30'";



    $entirerooms = $conn->query($sql2);

    closeConnection($conn);


    return $entirerooms;
 }


 




function closeConnection($conn)
{
    $conn->close();
}

 
?>