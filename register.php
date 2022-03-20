<?php 
    require_once "head.php"; 
    $dividingTitle = "Register";
    require_once "dividingTitle.php";

    $_SESSION['signed']       = $_POST['signed'];
    $_SESSION['name']         = $_POST['name'];
    $_SESSION['surname']      = $_POST['surname'];
    $_SESSION['s_login']      = $_POST['login'];
    $_SESSION['email']        = $_POST['email'];
    $_SESSION['s_password']   = $_POST['password'];
    $_SESSION['r_password']   = $_POST['r_password'];

    $error_message            = "";
    $user_email_exist_error   = "";
    $user_login_exist_error   = "";
    $name_length_error        = (strlen(trim($_POST['name'])) != 0) || !isset($_POST['name']) ? "" : "The name field is empty";
    $name_validation_error    = (preg_match("/[a-zа-яёЁ]+$/i", $_POST['name'])) || !isset($_POST['name']) ? "" : "The name must contain only letters";
    $surname_length_error     = (strlen(trim($_POST['surname'])) != 0) || !isset($_POST['surname']) ? "" : "The surname field is empty";
    $surname_validation_error = (preg_match("/[a-zа-яёЁ]+$/i", $_POST['surname'])) || !isset($_POST['surname']) ? "" : "The surname field is empty";
    $login_empty_error        = (strlen(trim($_POST['login'])) != 0) || !isset($_POST['login']) ? "" : "The login field is empty";
    $login_length_error       = ((strlen($_POST['login']) > 4) || !isset($_POST['login'])) ? "" : "The login length must be greater then 4";
    $email_error              = (strlen(trim($_POST['email'])) != 0) || !isset($_POST['email']) ? "" : "The email field is empty";
    $email_validation_error   = (preg_match("/^[_a-zA-Z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $_POST['email']) || !isset($_POST['email'])) ? "" : "The email is not valid";
    $password_length_error    = (strlen(trim($_POST['password'])) != 0) || !isset($_POST['password']) ? "" : "The password field is empty";
    $r_password_length_error  = (strlen(trim($_POST['r_password'])) != 0) || !isset($_POST['r_password']) ? "" : "The password-repeat field is empty";
    $password_error           = $_POST['password'] == $_POST['r_password'] ? "" : "Passwords don't match";

    $name                     = $_POST['name'];
    $surname                  = $_POST['surname'];
    $login                    = $_POST['login'];
    $email                    = $_POST['email'];
    $password                 = $_POST['password'];
    $r_password               = $_POST['r_password'];

    $result                   = $connection->query("SELECT * FROM `user` WHERE user.email = '$email'");
    $user_email_exist_error   = mysqli_num_rows($result) == 0 ? "" : "A user with such an email already exists";

    $result                   = $connection->query("SELECT * FROM `user` WHERE user.login = '$login'");
    $user_login_exist_error   = mysqli_num_rows($result) == 0 ? "" : "A user with such a login already exists";
 
    $error_array              = array($name_length_error, $name_validation_error, 
                                $surname_length_error, $surname_validation_error, 
                                $login_empty_error, $login_length_error,
                                $email_error, $email_validation_error,
                                $password_length_error, $r_password_length_error, $password_error,
                                $user_login_exist_error, $user_email_exist_error);

    $errors_exist             = false;
        
    for ($i = 0; $i < count($error_array); $i++) {
        if (strlen($error_array[$i]) > 0) {
            $errors_exist = true;
            $error_message = $error_array[$i];
            break;
        }
    }

    if (!$errors_exist) {
        $result = $connection->query("INSERT INTO `user` (`name`, `surname`, `login`, `email`, `password`, `user_type`)
            VALUES ('$name', '$surname', '$login', '$email', '$password', '2')");;
        if (isset($_POST['signed'])) {
            setcookie("login", $_POST['login'], time() + 3600);
            setcookie("password", $_POST['password'], time() + 3600);
        } else {
            $_SESSION['login']    = $result['login'];
            $_SESSION['password'] = $result['password'];
        }
        unset($_SESSION['s_login']);
        unset($_SESSION['s_password']);
        unset($_SESSION['signed']);
        unset($_SESSION['name'] );
        unset($_SESSION['surname']);
        unset($_SESSION['email']);
        unset($_SESSION['r_password']);
    
        header("Location: $mainPageLink");
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
                        <input class="register__login" type="text" name="login" value="<?php echo $_SESSION['s_login']; ?>" />
                    </div>
                    <div class="register__field">
                        <span>Email</span>
                        <input class="register__email" type="text" name="email" value="<?php echo $_SESSION['email']; ?>" />         
                    </div>
                    <div class="register__field">
                        <span>Password</span>
                        <input class="register__password" type="text" name="password" value="<?php echo $_SESSION['s_password']; ?>" />
                    </div>
                    <div class="register__field">
                        <span>Repeat password</span>
                        <input class="register__repeat-password" type="text" name="r_password" value="<?php echo $_SESSION['r_password']; ?>" />
                    </div>
                    <label><input type="checkbox" name="signed" <?php if(isset($_SESSION['signed'])) echo "checked"; ?>/><span>Keep me Signed in</span></label>
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