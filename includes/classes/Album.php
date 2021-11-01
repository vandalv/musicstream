<?php

use Artist as GlobalArtist;

class Artist{
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
}
?>