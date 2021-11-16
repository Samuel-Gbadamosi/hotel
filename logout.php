<?php

 

// destroy the session and check to make sure it has been destroyed



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css link -->
    <link rel="stylesheet" href="./css/styles.css">
        <!-- css link -->
<!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- bootstrap link -->
    <!-- font aweome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- just a title to say bye -->
    <title>Good-Bye </title>
</head>
<style>
        h3 {
            animation-duration: 8s;
            animation-name: slidein;
            animation-iteration-count: infinite;
        }

        @keyframes slidein {
        0% {
            margin-left: 0%;
        }
        50% {
            margin-left: 300px;
        }
        100% {
            margin-left: 0%;
        }
        }

</style>

<body>
    <header>
        <div style="background-color: #0D6EFD;">
            <div class="container-fluid">
                        <!-- <?php
                    
                    include('./header/header.php');
                    ?> -->
            </div>
        
        </div>
       
    </header>
    <main>
    <div class="container pt-4 " style="position: relative; left:250px;">
    
        <h3 >Log out</h3>
       <p style="font-style:itali; font-weight:bold">Thanks for surfing our website we hope you enjoyed your stay in our hotel</p>
       <h2>See you soon</h2>
       <p><i class="fas fa-hotel"></i></p>
        <img style="border-radius: 30px;" src="https://media.istockphoto.com/photos/display-picture-id507719154?b=1&k=20&m=507719154&s=170667a&w=0&h=5zhOFFAog3CuR_epNf5zdhy8Fb9apP00P-CQXC-1A2A=" alt="">

       
    </main>
    <footer>
<!-- 
    <?php
     include('./footer/footer.php');
    
    ?> -->
    </footer>
   
    
    
</body>
</html>