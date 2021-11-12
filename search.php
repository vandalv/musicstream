<?php 
    include("includes/includedFiles.php");
    if(isset($_GET['searchTerm'])){
        $searchTerm = $_GET['searchTerm'];
        echo $searchTerm;
    }
?>