<?php 
class Artist{
    private $dbconnect;
    private $id;
    private $name;

    public function __construct($dbconnect, $id, $name){
        $this->dbconnect = $dbconnect;
        $this->id = $id;
        $this->name = $name;
    }
}
?>