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
            <form action="components/user/filter.php" name="filter" method="post" class="specialt" style="background-image: url(/img/specialties/<?= $specialt['img']?>)">
                <div class="spec">
                    <input type="hidden" name="id" value="<?= $specialt['id']?>">
                    <p><?= $specialt['name']?></p>
                    <button name="search">Найти доктора</button>
                </div>
            </form>
        <?php
    }
    ?>
</div>


</main>

<?php
include "components/footer.php";
?>