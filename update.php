<?php 
    include("includes/includedFiles.php");
?>

<?php 
    $q = mysqli_query($dbconnect, "SELECT concat(firstName, ' ' ,lastName) AS 'full' FROM accounts WHERE username='$userL'");
    $row = mysqli_fetch_array($q);
    $result = $row['full'];
    ?>
    <h2><?php echo $result; ?></h2>

<div class="userInfo">
    <div class="container border">
        <h2>EMAIL</h2>
        <input type="text" class="email" placeholder="Update e-mail" value="echo $userLoggedIn->getEmail();">
    </div>
    <div class="container">
        <h2>PASSWORD</h2>
    </div>
</div>