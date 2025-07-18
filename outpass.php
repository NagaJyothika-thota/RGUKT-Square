<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "C:/xampp/htdocs/php programs/RguktSquare/vendor/phpmailer/phpmailer/src/Exception.php";
require "C:/xampp/htdocs/php programs/RguktSquare/vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "C:/xampp/htdocs/php programs/RguktSquare/vendor/phpmailer/phpmailer/src/SMTP.php";
?>
<html>
    <head>
        <title>outpass</title>
        <style>
            *{
                 margin:0px;
                 padding:0px;
                 box-sizing:border-box;
             }
            .container{
                width: 200px;
                height:100px;
                border:1px solid black;
                padding: 5px;
                margin:10px;
                background-color:blanchedalmond;
            }
            td,th{
                padding:15px;
            }
            .submit{
                background-color:white;
                border-radius: 1;
            }
            marquee{
                background-color: navy;
            }
            body{
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
</style>
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
          <li><a href="homepage.php">Home</a></li>
          <li><a href="attendance.php">Attendance</a></li>
          <li><a href="calender.php">Calender</a></li>
          <li><a href="grades.php">Grades</a></li>
          <li><a href="outpass.php">Outpass</a></li>
  </nav>
  <br><br><br><br>
  
        <center>
            
        <div class="container">
                STUDENT ID :&nbsp;&nbsp;
                <form method="post">
                <input type="text" name="student_id" value="<?php echo $_SESSION["id"]?>" readonly>
                <br><br>
                <input type="submit" name="request" value="Request Outpass" class="submit">
                </form>
            </center>
        </div>
        <br><br>
            <table border="1" width="100%" height="100%" cellpadding="0" cellspacing="0">
            <?php
            $conn = mysqli_connect('localhost:8080','root','', 'student-details');
            $id=$_SESSION["id"];
                $sql="select date,intime,outtime from outpass where id='$id'";
                $result=$conn->query($sql);
                if(!$result){
                   die("invalid query".$conn->error);
                }
              echo"<tr>
                <th>DATE(yyyy-mm-dd)</th>
                <th>INTIME</th>
                <th>OUTTIME</th>
              </tr>";
              while($row=$result->fetch_assoc()){
                 echo" <tr>
                <td>".$row['date']." </td>
                <td>".$row['intime']."</td>
                <td>".$row['outtime']."</td>
              </tr>";
              }
            ?>
              </table>
    </body>

<?php
if(isset($_POST['request'])){
  $id=$_SESSION['id'];
  sendEmail($id);
// Create a new PHPMailer instance
}

// hjad noeg oyzc yozm;

function sendEmail($id){
$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
   
    $mail->Username   = 'rajkumarhacker814@gmail.com'; // Your email address
    $mail->Password   = 'hjad noeg oyzc yozm';
    $mail->SMTPAuth   = true;   // Your email password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption
    
    $mail->Port       = 465;  // TCP port to connect to

    //Recipients
    $mail->setFrom('rajkumarhacker814@gmail.com', 'Rajkumar'); // Your email address and name
    $mail->addAddress('o190371@rguktong.ac.in', 'Rajkumar1'); // Recipient's email address and name

    //Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = "Requset to Outpass";
    $mail->Body    = "<p>please give outpass to my son/daughter her/his id number is $id </p>";
    $mail->AltBody = 'YES IT IS WORKING';

    $mail->send();
    echo "<script>alert('Message sent Successfully')</script>";
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  }

?>
</html>