<?php 
class Playlist{
    private $dbconnect;
    private $id;
    private $name;
    private $owner;

    public function __construct($dbconnect, $data){

        if(!is_array($data)){
            $query = mysqli_query($dbconnect, "SELECT * FROM playlists WHERE id='$data'");
            $data = mysqli_fetch_array($query);
        }

        $this->dbconnect = $dbconnect;
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->owner = $data['owner'];
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getOwner(){
        return $this->owner;
    }

    public function numberOfSongs(){
        $q = mysqli_query($this->dbconnect, "SELECT id FROM playlistsongs WHERE playlistID='$this->id'");
        return mysqli_num_rows($q);
    }

    public function getSongId(){
        $q = mysqli_query($this->dbconnect, "SELECT songId FROM playlistsongs WHERE playlistId='$this->id' ORDER BY playlistOrder");
        $albumSongArray = array();
        while($row = mysqli_fetch_array($q)){
            array_push($albumSongArray, $row['songId']);
        }
        return $albumSongArray;
    }

}
?>