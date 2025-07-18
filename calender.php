<html>
    <head>
        <title>academic calender</title>
        <style>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
            marquee{
                background-color: navy;
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
 .image{
    width:100%;
    height: 1000px;
    margin-top:10%;
    margin:auto;
    box-shadow:0px 0px 3px grey;
    position:relative;
    top:75px;
    overflow:hidden;
 }
        </style>
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
          <li><a href="homepage.php">Home</a></li>
          <li><a href="attendance.php">Attendance</a></li>
          <li><a href="calender.php">Calender</a></li>
          <li><a href="grades.php">Grades</a></li>
          <li><a href="outpass.php">Outpass</a></li>
  </nav>
  <br><br>
    <?php

      $conn = mysqli_connect('localhost:8080','root','', 'student-details');
      $sql="select image from calender ";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        $Image=$row['image'];
      }?>
              <img src='<?php echo $Image;?>' alt='image not displayed' width='' height='' class='image'>
      </body>
      </html>
