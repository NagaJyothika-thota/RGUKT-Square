<?php
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $conn=mysqli_connect("localhost:8080","root","","register_database");
  $q="INSERT INTO data values(NULL,'$firstname','$lastname','$email','$password')";
  $y=mysqli_query($conn,$q);
  if(!$y){
    echo "connection failed ".mysqli_error($conn);
  }
  echo "connected succesfully";
?>