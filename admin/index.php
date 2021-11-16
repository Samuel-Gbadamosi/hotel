<?php

// Create connection database

require_once('../db/db.php');

//list of all customers
$customers = getUser();

//roomsBooked
$roomsbooked = getRoomsBooked();

//all ro
$hotelRooms = getRooms();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="icon" href="/images/company.jpg" />
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap link -->

    <title>Admin Page</title>
</head>

<body>
    <header>
    <?php 
        
        // include('/xampp/htdocs/hotel/header/header.php');

        
        ?>

    </header>
 

    <main>
    <h2 style="text-align: center;">This is the Admin Page</h2>

        <div class="container">

            <table class="table mt-5">

                <h3 class="text-center pt-3">Customer Details</h3>

                <thead>

                    <tr>
                        <th scope="col"> id</th>
                        <th scope="col"> Customer Name</th>
                        <th scope="col"> Surname</th>
                        <th scope="col">Address</th>
                        <th scope="col">Zipcode</th>
                        <th scope="col">Phone number</th>


                    </tr>
                </thead>
                <?php

                if ($customers->num_rows > 0) {
                    // output data of each row
                    while ($row = $customers->fetch_assoc()) {

                ?>

                        <tbody>
                            <tr>
                                <td class="text-danger"><?= $row["id"] ?></td>
                                <td><?php echo $row["user_name"] ?></td>
                                <td><?php echo $row["user_surname"] ?></td>
                                <td><?php echo $row["user_address"] ?></td>
                                <td><?php echo $row["user_zipcode"] ?></td>
                                <td><?php echo $row["user_phone"] ?></td>

                            </tr>
                    <?php
                    }
                } else {
                    echo "0 results";
                }

                    ?>

                        </tbody>

            </table>

            <div class="container">
            <table class="table mt-5">

            <h3 class="text-center pt-3">Room Booked</h3>

            <thead>

                <tr>
                    <th scope="col"> id</th>
                    <th scope="col"> Room Id</th>
                    <th scope="col"> Reservation ID</th>
                    <th scope="col">Users</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check out</th>


                </tr>
            </thead>
            <?php

            if ($roomsbooked->num_rows > 0) {
                // output data of each row
                while ($row = $roomsbooked->fetch_assoc()) {

            ?>

                    <tbody>
                        <tr>
                            <td class="text-danger"><?= $row["id"] ?></td>
                            <td><?php echo $row["rooms_id_rooms"] ?></td>
                            <td><?php echo $row["reservation_id_reservation"] ?></td>
                            <td><?php echo $row["users_id"] ?></td>
                            <td><?php echo $row["start_date"] ?></td>
                            <td><?php echo $row["end_date"] ?></td>
  

                        </tr>
                <?php
                }
            } else {
                echo "0 results";
            }

                ?>

                    </tbody>

            </table>
            </div>


            <div class="container">
            <table class="table mt-5">

            <h3 class="text-center pt-3">Rooms Available</h3>

            <thead>

                <tr>
                    <th scope="col"> id</th>
                    <th scope="col"> Room Number</th>
                    <th scope="col">Room Description</th>
                  
                </tr>
            </thead>
            <?php

            if ($hotelRooms->num_rows > 0) {
                // output data of each row
                while ($row = $hotelRooms->fetch_assoc()) {

            ?>

                    <tbody>
                        <tr>
                            <td class="text-danger"><?= $row["id_rooms"] ?></td>
                            <td><?php echo $row["room_number"] ?></td>
                            <td><?php echo $row["room_description"] ?></td>
                    
                        </tr>
                <?php
                }
            } else {
                echo "0 results";
            }

                ?>

                    </tbody>

            </table>
            </div>


        </div>




    </main>

    <footer>
        <?php 
        
        include('/xampp/htdocs/hotel/footer/footer.php');

        
        ?>

    </footer>

</body>

</html>