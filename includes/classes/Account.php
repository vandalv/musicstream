<?php 
class Account{
    private $dbconnect;

    public function __construct($dbconnect){
        $this->dbconnect = $dbconnect;
    }

    public function addAccount($userName, $firstName, $lastName, $email, $password){
        $encryptedPassword = md5($password);
        $profilePicture = "assets/profilePictures/default_profile.jpg";
        $date = date("Y-m-d H:i:s");
        $createdAccount = mysqli_query($this->dbconnect, "INSERT INTO accounts VALUES(NULL, '$userName', '$firstName', '$lastName', '$email', '$encryptedPassword', '$date', '$profilePicture')");
    }

    public function checkIfUsernameExists($username){
        $checkUserName = mysqli_query($this->dbconnect, "SELECT userName FROM accounts WHERE userName = '$username'");
        $result = mysqli_num_rows($checkUserName);
        return $result;
    }

    public function checkIfEmailExists($email){
        $checkEmail = mysqli_query($this->dbconnect, "SELECT email FROM accounts WHERE email = '$email'");
        $result = mysqli_num_rows($checkEmail);
        return $result;
    }
}
?>