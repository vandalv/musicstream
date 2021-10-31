<?php include("includes/header.php")?>
<h2 class="pageRec">Here are our recommendations for you:</h2>
<div class="gridContainer">
    <?php 
        $albumQuery = mysqli_query($dbconnect, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");
        while($row = mysqli_fetch_array($albumQuery)){
            echo "<div class='itemViewer'>
            <a href='album.php?id=" . $row['id'] . "'>
                <img src='{$row['artworkPath']}'>              
                <div class='infoViewer'>                  
                    {$row['title']}              
                </div> 
            </a>
            </div>";
        }
    ?>
</div>
<?php include("includes/footer.php")?>