<?php 
$wronginput = false;

if(isset($_POST['logInBTN'])){
$logInUsername = $_POST['logInUsername'];
$logInPWD = $_POST['logInPWD'];
$md5Password = md5($logInPWD);
$checkQuery = mysqli_query($dbconnect, "SELECT userName FROM accounts WHERE userName='$logInUsername' AND password='$md5Password'");
$resultSearch = mysqli_num_rows($checkQuery);
if($resultSearch != 1){
    session_destroy();
    $wronginput = true;
}
else{
    $_SESSION['userLoggedIn'] = $logInUsername;
    header("Location:index.php");
}
}
?>