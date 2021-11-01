<?php 
class Song{
    private $dbconnect;
    private $id;

    public function __construct($dbconnect, $id){
        $this->dbconnect = $dbconnect;
        $this->id = $id;
    }

    public function getName(){
        $artistQuery = mysqli_query($this->dbconnect, "SELECT name FROM artists WHERE id='$this->id'");
        $artist = mysqli_fetch_array($artistQuery);
        return $artist['name'];
    }
}
?>