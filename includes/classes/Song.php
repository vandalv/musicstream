<?php 
class Song{
    private $dbconnect;
    private $id;
    private $data;
    private $title;
    private $artistId;
    private $albumId;
    private $genre;
    private $duration;
    private $path;


    public function __construct($dbconnect, $id){
        $this->dbconnect = $dbconnect;
        $this->id = $id;
        $q = mysqli_query($this->dbconnect, "SELECT * FROM songs WHERE id='$this->id'");
        $this->data = mysqli_fetch_array($q);
        $this->title = $this->data['title'];
        $this->artistId = $this->data['artistId'];
        $this->albumId = $this->data['albumId'];
        $this->genre = $this->data['genre'];
        $this->duration = $this->data['duration'];
        $this->path = $this->data['path'];
    }

    function getTitle(){
        return $this->title;
    }

    function getArtist(){
        return new Artist($this->dbconnect, $this->id);
    }

    function getAlbum(){
        return new Album($this->dbconnect, $this->id);
    }

    function getGenre(){
        return $this->genre;
    }

    function getDuration(){
        return $this->duration;
    }

    function getPath(){
        return $this->path;
    }
}
?>