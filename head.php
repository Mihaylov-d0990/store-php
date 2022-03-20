<?php 
    $connection = mysqli_connect("localhost", "root", "", "store");
    $mainPageLink = "index.php";
    session_start();
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
                                <a href="login.php">
                                    <div class="head__login">
                                        <img src="images/profile.svg" alt="">
                                    </div>
                                </a>
                                <a href="cart.php">
                                    <div class="head__basket">
                                        <img src="images/cart.svg" alt="">
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