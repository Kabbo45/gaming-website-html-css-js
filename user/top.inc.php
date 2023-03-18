<?php require_once "../controllerUserData.php";?>
<?php
require('functions.inc.php');
isActive();
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ( $email != false && $password != false ) {
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $run_Sql = mysqli_query( $con, $sql );
    if ( $run_Sql ) {
        $fetch_info = mysqli_fetch_assoc( $run_Sql );
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ( $status == "verified" ) {
            if ( $code != 0 ) {
                header( 'Location: ../reset-code.php' );
            }
        } else {
            header( 'Location: ../user-otp.php' );
        }
    }
} else {
    header( 'Location: ../login-user.php' );
}

?>
<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<style>
    .bg {
        font-size: 32px;
        margin-left: -10px;
        color: aliceblue;
    }

    .glyphicon {
        background-color: red;
        padding: 8px 15px;
        color: white;
        font-weight: 700;
    }

    .glyphicon:hover {
        background-color: white;
        color: red;
        text-decoration: none;
        font-weight: 700;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-item-has-children dropdown">
                        <a href="index.php">DASHBOARD</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="play.php">PLAY GAMES</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="buy_games.php">BUY GAMES</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="chatroom.php">CHATROOM</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="news.php">NEWS</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <div class="user-area dropdown float-right">
                        <a class="bg" href="index.php">Welcome <?php echo $fetch_info['name'] ?></a>
                    </div>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <a href="logout.php">
                        <div class="glyphicon">Logout</div>
                    </a>
                </div>
            </div>
        </header>