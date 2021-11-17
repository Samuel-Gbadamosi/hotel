

<?php
include "config.php";
require('./db/db.php');


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
        <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- bootstrap link -->
</head>
<body>
<?php
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        var_dump($con->error);

        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index2.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='/home.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <!-- <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="/registeration.php">New Registration</a></p>
  </form> -->
<div class="container">
  <section class="vh-200">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 text-black mt-5" >

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Hotel-Bezos</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form method="post" name="login" style="width: 23rem;">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example18">Username</label>

            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form2Example28">Password</label>
              <input type="password" class="login-input" name="password" placeholder="Password"/>

            </div>

            <div class="pt-1 mb-4">
            <input class="btn btn-primary" type="submit" value="Login" name="submit" class="login-button"/>
            </div>

            <p>Don't have an account? <a href="/registeration.php" class="link-info">Register here</a></p>


          </form>

        </div>

      </div>
      <div class="col-sm-2 px-0 d-none d-sm-block mt-5">
        <img style="border-radius: 30px; position:relative; right:40px; width:700px;"  src="https://cdn.pixabay.com/photo/2017/06/11/12/33/swimming-2392283__340.jpg" alt="Login image" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
 </section>
</div>
<?php
    }
?>
</body>
</html>