<?php
include "../header.php";

if(isset($_POST['delete'])){
    $delete = $core->query("DELETE FROM `entry` WHERE `id` = '{$_POST['id']}'");
}


?>

<main>

<div class="board">
    <div class="find">
        <h1>Добро пожаловать в админ-панель</h1>
    </div>
</div>

<div class="panel">
    <div class="header">
        <button onclick="entry()" autofocus>Записи</button>
        <button onclick="doctor()">Врачи</button>
        <button onclick="specialt()">Специализации</button>
        <button onclick="setting()">Настройки сайта</button>
    </div>

    <div class="line"></div>


    <div class="entrys" id="entrys">
        <h1>Записи</h1>
        <?php
        $entrys = $core->query("SELECT * FROM `entry`");
        while($entry = $entrys->fetch_assoc()){
            $users = $core->query("SELECT * FROM `user` WHERE `id` = '{$entry['id_user']}'");
            $user = $users->fetch_assoc();
            $doctors = $core->query("SELECT * FROM `doctors` WHERE `id` = '{$entry['id_doctor']}'");
            $doctor = $doctors->fetch_assoc();
            ?>
                <form action="admin.php" method="post">
                    <input type="hidden" name="id" value="<?= $entry['id']?>">
                    <h3>Имя пациента</h3>
                    <h2><?= $user['name']?></h2>
                    <h3>Имя врача</h3>
                    <h2><?= $doctor['name']?></h2>
                    <h3>Дата и время</h3>
                    <h2><?= $entry['date']." в ".$entry['time'] ?></h2>
                    <button name="delete">Удалить</button>
                </form>
            <?php }?>
    </div>

    <div class="doctors" id="doctors">
    <?php
    $doctors = $core->query("SELECT * FROM `doctors`");
    while($doctor = $doctors->fetch_assoc()){
        $specialties = $core->query("SELECT * FROM `specialties` WHERE `id` = '{$doctor['id_specialties']}'");
        $specialt = $specialties->fetch_assoc();
        ?>
            <div class="doctor">
                <div class="img">
                    <img src="../../img/doctors/<?=$doctor['img']?>" alt="">
                </div>
                <div class="description">
                    <h2><?= $doctor['name']?></h2>
                    <h4>Email</h4>
                    <p><?= $doctor['email']?></p>
                    <h4>Телефон</h4>
                    <p><?= $doctor['phone']?></p>
                    <h4>Специалитет</h4>
                    <p><?= $specialt['name']?></p>
                </div>
                <form action="changedoc.php" style="border: none;" method="post">
                    <input type="hidden" name="id" value="<?= $doctor['id']?>">
                    <button name="changeDoctor">Изменить</button>
                    <button name="deleteDoctor">Уволить</button>
                </form>
            </div>
        <?php }?>
</div>


    <div class="specialties" id="specialties">
    <?php
    $specialties = $core->query("SELECT * FROM `specialties`");
    while($specialt = $specialties->fetch_assoc()){
        ?>
            <form action="changespec.php" name="filter" method="post" class="specialt" style="background-image: url(/img/specialties/<?= $specialt['img']?>)">
                <div class="spec">
                    <input type="hidden" name="id" value="<?= $specialt['id']?>">
                    <p><?= $specialt['name']?></p>
                    <button name="changespec">Изменить</button>
                </div>
            </form>
        <?php
    }
    ?>
    </div>

    <div class="setings" id="setings">
        <a href="addSpec.php">Добавить специализацию</a>
        <a href="addDoc.php">Добавить врача</a>
        <a href="changeAbout.php">Изменить информацию</a>
    </div>

</div>







</main>

<?php
include "../footer.php";
?>