<html>
    <head>
        <title>attendance</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <style>
            
            .table{
                position: relative;
            }
            *{
    margin:0px;
    padding:0px;
    box-sizing:border-box;
}
nav{
    width:100%;
    height:75px;
    line-height:75px;
    padding:0px 0px;
    position:fixed;
    background-color:navy;
}
nav .logo p{
    font-size:30px;
    font-weight:bold;
    float:left;
    color:white;
    text-transform:uppercase;
    letter-spacing: 1px;
    cursor:pointer;
}
nav ul{
    float:right;
}
nav li{
    display:inline-block;
    list-style:none;
}
nav li a{
    font-size:26px;
    text-transform:uppercase;
    padding:0px 30px;
    color:white;
    text-decoration:none;
}
nav li a:hover{
    color:#ff8c69;
    transition:all 0.4s ease 0s;
}
.container{
                width: 200px;
                height:100px;
                border:1px solid black;
                padding: 5px;
                margin:10px;
                background-color:paleturquoise;
            }

main{
    background-image: url("rgukt.jpeg");
                background-size: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size:auto;

    width:100%;
    height: 570px;
    margin-top:10%;
    margin:auto;
    box-shadow:0px 0px 3px grey;
    position:relative;
    top:75px;
    overflow:hidden;
}

        </style>
    </head>
    <body class="image">
    <nav>
        <div class="logo">
            <p>
                <i class="fa-solid fa-square fa-bounce" style="color:white;"></i>
                  RGUKTSQUARE
                </p>
        </div>  
        <ul>
          <li><a href="homepage.php">Home</a></li>
          <li><a href="attendance.php">Attendance</a></li>
          <li><a href="calender.php">Calender</a></li>
          <li><a href="grades.php">Grades</a></li>
          <li><a href="outpass.php">Outpass</a></li>
  </nav>
  
         <main>
        <div class="image1">
        <div>
            <center>
            <form class="container" method="POST" action="">
                 ENTER YEAR<br><br>
                <input type="text" name="year" required>
              <br><br>
              <input type="submit" name="submit" value="submit">
            </form>
            </div>
            <div class="table">
</center>
<table align='center' border=1 cellpadding='0' cellspacing='0' height='100%' width='100%'>
                <?php
                session_start();
               $conn = mysqli_connect('localhost:8080','root','', 'student-details');
                if($_SERVER['REQUEST_METHOD']=="POST")
                { 
                   $year=strtoupper($_POST['year']);
               if($conn->connect_error){
                   die("connection failed".$connection->connect_error);
                }
                $id=$_SESSION["id"];
                $sql="select months,total_classes,attended_classes from student_data where id='$id' and  year='$year'";
                $result=$conn->query($sql);
                if(!$result){
                   die("invalid query".$conn->error);
                }
               echo" <tr>
                    <th>MONTHS</th>
                    <TH>TOTAL NO:OF CLASSES</TH>
                    <TH>TOTAL NO:OF CLASSES ATTENDED</TH>
                    <TH>ATTENDANCE FOR THAT PARTICULAR MONTH</TH>
                </tr>";
                while($row=$result->fetch_assoc()){
                    echo"<tr>
                       <td>".$row['months']."</td>
                       <td>".$row['total_classes']."</td>
                       <td>".$row['attended_classes']."</td>
                       <td>".round((number_format($row['attended_classes'])*100)/number_format($row['total_classes'])).'%'."</td>
                   </tr>
                   ";
                    }
                }
               ?>
</table>
            </div>
        </div>
            </main>
    </body>
</html>