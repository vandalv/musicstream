<?php 
include("includes/scripts/register_scr.php");
include("includes/scripts/login_scr.php");
include("includes/classes/ErrorMessages.php");
include("includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
    <title>Mucic Stream</title>
</head>
<body>
<script src="assets/js/pageloader.js"></script>
    <div id="background">
        <div id="formContainer">
            <div id="loginContainer">
                <form id="loginForm" action="registration.php" method="POST">
                    <h2>Log In To Your Account</h2>
                    <label for="logInUsername">Username</label>
                    <input id="logInUsername" name="logInUsername" type="text" required pattern="[\w_]{5,12}" 
                    autocomplete="off" required>
                    <label for="logInPWD">Password</label>
                    <input id="logInPWD" name="logInPWD" type="password" required>
                    <?php if($wronginput == true): ?> 
                    <p>Wrong input.</p>
                    <?php endif; ?>
                    <button type="submit" name="logInBTN">Submit</button>
                    <div class="switchForms">
                        <span id="hideLogin">Don't have an account yet? Sign Up.</span>
                    </div> 
                </form>
                <form id="registrationForm" action="registration.php" method="POST">
                <h2>Create Free Account</h2>
                    <label for="newUsername">Username</label>
                    <input id="newUsername" name="newUsername" type="text" required pattern="[\w_]{5,12}" 
                    oninvalid="setCustomValidity('<?php echo ErrorMassages::$usernameError?>')" oninput="setCustomValidity('')" 
                    autocomplete="off" required>
                    <?php if($badName == true): ?> 
                    <p>This username is already in use.</p>
                    <?php endif; ?>
                    <label for="firstName">First Name</label>
                    <input id="firstName" name="firstName" type="text" required pattern="[a-zA-Z]{2,20}-?`?'?\s?[a-zA-Z]{2,20}" 
                    oninvalid="setCustomValidity('<?php echo ErrorMassages::$firstnameError?>')" oninput="setCustomValidity('')" 
                    autocomplete="off" required>
                    <label for="secondName">Second Name</label>
                    <input id="secondName" name="secondName" type="text" required pattern="[a-zA-Z]{2,20}-?`?'?\s?[a-zA-Z]{2,20}" 
                    oninvalid="setCustomValidity('<?php echo ErrorMassages::$secondnameError?>')" oninput="setCustomValidity('')" 
                    autocomplete="off" required>
                    <label for="email">E-Mail</label>
                    <input id="email" name="email" type="text" required pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" 
                    oninvalid="setCustomValidity('<?php echo ErrorMassages::$emailError?>')" oninput="setCustomValidity('')" 
                    autocomplete="off" required>
                    <?php if($badName == true): ?> 
                    <p>This email is already in use.</p>
                    <?php endif; ?>
                    <label for="registrationPWD">Password</label>
                    <input id="registrationPWD" name="registrationPWD" type="password" 
                        required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
                        oninvalid="setCustomValidity('<?php echo ErrorMassages::$passwordError?>')" oninput="setCustomValidity('')" required>
                    <button type="submit" name="registerBTN">Register</button>
                    <div class="switchForms">
                        <span id="hideRegistration">Already have an account? Log in here.</span>
                    </div> 
                </form>
            </div>
        </div>    
    </div>
</body>
</html>