<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Constants.php");
    require_once("includes/classes/Account.php");

    $account = new Account($con);

    if(isset($_POST["submitButton"])) {

        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

        $sucess = $account->login($username, $password); 
        
        if($sucess) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
        }
    }

    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SCIENCINE</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
    </head>
    <body>
        <div class="singInConteiner">
            <div class="paper">
                <div class="column">
                    <div class="header">
                        <img src="assets/images/logo.png" title="Netflix Clone" alt="Site Logo" />
                        <h3>Sign in</h3>
                        <span>To continue to ScienCine</span> 
                    </div>
                    <form method="POST" action="">

                    <?php echo $account->getError(Constants::$loginFailed); ?>
                        <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>
                        <input type="password" name="password" placeholder="Password" required>
                        
                        <input type="submit" name="submitButton" value="SUBMIT">
                    </form>
                    <a href="register.php" class="signInMessage">Need an account? Sign up in here!</a>
                </div>
            </div>
        </div>
    </body>
</html>