<?php 
class Artist{
    private $dbconnect;
    private $id;

    public function __construct($dbconnect, $id){
        $this->dbconnect = $dbconnect;
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        $artistQuery = mysqli_query($this->dbconnect, "SELECT name FROM artists WHERE id='$this->id'");
        $artist = mysqli_fetch_array($artistQuery);
        return $artist['name'];
    }

    public function getSongIds(){
        $q = mysqli_query($this->dbconnect, "SELECT * FROM songs WHERE artist='$this->id' ORDER BY plays DESC");
        $albumSongArray = array();
        while($row = mysqli_fetch_array($q)){
            array_push($albumSongArray, $row['id']);
        }
        return $albumSongArray;
    }
}
?>