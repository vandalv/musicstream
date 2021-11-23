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

}
?>