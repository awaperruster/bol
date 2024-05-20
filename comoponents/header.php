<?php
include "/components/core.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header>
    <div class="logo"></div>
    <div class="buttons">
        <a href="/index.php">Главная</a>
        <a href="/doctors.php">Врачи</a>
        <a href="/about.php">О нас</a>
        <?php
        if(!isset($_SESSION['user'])){
            ?>

            <?php
        } else { ?>
                <a href="/about.php">user</a>
        <?php }
        
        ?>
    </div>
</header>