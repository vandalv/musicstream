<?php 
    include("../config.php");
    if(!isset($_POST['username'])){
        echo "ERROR: NO USER SET";
        exit();
    }
    if(isset($_POST['email']) && $_POST['email'] != ""){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $emailCheck = mysqli_query($dbconnect, "SELECT email FROM accounts WHERE email='$email' AND username != '$username'");
        if(mysqli_num_rows($emailCheck) > 0){
            echo "Email Is Already In Use";
            exit();
        }
        $q = mysqli_query($dbconnect, "UPDATE accounts SET email = '$email' WHERE username = '$username'");
        echo "Update Was Sucessfull";
    }
    else{
        echo "You Must Provide An Email";
    }
?>