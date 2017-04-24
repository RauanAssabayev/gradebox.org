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
             <form action="/action_page.php">
              <div class="mean"> 
                <div class ="fname">First Name</div>
                 <input type="text" id="fname" name="firstname" placeholder="Your name..">
                <div class="lname" ="lname">Last Name</div>
                 <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                <div class="mail">Email</div>
                  <input type="text" id="mail" name="email" placeholder="Your email..">
                <div class="pass">Password</div>
                  <input type="text" id="pass" name="password" placeholder="Enter password..">
                <center>
                    <input type="submit" value="Submit">
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