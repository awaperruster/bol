<?php
include "header.php";

$users = $core->query("SELECT * FROM `user` WHERE `id` = '{$_SESSION['user']['id']}'");
$user = $users->fetch_assoc();
$icons = $core->query("SELECT * FROM `gender` WHERE `id` = '{$user['id_gender']}'");
$icon = $icons->fetch_assoc();
?>

<main>

<div class="board">
    <div class="find">
        <h1>Ваш профиль</h1>
    </div>
</div>


<div class="user">
    <div class="icon">
        <img src="/img/gender/<?= $icon['icon']?>">
    </div>
    <div class="info">
    <h2><?= $user['name']?></h2>
    <h3>Телефон:</h3>
    <h2><?= $user['phone']?></h2>
    <h3>Адрес:</h3>
    <h2><?= $user['address']?></h2>
    <h3>Электронная почта:</h3>
    <h2><?= $user['email']?></h2>
    <h4>Пол: <?= $icon['name']?></h4>
    </div>
</div>


</main>

<?php
include "footer.php";
?>