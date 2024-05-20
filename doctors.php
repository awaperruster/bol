<?php
include "components/header.php";
?>

<main>

<div class="board">
    <div class="find">
        <h1>Наши Дрочи!</h1>
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
                    <h3>Имя</h3>
                    <h2><?= $doctor['name']?></h2>
                    <h4>Email</h4>
                    <p><?= $doctor['email']?></p>
                    <h4>Телефон</h4>
                    <p><?= $doctor['phone']?></p>
                    <h4>Специалитет</h4>
                    <p><?= $specialt['name']?></p>
                </div>
            </div>
        <?php }?>
</div>


</main>

<?php
include "components/footer.php";
?>