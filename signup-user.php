<?php require_once "controllerUserData.php"; ?>
<html lang="en" dir="ltr">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title> Sign Up </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: black;
        }

        .container {
            margin-top: 40px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins";
        }

        banner {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(background.jpg);
            background-size: cover;
            background-position: center;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-nav .nav-link:hover {
            color: #000;
            background-color: #fff;
            transition: 1s;
            border-radius: 5px;
        }

        .navbar-nav .nav-item .active {
            color: red;
        }

        .input-box .button:hover {
            background-color: red;
            color: aliceblue;
            transition: 1s;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="banner">
        <nav class="navbar navbar-expand-lg navbar-light bg-black">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="logo.png" alt="" width="40" height="40">
                </a>
                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login-user.php">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="signup-user.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: chartreuse;" class="nav-link" href="./admin/login.php">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2 style="color: aliceblue;
    display: block;" class="text-center">Sign Up</h2>
            <div class="content">
                <form class="col-md-4 offset-md-4 form login-form" action="signup-user.php" method="POST" autocomplete="">
                    <?php
                    if(count($errors) == 1){
                        ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }elseif(count($errors) > 1){
                        ?>
                    <div class="alert alert-danger">
                        <?php
                            foreach($errors as $showerror){
                                ?>
                        <li><?php echo $showerror; ?></li>
                        <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="user-details">
                        <div class="input-box">
                            <span style="color: aliceblue;
    display: block;" class="details">Full Name</span>
                            <input class="form-control" type="text" name="name" placeholder="Enter your full name" required value="<?php echo $name ?>">
                        </div>
                        <br>
                        <div class="input-box">
                            <span style="color: aliceblue;
    display: block;" class="details">Email</span>
                            <input class="form-control" type="email" name="email" placeholder="Enter your email address" required value="<?php echo $email ?>">
                        </div>
                        <br>
                        <div class="input-box">
                            <span style="color: aliceblue;
    display: block;" class="details">Password</span>
                            <input class="form-control" type="password" name="password" placeholder="Choose a password" required>
                        </div>
                        <br>
                        <div class="input-box">
                            <span style="color: aliceblue;
    display: block;" class="details">Confirm Password</span>
                            <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <br>
                        <div class="button">
                            <input class="form-control button" name="signup" type="submit" value="Sign Up">
                        </div>
                        <br>
                        <div style="color: aliceblue;
    display: block;" class="link login-link text-center">Already a member? <a style="color: red; text-decoration: none;" href="login-user.php">Login here</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>