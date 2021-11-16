<?php
include "config.php";






if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    
    if ($uname != "" && $password != ""){
  
        $sql_query = "select count(*) as cntUser from myhotel.users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);
  
        $count = $row['cntUser'];

        

  
        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: index2.php');
        }else{
           header('Location: home.php');
        }
  
    }
  
  }

  if(isset($_POST['registerBtn'])){
    $uname = $_POST['txt_umane'];
    $email = $_POST['email'];
    $passwd = $_POST['txt_pwd'];
    $passwd_again = $_POST['passwd_again'];

    if($uname != " " && $passwd != " " &&  $passwd_again != " "){


        if($passwd === $passwd_again){

            if( strlen($passwd) >= 5 && strpbrk($passwd, "!#$.,:;()") != false){

            }else {
                $error_msg = 'Your password is not strong enough. Please USE another.';
            }
           
           
        } else{
            $error_msg = 'please fill out all required fields';
        }

    }
    else {
        $error_msg = 'Your  passwords did not match';
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
    

    <link rel="stylesheet" href="./css/styles.css">

    <title>Hotel-Bezos</title>
</head>
<body>
<div class="container mt-5 ">
    <form method="post" action="home.php">
        <div id="div_login" >
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="but_submit" id="but_submit" />

            </div>
        </div>
    </form>
</div>   



</body>
</html>