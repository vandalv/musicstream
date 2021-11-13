<?php 
    include("includes/includedFiles.php");
    if(isset($_GET['searchTerm'])){
        $searchTerm = urldecode($_GET['searchTerm']);
    }
    else{
        $searchTerm = "";
    }
?>

<div class="searchContainer">
    <input type="text" class="searchInput" placeholder="sin" name="sin" id='sin' required value="<?php echo $searchTerm;?>">
    <label for="sin" class="form__label">Search For Artist, Album Or Playlist:</label>
</div>