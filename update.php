<?php 
    include("includes/includedFiles.php");
    include("includes/classes/ErrorMessages.php");
?>

<?php 
    $un = $_SESSION['userLoggedIn'];
    $q = mysqli_query($dbconnect, "SELECT email FROM accounts WHERE username='$un'");
    $row = mysqli_fetch_array($q);
    $rst = $row['email'];
    ?>

<div class="userInfo">
    <div class="container">
        <h2>EMAIL</h2>
        <input type="text" class="email" placeholder="Update e-mail">
        <br>
        <span class=message></span>
        <p>
        <button class="button2" onclick="updateEmail('email')">Update E-mail</button>
    </div>
    <div class="container"> 
        <h2>PASSWORD</h2>
        <input type="password" class="oldPwd" name="oldPwd" placeholder="Old Password">
        <p>
        <input type="password" class="newPwd1" name="newPwd1" placeholder="New Password">
        <p>
        <input type="password" class="newPwd2" name="newPwd2" placeholder="Confirm Password">
        <br>
        <span class=message></span>
        <p>
        <button class="button2" onclick="updatePassword('oldPwd', 'newPwd1', 'newPwd2')">Update Password</button>
    </div>
</div>