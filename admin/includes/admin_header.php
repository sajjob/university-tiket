<?php include "../includes/db.php" ?>

<?php session_start(); ?>


<?php 

if(!isset($_SESSION['user_role'])) {
        header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>admin</title>
</head>
<body>
    <header id="s-header" class="s-header">

        <div class="h-title">
            <div class='start-message'>
            <h3> <?php echo $_SESSION['user_role']; ?> گرامی  <?php echo $_SESSION['firstname'] .' '. 
                $_SESSION['lastname']; ?> خوش آمدید</h3>
            <h2>
            <small style="color:maroon;">نام کاربری : <?php echo $_SESSION['username']; ?></small>
    
        
    
            </h2>
            </div>
        </div>
    </header>