<?php 
    $connection = mysqli_connect("localhost", "root", "", "store");
    $mainPageLink = "index.php";
    session_start();

    $user_signed = false;
    if (isset($_POST['exit'])) {
        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
            setcookie("login", $result['login'], time() - 2592e4);
            setcookie("password", $result['password'], time() - 2592e4);
        } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
            unset($_SESSION['login']);
            unset($_SESSION['password']);
        }
        $user_signed = false; 
    } else {
        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
            $cookie_login    = $_COOKIE['login'];
            $cookie_password = $_COOKIE['password'];
            $result          = $connection->query("SELECT * FROM `user` WHERE `login` = '$cookie_login' AND `password` = '$cookie_password'");
            if (mysqli_num_rows($result)) $user_signed = true;
        } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
            $session_login    = $_SESSION['login'];
            $session_password = $_SESSION['password'];
            $result           = $connection->query("SELECT * FROM `user` WHERE `login` = '$session_login' AND `password` = '$session_password'");
            if (mysqli_num_rows($result)) $user_signed = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style/style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <title>Store-layout</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="head dividing">
                <div class="container">
                    <div class="head__content">
                        <div class="head__top">
                            <div class="head__logo">
                                <a href=<?php echo $mainPageLink ?>>
                                    Store-layout
                                </a>
                            </div>
                            <div class="head__search">
                                <input type="text">
                                <button>Search</button>
                            </div>
                            <div class="head__profile"> 
                                <?php 
                                    if ($user_signed) {
                                        echo '<form action="#" method="POST">
                                                <input type="hidden" name="exit" />
                                                <input type="image" src="images/exit.svg" />
                                            </form>';
                                    } else {
                                        echo '<a href="login.php">
                                                    <div class="head__login">
                                                        <img src="images/profile.svg" alt="" />
                                                    </div>
                                                </a>';
                                    }
                                ?>
                                <a href="cart.php">
                                    <div class="head__basket">
                                        <img src="images/cart.svg" alt="" />
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="head__nav">
                            <nav>
                                <a href="catalog.php">
                                    <div class="head__link">
                                        Catalog
                                    </div>
                                </a>
                                <a href=<?php echo $mainPageLink ?>>
                                    <div class="head__link">
                                        Lorem.
                                    </div>
                                </a>
                                <a href=<?php echo $mainPageLink ?>>
                                    <div class="head__link">
                                        Lorem.
                                    </div>
                                </a>
                                <a href=<?php echo $mainPageLink ?>>
                                    <div class="head__link">
                                        Lorem.
                                    </div>
                                </a>
                                <a href=<?php echo $mainPageLink ?>>
                                    <div class="head__link">
                                        Lorem.
                                    </div>
                                </a>
                                <a href=<?php echo $mainPageLink ?>>
                                    <div class="head__link">
                                        Lorem.
                                    </div>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>