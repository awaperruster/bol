<?php
include "../header.php";

$abouts = $core->query("SELECT * FROM `about` WHERE `id` = '1'");
$about = $abouts->fetch_assoc();

if(isset($_POST['change'])){
    $change = $core->query("UPDATE `about` SET `about` = '{$_POST['about']}' WHERE `id` = '{$_POST['id']}'");
    header("Location: admin.php");
}

?>
<main>
    <div class="board">
        <div class="find">
            <h1>О нас</h1>
        </div>
    </div>

    <form action="changeAbout.php" method="post" class="about">
        <input type="hidden" value="<?= $about['id']?>" name="id">
        <textarea name="about"><?= $about['about']?></textarea>
        <button name="change">Изменить</button>
    </form>
</main>


<?php
include "../footer.php";
?>