<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" >
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <style>
        *{box-sizing:border-box}
        .container{
            padding:16px;
        }
        input[type=text],input[type=password]{
            width:100%;
            padding:15px;
            margin:5px 0 22px 0;
            display:inline-block;
            border:none;
            background:whitesmoke;
        }
        input[type-text]:focus,input[type-password]:focus{
            background-color:#ddd;
            outline:none;
        }
        .registerbtn{
            background-color:#00c3ff;
            color:white;
            padding:16px 20px;
            margin:8px 0;
            border:none;
            cursor:pointer;
            width:100%;
            opacity:0.9;
        }
        .registerbtn:hover{
            opacity:1;
        }
        a{
            color:dodgerblue;
        }
        .signin{
            background-color:#f1f1f1;
            text-align:center;
        }
    </style>
    <form action="register.php" method="POST" id="register_form">
    <div class="container">
        <h1>REGISTRATION FORM</h1>
        <p>create an account</p>
        <label for="firstname"><b>Firstname</label>
        <input type="text" placeholder="Enter First Name" name="firstname" id="firstname" required>
        <label for="lastname"><b>Lastname</label>
        <input type="text" placeholder="Enter Last Name" name="lastname" id="lastname" required>
        <label for="email"><b>Email</label>
        <input type="text" placeholder="Enter the email id" name="email" id="email" required>
        <label for="password"><b>Password</label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
        <button type="submit" class="registerbtn">Register</button>
    </div>
    <div class="signin">
        <p>Already have an account?<a href="#">sign in</a></p>
</div>
</form>

</body>
</html>