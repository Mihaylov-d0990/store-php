<?php 
    require_once "head.php"; 
    $dividingTitle = "Register";
    require_once "dividingTitle.php"
?>
<div class="register">
    <div class="container">
        <div class="register__content">
            <div class="register__form">
                <form>
                    <div class="register__field">
                        <span>Name</span>
                        <input class="register__name" type="text" />
                    </div>
                    <div class="register__field">
                        <span>Surname</span>
                        <input class="register__surname" type="text" />
                    </div>
                    <div class="register__field">
                        <span>Email</span>
                        <input class="register__email" type="text" />         
                    </div>
                    <div class="register__field">
                        <span>Password</span>
                        <input class="register__password" type="text" />
                    </div>
                    <div class="register__field">
                        <span>Repeat password</span>
                        <input class="register__repeat-password" type="text" />
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