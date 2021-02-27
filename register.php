<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Constants.php");
    require_once("includes/classes/Account.php");

    $account = new Account($con);

    if(isset($_POST["submitButton"])){
        
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $sucess = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2); 
        
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
                        <h3>Sign up</h3>
                        <span>To continue to ScienCine</span> 
                    </div>

                    <form method="POST" action="">
                        <?php echo $account->getError(Constants::$firstNameCharacter); ?>
                        <input type="text" name="firstName" placeholder="First name"  value="<?php getInputValue("firstName"); ?>"  required>

                        <?php echo $account->getError(Constants::$lastNameCharacter); ?>
                        <input type="text" name="lastName" placeholder="Last name" value="<?php getInputValue("lastName"); ?>" required>

                        <?php echo $account->getError(Constants::$usernameCharacter); ?>
                        <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>

                        <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <input type="email" name="email" placeholder="E-mail" value="<?php getInputValue("email"); ?>" required>
                        <input type="email" name="email2" placeholder="Confirm e-mail" value="<?php getInputValue("email2"); ?>" required>

                        <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
                        <?php echo $account->getError(Constants::$passwordsLength); ?>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="password2" placeholder="Confirm password" required>

                        <input type="submit" name="submitButton" value="SUBMIT">
                    </form>
                    <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>
                </div>
            </div>
        </div>
    </body>
</html>