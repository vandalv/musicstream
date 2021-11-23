<?php 
    include("includes/includedFiles.php");
    $userL = $_SESSION['userLoggedIn'];
?>

<div class="entityInfo">
    <div class="centerSection">
        <div class="useInfo">
            <?php 
            $q = mysqli_query($dbconnect, "SELECT concat(firstName, ' ' ,lastName) AS 'full' FROM accounts WHERE username='$userL'");
            $row = mysqli_fetch_array($q);
            $result = $row['full'];
            ?>
            <h2><?php echo $result; ?></h2>
        </div>
    </div>
</div>