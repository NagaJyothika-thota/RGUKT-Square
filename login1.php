<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Essence</title>
    <script src="https://kit.fontawesome.com/d65e853b8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login1.css">
</head>
<body>
    <div class="container__fluid">
        <div class="left__side">
            <h1 class="heading_left">Click Here To</h1>
            <button onclick={signIn()} class="primary__btn">PARENT LOGIN</button>
            <button onclick={signUp()} class="secondary__btn">TEACHER LOGIN</button>
        </div>
        <div class="right__side">
            <!--  -->

            <div class="signUp">
                <h1 class="heading_right"> TEACHER LOGIN</h1>
                <form method="POST" action="">
                    <div class="input__field">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="email1" id="" placeholder="Email" required>
                    </div>
                    <div class="input__field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password1" required id="" placeholder="Password">
                    </div>
                    <button class="signUp__btn" name="teacher">LOGIN</button>
                   
                </form>
            </div>


            <div class="signIn">
                <h1 class="heading_right">PARENT LOGIN </h1>
                <form method="POST" action="">
                    
                    <div class="input__field">
                        <i class="fa fa-envelope"></i>
                        <input type="text" name="email2" id="" placeholder="ID" required>
                    </div>
                    <div class="input__field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password2" id="" placeholder="Password" required>
                    </div>
                    <button  type="submit" class="signUp__btn" name="parent">LOGIN</button>
                   
                </form>
            </div>
        </div>
    </div>


    <script src="login1.js"></script>
</body>
<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
$_SESSION['id']=$_POST['email2'];
$conn = mysqli_connect('localhost:8080','root','', 'student-details');

$authenticated = false;

// Handle form submission
if (isset($_POST['parent'])) {
    $enteredId = strtolower($_POST['email2']);
    $enteredPassword = $_POST['password2'];

    // Query to fetch user data by ID
    $query = "SELECT Email_Id, Password FROM student WHERE Email_Id = '$enteredId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result); // Fetch a row

    if ($row) {
        
        // Verify password
        if ($enteredPassword==$row[1]) {
            $authenticated = true;
        } else {
            echo "<script>alert('Invalid password!')</script>";
        }
        
    } else {
        echo "<script>alert('User not found')</script>";
    }
}

if ($authenticated) {
    // Redirect to the desired page after successful login
    header("Location:homepage.php");
    // exit(); // Make sure to exit after the redirect
}
// Handle form submission
if (isset($_POST['teacher'])) {
    $enteredEmail = $_POST['email1'];
    $enteredPassword = $_POST['password1'];

    // Query to fetch user data by ID
    $query = "SELECT Email_Id, Password FROM teacher WHERE Email_Id = '$enteredEmail'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result); // Fetch a row

    if ($row) {
        
        // Verify password
        if ($enteredPassword==$row[1]) {
            $authenticated2 = true;
        } else {
           
            echo "<script>alert('Invalid password!')</script>";
            // header("location:login.html") ;
            // exit();
            
            

        }
        
    } else {
        echo "<script>alert('User not found')</script>";
    }
}


if ($authenticated2) {
    // Redirect to the desired page after successful login
    header("Location:homepage2.php");
    // exit(); // Make sure to exit after the redirect
}
$conn->close();
}
?>
</html>