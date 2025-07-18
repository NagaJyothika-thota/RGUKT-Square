<html>
    <head>
        <title> attendance</title>
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
                SELECT DATE:<input type="month" name="year">
                <br><br>
                ENTER TOTAL NUMBER OF CLASSES:<input type="text" name="total_classes">
                <br><br>
                ENTER NUMBER OF ATTENDED CLASSES:<input type="text" name="attended_classes">
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
                {   $selectedyear=$_POST['year'];
                    $datetime=new DateTime ($selectedyear);
                    $dateArray=explode('-',$selectedyear);
                    $year=$dateArray[0];
                    $month=$datetime->format('F');
                    $id=strtolower($_POST['id']);
                    $total_classes=$_POST['total_classes'];
                    $attended_classes=$_POST['attended_classes'];
                    $sql="insert into student_data values('$id','$month','$total_classes','$attended_classes','$year')";
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
