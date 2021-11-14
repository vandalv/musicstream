<?php 
class Playlist{
    private $dbconnect;
    private $id;
    private $name;
    private $owner;

    public function __construct($dbconnect, $data){
        $this->dbconnect = $dbconnect;
        $this->id = $data;
    }

    public function getName(){
        return $this->name;
    }

}
?>