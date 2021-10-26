<?php   
include("includes/classes/Account.php");
include("includes/config.php");
$account = new Account($dbconnect);

$badName = false;
$badEmail = false;

function nameOrSurnameCheck($value){
    $value = strip_tags($value);
    $value = ucwords(strtolower($value));
    foreach (array('-', '\'', '`') as $parameters1) {
        if (strpos($value, $parameters1)!==false) {
        $value =implode($parameters1, array_map('ucfirst', explode($parameters1, $value)));
        }
        }
    return $value;
}

function stripValues($value){
    $value = strip_tags($value);
    return $value;
}

if(isset($_POST['registerBTN'])){
$newUsername = stripValues($_POST['newUsername']);
$firstName = nameOrSurnameCheck($_POST['firstName']);
$secondName = nameOrSurnameCheck($_POST['secondName']);
$email = stripValues($_POST['email']);
$registrationPWD = stripValues($_POST['registrationPWD']);
if($account->checkIfUsernameExists($newUsername) != 0){
    $badName = true;
}
if($account->checkIfEmailExists($email) != 0){
    $badEmail = true;
}
else{
    $account->addAccount($newUsername, $firstName, $secondName, $email, $registrationPWD);
    $_SESSION['userLoggedIn'] = $newUsername;
}
}
?>