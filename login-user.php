<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins";
        }

        .xx {
            margin-top: 100px;
        }

        body {
            background: black;
        }

        .navbar-nav .nav-link {
            color: #fff;
            display: block;
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

        .form-group .button:hover {
            background-color: red;
            color: aliceblue;
            transition: 1s;
        }
    </style>

</head>

<body>
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
                        <a class="nav-link active" aria-current="page" href="login-user.php">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup-user.php">Sign Up</a>
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
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form class="xx" action="login-user.php" method="POST" autocomplete="">
                    <h2 style="color: aliceblue;
    display: block;" class="text-center">Login</h2>
                    <?php
                    if(count($errors) > 0){
                        ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div style="color: aliceblue;
    display: block;" class="form-group">
                        Email
                        <input class="form-control" type="email" name="email" placeholder="Enter your email" required value="<?php echo $email ?>">
                    </div>
                    <br>
                    <div style="color: aliceblue;
    display: block;" class="form-group">
                        Password
                        <input class="form-control" type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="link forget-pass text-left"><a style="color: red; text-decoration: none;
    display: block;" href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <br>
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <br>
                    <div style="color: aliceblue;
    display: block;" class="link login-link text-center">New here?
                        <a class="gs" style="color: red; text-decoration: none;" href="signup-user.php">Signup now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>