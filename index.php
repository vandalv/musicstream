
<?php
include("includes/config.php");
if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else{
    header('Location: registration.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Mucic Stream</title>
</head>
<body>
    <div id="mainContainer">
        <div id="topContainer">
            <?php include("includes/navBarContainer.php")?>
        </div>
        <?php include("includes/playerBarContainer.php")?>  
    </div>
</body>
</html>