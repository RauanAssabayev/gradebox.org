<?
require "orm.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['addcourse'])){
      $courses = R::dispense('courses');
      $courses->title = $_POST['title'];
      $courses->email = $_SESSION['email'];
      R::store($courses);
      header("Refresh:0");
  }
}
?>
<!DOCTYPE HTML>
<html lang="ru-RU">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE = edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="static/fonts/fonts.css">
    <link rel="stylesheet" type="text/css" href="static/css/main.css">
    <title>TEACHER STREAM</title>
  </head>
  <body>
<div class="full-wrapper-student">
  <div class="addstudent">
  <img id="closeadds" src="static/img/content/close.png">
      <input type="text"  id="semail" placeholder="Student Email">
      <center>
        <input type="submit" id="addstudent" value="ADD STUDENT">
      </center>
  </div>
</div>
    <div class="wrapper">
      <header>
        <div class="header">
          <div class="logo">
              <a href="index.php">
                <img src="static/img/content/logo.png">
              </a>
          </div>
          <a id="teach" href="index.php">
                <img src="static/img/content/1.png">
          </a>
        </div>
      </header>
      <div class="mainwrapper">
        <div class="mainarea">
            <h3> Welcome Teacher </h3>
            <ul>
              <li class="activeitem" id="courses"> courses </li>
              <li id="schedule"> schedule </li>
              <li id="grades"> grades </li>
              <li id="tasks"> tasks </li>
              <li id="notes"> notes </li>
            </ul>
            <div class="maincontent">
                  <div class="courses">
                      <ul>
                        <li class="activesubitem" id="courseslist"> List </li>
                        <li id="addcourse"> Add </li>
                      </ul>
                      <div class="courseslist" >
                            <div class="courseitems">
                              <ul>
                                  <?php
                                    $sql = "select * from courses where email = '".$_SESSION['email']."'";
                                    $rows = R::getAll($sql);
                                    foreach ($rows as  $row) {
                                        echo " <li> <span> C </span> <p> ".$row['title']." </p> 
                                        <img id='".$row['id']."' src='/static/img/content/adduser.png' >
                                        </li> \n";
                                    }
                                  ?>
                              </ul>
                            </div>
                            <div class="addcourse">
                              <form action="" method="POST">
                                <input type="text"  name="title" placeholder="Course title">
                                <center>
                                  <input type="submit" name="addcourse" value="ADD">
                                </center>
                              </form>
                           </div>
                      </div>
                  </div>
                  <div class="tasks" style="display: none;">
                      <h2> Add task </h2>
                      <select id="selcourseid">
                        <?php
                            $sql = "select * from courses where email = '".$_SESSION['email']."'";
                            $rows = R::getAll($sql);
                            foreach ($rows as  $row) {
                                echo " <option id='".$row["id"]."'> ".$row['title']." </option> ";
                            }
                        ?>
                      </select>
                      <textarea  id="taskcontext"></textarea>
                      <input type="date" name="deadline" id="deadline">
                      <center>
                          <input type="submit" name="addtask" id="addtask" value="ADD TASK">
                        </center>
                  </div>
            </div>    
          </div>
        </div>
      </div>
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
        var courseid = 0;
        $("#addcourse").click(function(){
            $(".courseitems").hide("slow");
            $(".addcourse").show("slow");
        });
        $("#courseslist").click(function(){
            $(".addcourse").hide("slow");
            $(".courseitems").show("slow");
        });

        $(".courseitems>ul>li>img").click(function(){
            $(".full-wrapper-student").toggle("fast");
            courseid = $(this).attr("id");
        });
        
        $("#closeadds").click(function(){
            $(".full-wrapper-student").toggle("fast");
        });
        
        $("#addstudent").click(function(){
            var email = $("#semail").val();
            console.log(email);
            console.log(courseid);
          $.post("php/rest.php",
          {
              event: "addstudent",
              courseid: courseid,
              email: email
          },
          function(data, status){
            alert("Student : "+data+" added!");
          });


         });
        $("#tasks").click(function() {
            $(".courses").hide("fast");
            $("#tasks").addClass('activeitem');
            $("#courses").removeClass('activeitem');
            $(".tasks").show("slow");
        });
        $("#courses").click(function() {
            $(".courses").show("fast");
            $("#tasks").removeClass('activeitem');
            $("#courses").addClass('activeitem');
            $(".tasks").hide("slow");
        });

        $("#addtask").click(function(){
            var courseid = $("#selcourseid option:selected").val();
            var context = $("#taskcontext").val();
            var deadline = $("#deadline").val(); 
            console.log(context);
            console.log(courseid);
            console.log(deadline);

          $.post("php/rest.php",
          {
              event: "addtask",
              courseid: courseid,
              context: context,
              deadline: deadline
          },
          function(data, status){
            alert("Task : "+data+" added!");
          });
        });


      });



    </script>
  </body>
</html>