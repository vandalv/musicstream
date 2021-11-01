<?php 
class Artist{
    private $dbconnect;
    private $id;

    public function __construct($dbconnect, $id){
        $this->dbconnect = $dbconnect;
        $this->id = $id;
    }

    public function getTitle(){
        $query = mysqli_query($this->dbconnect, "SELECT title FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($query);
        return $album['title'];
    }
}
?>