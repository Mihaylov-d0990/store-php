<?php 
    require_once "head.php";
    $dividingTitle = "Login";
    require_once "dividingTitle.php";

    $_SESSION['s_login']    = $_POST['login'];
    $_SESSION['s_password'] = $_POST['password'];
    $_SESSION['signed']     = $_POST['signed'];

    $error_message          = "";
    $user_error             = ""; 
    $login_error            = (strlen(trim($_POST['login'])) != 0) || !isset($_POST['login']) ? "" : "Login field is empty";
    $password_error         = (strlen(trim($_POST['password'])) != 0) || !isset($_POST['password']) ? "" : "Password field is empty";

    $login                  = $_POST['login'];
    $password               = $_POST['password'];

    $result = $connection->query("SELECT `login`, `password` 
    FROM `user` WHERE 
    `login` = '$login' AND 
    `password` = '$password'");

    if (isset($_POST['login']) && isset($_POST['password'])) {
        if (mysqli_num_rows($result) == 1) {
            $result = $result->fetch_assoc();
            if (isset($_POST['signed'])) {
                setcookie("login", $result['login'], time() + 2592e4);
                setcookie("password", $result['password'], time() + 2592e4);
            } else {
                $_SESSION['login']    = $result['login'];
                $_SESSION['password'] = $result['password'];
            }
            unset($_SESSION['s_login']);
            unset($_SESSION['s_password']);
            unset($_SESSION['signed']);
            header("Location: $mainPageLink");
        } else {
            $user_error = "User is not exist";
        }
    }

    $error_array = array($login_error, $password_error, $user_error);
    for ($i = 0; $i < count($error_array); $i++) {
        if (strlen($error_array[$i]) > 0) {
            $error_message = $error_array[$i];
            break;
        }
    }



?>
<div class="login">
    <div class="container">
        <div class="login__content">
            <div class="login__error">
                <?php 
                    echo $error_message;
                ?>
            </div>
            <div class="login__form">
                <form action="login.php" method="POST">
                    <div class="login__input">
                        <span>Login</span>
                        <input type="text" name="login" value="<?php echo $_SESSION['s_login']; ?>"/>
                    </div>
                    <div class="login__input">
                        <span>Password</span>
                        <input type="text" name="password" value="<?php echo $_SESSION['s_password']; ?>"/>
                    </div>
                    <label><input type="checkbox" name="signed" <?php if(isset($_SESSION['signed'])) echo "checked"; ?>/><span>Keep me Signed in</span></label>
                    <input type="submit" value="Log in" />
                </form>
            </div>
            <div class="login__forget">
                <a href="/login.php">Forget password?</a>
            </div>
            <div class="login__forget">
                <a href="/register.php">Register</a>
            </div>
            <div class="login__dividing">

            </div>
            <div class="login__text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, iure. Accusamus nam delectus repudiandae maxime, officia quae iste? Sunt iusto voluptatem nemo dolore odio minus libero rerum maxime pariatur ad.
            </div>
        </div>
    </div>
</div>
<?php require_once "foot.php" ?>