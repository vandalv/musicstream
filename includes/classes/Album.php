<?php
class Album{
    private $dbconnect;
    private $id;
    private $title;
    private $artistId;
    private $genreId;
    private $artworkPath;

    public function __construct($dbconnect, $id){
        $this->dbconnect = $dbconnect;
        $this->id = $id;

        $query = mysqli_query($this->dbconnect, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($query);

        $this->title = $album['title'];
        $this->artistId = $album['artist'];
        $this->genreId = $album['genre'];
        $this->artworkPath = $album['artworkPath'];
    }

    public function getTitle(){
        return $this->title;
    }

    public function getArtist(){
        return new Artist($this->dbconnect, $this->artistId);
    }

    public function getGenreId(){
        return $this->genreId;
    }

    public function artworkPath(){
        return $this->artworkPath;
    }

    public function numberOfSongs(){
        $q = mysqli_query($this->dbconnect, "SELECT * FROM songs WHERE album='$this->id'");
        return mysqli_num_rows($q);
    }

    public function getSongId(){
        $q = mysqli_query($this->dbconnect, "SELECT * FROM songs WHERE album='$this->id' ORDER BY albumOrder ASC");
        $albumSongArray = array();
        while($row = mysqli_fetch_array($q)){
            array_push($albumSongArray, $row['id']);
        }
        return $albumSongArray;
    }
}
?>