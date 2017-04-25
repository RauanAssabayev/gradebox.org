<?
require "orm.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['reg'])){
      $user = R::getAll('select * from users where email= :login',
      array(':login'=>$_POST['email']));
      if(!$user){
        $_SESSION['email'] = $_POST['email'];
        $users = R::dispense('users');
        $users->firstname = $_POST['firstname'];
        $users->lastname = $_POST['lastname'];
        $users->type = 2;
        $users->email = $_POST['email'];
        $users->password = md5($_POST['password']);
        R::store($users);
        header('Location: stream.php');
      }else{
        echo "<script> alert('Пользователь с таким именем уже существует'); </script>";
      }
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="ru-RU">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE = edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="static/fonts/fonts.css">
    <link rel="stylesheet" type="text/css" href="static/css/main.css">
    <title>Registration page</title>
  </head>
  <body>
    <div class="wrapper">
      <header>
        <div class="header">
          <div class="logo">
              <a href="index.php">
                <img src="static/img/content/logo.png">
              </a>
           </div>
        </div>
      </header>
      <section class="tob-bg">
        <div class="container">
          <div class="top-banner__info">
             <h1 class="top-banner__title">Registration form as <span>student</span></h1>
             <p class="top-banner-text">sign up for develope, operate and check your work </p>
             <form action="" method="POST">
              <div class="mean"> 
                <div class ="fname">First Name</div>
                 <input type="text" id="fname" name="firstname" placeholder="Your name..">
                <div class="lname" ="lname">Last Name</div>
                 <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                <div class="mail">Email</div>
                  <input type="text" id="mail" name="email" placeholder="Your email..">
                <div class="pass">Password</div>
                  <input type="password" id="pass" name="password" placeholder="Enter password..">
                <center>
                    <input type="submit" name="reg" value="Submit">
                </center>
              </div>
            </form>
            </div> 
          </div>
        </section>
    </div>
    <footer>
      <div class="footer">
        <p class="footer-text">All rights reserved. 2017</p>
      </div>
    </footer>
    <script src="static/js/jquery.js"></script>
    <script src="static/js/libs.min.js"></script>
    <script src="static/js/main.js"></script>
  </body>
</html>