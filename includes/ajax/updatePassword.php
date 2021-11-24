<?php 
    include("../config.php");
    if(!isset($_POST['username'])){
        echo "ERROR: NO USER SET";
        exit();
    }
    if(!isset($_POST['oldPwd']) || !isset($_POST['newPwd1']) || !isset($_POST['newPwd2'])){
        echo "No Passwords Set";
        exit();
    }
    if($_POST['oldPwd'] == "" || $_POST['newPwd1'] == "" || $_POST['newPwd2'] == ""){
        echo "Not All Fillds Were Filled";
        exit();
    }
    $username = $_POST['username'];
    $oldPassword = $_POST['oldPwd'];
    $newPassword1 = $_POST['newPwd1'];
    $newPassword2 = $_POST['newPwd2'];

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
            $mdpass = md5($newPassword1);
            $q = mysqli_query($dbconnect, "UPDATE accounts SET password = '$mdpass' WHERE username = '$username'");
            echo "Update Was Sucessfull";
?>