<?php include("includes/header.php")?>
<h2 class="pageRec">You might also like:</h2>
<div class="gridContainer">
    <?php 
        $albumQuery = mysqli_query($dbconnect, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");
        while($row = mysqli_fetch_array($albumQuery)){
            echo $row['title'] . "<br>";
        }
    ?>
</div>
<?php include("includes/footer.php")?>