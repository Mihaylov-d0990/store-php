<?php 
    require_once "head.php";
    $dividingTitle = "Email";
    require_once "dividingTitle.php";
?>
<div class="login">
    <div class="container">
        <div class="login__content">
            <div class="login__email"></div>
            <div class="login__form">
                <form>
                    <div class="login__input">
                        <span>Email</span>
                        <input type="text" />
                    </div>
                    <div class="login__input">
                        <span>Password</span>
                        <input type="text" />
                    </div>
                    <label><input type="checkbox" /><span>Keep me Signed in</span></label>
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