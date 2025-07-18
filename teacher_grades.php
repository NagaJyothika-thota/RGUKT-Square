<html>
    <head>
        <title>grades</title>
        <style>
            .container{
                padding:10px;
                width: 250px;
                height:350px;
                border:1px solid black;
                background-color:paleturquoise;
              } 
              </style>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
    <body>
    <nav>
      <div class="logo">
        <p>
        <i class="fa-solid fa-square fa-bounce" style="color:white;"></i>
          RGUKTSQUARE
        </p>
      </div>  
      <ul>
        <li><a href="homepage2.php"><i class="fa-solid fa-house fa-bounce" style="color: #fafcff;"></i>&nbsp;HOME</a></li>
        <li><a href="about.php">&nbsp;ABOUT US</a></li>
        <li><a href="teacher_attendance.php">&nbsp;ATTENDANCE</a></li>
        <li><a href="teacher_grades.php">&nbsp;GRADES</a></li>
      </ul>
        </nav>
        <br><br><br>
        <br><br>
        <center>
        <form class="container" method="POST" action="">
                 ENTER ID:<input type="text" name="id">
                <br><br>
                ENTER SEM:<input type="text" name="sem">
                <br><br>
                ENTER SUBJECT:<input type="text" name="subject">
                <br><br>
                ENTER CREDITS:<input type="text" name="credit">
                <br><br>
                ENTER GRADES:<input type="text" name="grade">
                <br><br>
              <input type="submit" name="submit" value="submit">
    </form>
        </center>
        <?php
        $conn = mysqli_connect('localhost:8080','root','', 'student-details');
        if($conn->connect_error){
            die("connection failed".$connection->connect_error);
         }
                if($_SERVER['REQUEST_METHOD']=="POST")
                { 
                    $id=strtolower($_POST['id']);
                    $sem=strtoupper($_POST['sem']);
                    $subject=strtoupper($_POST['subject']);
                    $credit=$_POST['credit'];
                    $grade=strtoupper($_POST['grade']);
                    $sql="insert into student_data1 values('$id','$sem','$subject','$credit','$grade')";
                    $result=$conn->query($sql);
                    if($result){
                        "<center>";
                       echo "Data inserted succsessfully";
                       "</center";
                    }
                    else{
                        die("invalid query".$conn->error);
                    }


                }
        ?>

    </body>
</html>