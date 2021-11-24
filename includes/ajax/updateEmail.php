<?php 
    include("../config.php");
    if(!isset($_POST['username'])){
        echo "ERROR: NO USER SET";
        exit();
    }
    if(isset($_POST['email']) && $_POST['email'] != ""){
        echo "Email Set";
    }
    else{
        echo "You Must Provide An Email";
    }
?>