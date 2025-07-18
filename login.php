<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Login</title>
</head>
<body>
  <div class="login-container">
    <div class="login-form">
      <h2>Login</h2>
      <form method="post">
      <div class="input-field">
        <label for="id"><i class="fas fa-id-card"></i> ID</label>
        <input type="text" id="id" placeholder="Enter your ID" name="id" required>
      </div>
      <div class="input-field">
        <label for="password"><i class="fas fa-lock"></i> Password</label>
        <input type="password" id="password" placeholder="Enter your password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary" id="login-btn">Login</button>
 </form>

    </div>
  </div>

  <!-- <script src="login.js"></script> -->
</body>
<?php

$conn = mysqli_connect('localhost:8080','root','', 'student-details');

$authenticated = false;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredId = strtolower($_POST['id']);
    $enteredPassword = $_POST['password'];

    // Query to fetch user data by ID
    $query = "SELECT id, password FROM student1 WHERE ID = '$enteredId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result); // Fetch a row

    if ($row) {
        
        // Verify password
        if ($enteredPassword==$row[1]) {
            $authenticated = true;
        } else {
           
            echo "<script>alert('Invalid password!')</script>";
            // header("location:login.php") ;
            // exit();
            
            

        }
        
    } else {
        echo "<script>alert('User not found')</script>";
    }
}

if ($authenticated) {
    // Redirect to the desired page after successful login
    header("Location:homepage.php");
    exit(); // Make sure to exit after the redirect
}

$conn->close();
?>

</html>