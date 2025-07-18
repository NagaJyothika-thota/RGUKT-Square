<html>
    <head>
        <title>grades</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <style>
            *{
               margin:0px;
               padding:0px;
               box-sizing:border-box;
             }
            td,th{
                padding:35px;
            }
            .container{
                width: 200px;
                height:125px;
                border:1px solid black;
                padding: 10px;
                margin:10px;
                background-color:paleturquoise;
            }
            marquee{
                background-color:navy;
            }
            .image{
                background-color:rgb(248, 222, 244);
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
.table{

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
  <br><br><br><br>
        
        <center>
            <div>
            <form class="container" method="POST" action="">
                 ENTER SEM<br><br>
                <input type="text" name="sem" required>
              <br><br>
              <input type="submit" name="submit" value="submit">
            </form>
            </div>
            <table border='1' cellspacing='0' width='100%' height='100%' class='table'>
            <?php
                 
                 session_start();
                 $conn = mysqli_connect('localhost:8080','root','', 'student-details');
                 if($_SERVER['REQUEST_METHOD']=="POST"){
                    $sem=strtoupper($_POST['sem']);
                if($conn->connect_error){
                    die("connection failed".$connection->connect_error);
                 }
                 $id=$_SESSION["id"];
                 $sql="select subjects,credits,grades from student_data1 where id='$id' and  sem='$sem'";
                 $result=$conn->query($sql);
                 if(!$result){
                    die("invalid query".$conn->error);
                 }
                 echo"
                 <tr>
                    <th>SUBJECTS</th>
                    <th>CREDITS</th>
                    <th>GRADES</th>
                </tr>";
                 while($row=$result->fetch_assoc()){
                 echo"<tr>
                    <td>".$row['subjects']."</td>
                    <td>".$row['credits']."</td>
                    <td>".$row['grades']."</td>
                </tr>
                ";
                 }}
                ?>
                </table>
        </center>
    </body>
</html>