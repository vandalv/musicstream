<?php 
    include("../config.php");
    if(!isset($_POST['username'])){
        echo "ERROR: NO USER SET";
        exit();
    }
    if(!isset($_POST['oldPassword']) || !isset($_POST['newPassword1']) || !isset($_POST['newPassword2'])){
        echo "No Passwords Set";
        exit();
    }
    if($_POST['oldPassword'] == "" || $_POST['newPassword1'] == "" || $_POST['newPassword2'] == ""){
        echo "Not All Fillds Were Filled";
        exit();
    }
    $username = $_POST['username'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword1 = $_POST['newPassword1'];
    $newPassword2 = $_POST['newPassword2'];

    $oldMD5 = md5($oldPassword);
    $pCheck = mysqli_query($dbconnect, "SELECT * FROM accounts WHERE username='username' AND password='$oldMD5'");
    if(mysqli_num_rows($pCheck) != 1){
        echo "Old Password Incorrect";
        exit();
    }
    if($newPassword1 != $newPassword2){
        echo "Passwords Do Not Match";
        exit();
    }
    preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$", $newPassword1, $matchesP);
        if ($matchesP){
            $q = mysqli_query($dbconnect, "UPDATE accounts SET password = '$newPassword1' WHERE username = '$username'");
            echo "Update Was Sucessfull";
        }
?>