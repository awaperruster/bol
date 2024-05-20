<?php
include "components/header.php";
?>

<main>

<div class="board">
    <div class="find">
        <h1>Добро пожаловать!</h1>
        <a href="doctors.php">Найти доктора</a>
    </div>
</div>



<h1>Медицинские специальности</h1>

<div class="line"></div>

<div class="specialties">
    <?php
    $specialties = $core->query("SELECT * FROM `specialties`");
    while($specialt = $specialties->fetch_assoc()){
        ?>
            <div class="specialt">
                <p><?= $specialt['name']?></p>
                <a href="doctors.php">Найти доктора</a>
            </div>
        <?php
    }
    ?>
</div>


</main>

<?php
include "components/footer.php";
?>