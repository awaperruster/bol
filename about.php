<?php
include "components/header.php"; ?>

<main>

<div class="board">
    <div class="find">
        <h1>Информация о нас!</h1>
    </div>

</div>
<div class="aboutpage">
        <?php
        $abouts = $core->query("SELECT * FROM `about`");
        $about = $abouts->fetch_assoc();
        ?>
        <p><?=$about['about']?></p>
    </div>
</main>

<?php
include "footer.php";
?>