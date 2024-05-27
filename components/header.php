<?php
include "core.php";

if(isset($_POST['reg'])){
    $password = md5($_POST['password']);

    $users =$core->query("SELECT * FROM `user` WHERE `email` = '{$_POST['email']}'");

    if($users->num_rows > 0){
        echo "<script>alert('Электронная почта уже используется')</script>";
    } else {
        $result = $core->query("INSERT INTO user(`name`, `phone`, `address`, `email`, `password`) VALUES ('{$_POST['name']}', '{$_POST['phone']}', '{$_POST['address']}', '{$_POST['email']}', '$password')");
        header("Location: ../index.php");
    }
}

if(isset($_POST['log'])){
    $password = md5($_POST['password']);

    $users = $core->query("SELECT * FROM `user` WHERE `email` = '{$_POST['email']}' AND `password` = '$password'");

    if($users->num_rows >0){
        $user = $users -> fetch_assoc();
        $_SESSION['user']['id'] = $user['id'];
        header("Location: /index.php");
    
    }
     
    else {
        echo "<script>alert('Логин или пароль не совпадают')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Ай, не болит!</title>
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
                <button onclick="openModal1()">Регистрация</button>
            <?php
        } else {
            $users = $core->query("SELECT * FROM `user` WHERE `id` = '{$_SESSION['user']['id']}'");
            $user = $users->fetch_assoc();  
            if($user['admin'] == 1){?>
                <a href="/components/admin/admin.php">Админ-панель</a>
            <?php
            } else {}?>
                <a href="/logout.php">Выход</a>
        <?php }
        ?>
    </div>
</header>

<div class="modal1" id="modal1">
    <div class="reg">
        <button onclick="closeModal1()" class="close">Закрыть</button>
        <form action="/components/header.php" method="post" class="formReg">
            <input type="text" name="name" placeholder="ФИО" required>
            <input type="text" name="phone" placeholder="Номер телефона" required>
            <input type="text" name="address" placeholder="Адрес" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button name="reg">Регистрация</button>
        </form>
        <button onclick="closeModal1(); openModal2()" class="peremoga">Авторизация</button>
    </div>
</div>

<div class="modal2" id="modal2">
    <div class="auth">
        <button onclick="closeModal2()" class="close">Закрыть</button>
        <form action="/components/header.php" method="post" class="formReg">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button name="log">Авторизация</button>
        </form>
        <button onclick="closeModal2(); openModal1()" class="peremoga">Авторизация</button>
    </div>
</div>