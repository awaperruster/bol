<?php
include "components/header.php";

if(isset($_GET['go'])){
    $entry = $core->query("INSERT INTO `entry`(`id_user`, `id_doctor`, `date`, `time`) VALUES ('{$_SESSION['user']['id']}', '{$_GET['id']}', '{$_GET['date']}', '{$_GET['time']}')");
    echo "<script>alert('Вы успешно записаны на прием!')</script>";
}
?>

<main>

<div class="board">
    <div class="find">
        <h1>Наши Врачи!</h1>
    </div>
</div>


<div class="doctors">
    <?php
    $doctors = $core->query("SELECT * FROM `doctors`");
    while($doctor = $doctors->fetch_assoc()){
        $specialties = $core->query("SELECT * FROM `specialties` WHERE `id` = '{$doctor['id_specialties']}'");
        $specialt = $specialties->fetch_assoc();
        ?>
            <div class="doctor">
                <div class="img">
                    <img src="img/doctors/<?=$doctor['img']?>" alt="">
                </div>
                <div class="description">
                    <h2><?= $doctor['name']?></h2>
                    <h4>Email</h4>
                    <p><?= $doctor['email']?></p>
                    <h4>Телефон</h4>
                    <p><?= $doctor['phone']?></p>
                    <h4>Специалитет</h4>
                    <p><?= $specialt['name']?></p>
                <?php if(isset($_SESSION['user'])){ ?>
                        <button name="entry" onclick="openEntry()">Записаться на прием</button>
                <?php }?>
                </div>
            </div>
            <div class="entry" id="entry">
                <form action="doctors.php" method="get" >
                    <h1>Запись на прием:</h1>
                    <input type="hidden" name="id" value="<?= $doctor['id']?>">
                    <h3>Врач</h3>
                    <p><?= $doctor['name']?></p>
                    <label for="date">Выберите дату:</label>
                    <input type="date" name="date">
                    <label for="time">Выберите время:</label>
                    <input type="time" name="time">
                    <button name="go">Записаться</button>
            </form>
</div>
        <?php }?>
</div>




</main>

<?php
include "components/footer.php";
?>




