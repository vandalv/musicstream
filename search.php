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
    <input type="text" class="searchInput" onchange='val' id="searchI" required value="<?php echo $searchTerm;?>">
    <label for="sin" class="form__label">Search For Artist, Album Or Playlist:</label>
</div>

<script>
    var timer;
    var val;
    $(".searchInput").keyup(function(){
        clearTimeout(timer);

        timer = setTimeout(function(){
            val = $(".searchInput").val();
            openPage("search.php?searchTetm=" + val);
        }, 2000);
    })
    $(".searchInput").val(val);
</script>