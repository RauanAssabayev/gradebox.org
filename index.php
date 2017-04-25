<?
require "orm.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['email'])){
      $loginsql = "select * from users where email = '".$_POST['email']."'
                    and password = '".md5($_POST['password'])."' ;";
      $user = R::getAll($loginsql);
      if($user){
         session_start();
        $_SESSION['email'] = $_POST['email'];
        if($user[0]['type'] == 1){
          header('Location: tstream.php');
        }else{
          header('Location: stream.php');
        }
      }else{
        echo '<script> alert("Логин или пароль не правильный ") </script>';
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
    <link rel="stylesheet" type="text/css" href="static/css/main2.css">
    <title>Главная страница</title>
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
  </head>
  <body>
  <div class="login-wrapper">
    <div class="dologin">
        <form action="" method="POST">
          <div class="mean"> 
            <img id="closelogin" src="static/img/content/close.png">
            <div class ="labelname">Email</div>
             <input type="text" id="fname" name="email" placeholder="Your email">
            <div class="labelname" >Password</div>
             <input type="password" id="lname" name="password" placeholder="Your password">
            <center>
                <input type="submit" value="Sign in">
            </center>
          </div>
        </form>
    </div>
  </div>
    <div class="wrapper">
      <header>
        <div class="header">
          <div class="logo"><a href="#"><img src="static/img/general/logo.png"></a></div>
          <div class="login"> <span> LOGIN </span> <img src="static/img/general/login.png"></div>
        </div>
      </header>
      <section class="tob-bg">
        <div class="container">
          <div class="top-banner__info">
            <h1 class="top-banner__title">Welcome to <span>GradeBox</span></h1>
            <p class="top-banner__text">create, manage and upgrade - user-friendly interface will help <br> you quickly learn and get to new ideas and experiences</p><a class="top-banner__startBtn" href="#"> Start now</a>
            <div class="top-banner__users">
                <a class="top-banner__usersBtn" href="teacherreg.php">teacher</a>
                <a class="top-banner__usersBtn" href="studentreg.php">student</a>
            </div>
          </div>
        </div>
      </section>
      <section class="more">
        <div class="container">
          <div class="more-info"><a class="more-info__text" href="#">Want to learn more?</a></div>
        </div>
      </section>
      <section class="advantage">
        <div class="container">
          <div class="advantage-wrap">
            <h2 class="advantage-title">GradeBox</h2>
            <div class="advantage-item">
              <p class="advantage-item__text one">New available web-site for teachers and  students of school with automatizied processes</p>
            </div>
            <div class="advantage-item">
              <p class="advantage-item__text two">Check class abilities and opportunities to make  easy and comfortable work</p>
            </div>
            <div class="advantage-item">
              <p class="advantage-item__text three">Improve your workplace to better view, space, fix  and organize it all the way up</p>
            </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $(".login").click(function(){
                $(".login-wrapper").toggle();
            });
            $("#closelogin").click(function(){
                $(".login-wrapper").toggle();
            });
        });
    </script>
  </body>
</html>