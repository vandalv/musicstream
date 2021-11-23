<?php 
class User{
    private $dbconnect;
    private $username;

    public function __construct($dbconnect, $username){
        $this->dbconnect = $dbconnect;
        $this->usename = $username;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getFLName(){
        $q = mysqli_query($this->dbconnect, "SELECT * FROM users WHERE username='$this->username'");
    }

}
?>