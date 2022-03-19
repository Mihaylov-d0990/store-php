<?php 
    session_start();
    require_once "head.php"; 
    $dividingTitle = "Register";
    require_once "dividingTitle.php";
    $_SESSION['name']       = $_POST['name'];
    $_SESSION['surname']    = $_POST['surname'];
    $_SESSION['login']      = $_POST['login'];
    $_SESSION['email']      = $_POST['email'];
    $_SESSION['password']   = $_POST['password'];
    $_SESSION['r_password'] = $_POST['r_password'];

    $error_message          = "";
    $name_error             = (strlen(trim($_POST['name'])) != 0) || !isset($_POST['name']) ? "" : "Name field is empty";
    $surname_error          = (strlen(trim($_POST['surname'])) != 0) || !isset($_POST['surname']) ? "" : "Surname field is empty";
    $login_error            = (strlen(trim($_POST['login'])) != 0) || !isset($_POST['login']) ? "" : "Login field is empty";
    $email_error            = (strlen(trim($_POST['email'])) != 0) || !isset($_POST['email']) ? "" : "Email field is empty";
    $password_error         = (strlen(trim($_POST['password'])) != 0) || !isset($_POST['password']) ? "" : "Password field is empty";
    $r_password_error       = (strlen(trim($_POST['r_password'])) != 0) || !isset($_POST['r_password']) ? "" : "Repeat password field is empty";

    $error_array = array($name_error, $surname_error, $login_error, $email_error, $password_error, $r_password_error);
    for ($i = 0; $i < count($error_array); $i++) {
        if (strlen($error_array[$i]) > 0) {
            $error_message = $error_array[$i];
            break;
        }
    }

?>
<div class="register">
    <div class="container">
        <div class="register__content">
            <div class="register__error">
                <?php 
                    echo $error_message;
                ?>
            </div>
            <div class="register__form">
                <form action="register.php" method="POST">
                    <div class="register__field">
                        <span>Name</span>
                        <input class="register__name" type="text" name="name" value="<?php echo $_SESSION['name']; ?>" />
                    </div>
                    <div class="register__field">
                        <span>Surname</span>
                        <input class="register__surname" type="text" name="surname" value="<?php echo $_SESSION['surname']; ?>" />
                    </div>
                    <div class="register__field">
                        <span>Login</span>
                        <input class="register__login" type="text" name="login" value="<?php echo $_SESSION['login']; ?>" />
                    </div>
                    <div class="register__field">
                        <span>Email</span>
                        <input class="register__email" type="text" name="email" value="<?php echo $_SESSION['email']; ?>" />         
                    </div>
                    <div class="register__field">
                        <span>Password</span>
                        <input class="register__password" type="text" name="password" value="<?php echo $_SESSION['password']; ?>" />
                    </div>
                    <div class="register__field">
                        <span>Repeat password</span>
                        <input class="register__repeat-password" type="text" name="r_password" value="<?php echo $_SESSION['r_password']; ?>" />
                    </div>
                    <div class="register__field">
                        <div class="register__login">
                            <a href="login.php">Log in</a>
                        </div>   
                    </div>
                    <div class="register__field">
                        <input class="register__register" type="submit" value="Register" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "foot.php" ?>