<?php
include "../header.php";

if(isset($_POST['delete'])){
    $delete = $core->query("DELETE FROM `specialties` WHERE `id` = '{$_POST['id']}'");
    header("Location: admin.php");
}


if(isset($_POST['changespec'])){
    $specialties = $core->query("SELECT * FROM `specialties` WHERE `id` = '{$_POST['id']}'");
    $specialt = $specialties->fetch_assoc();
}

if(isset($_POST['change'])){
    $img = uniqid().'.'.substr($_FILES['img']['type'], 6);
    $change = $core->query("UPDATE `specialties` SET `name` = '{$_POST['name']}', `img` = '$img' WHERE `id` = '{$_POST['id']}'");
    move_uploaded_file($_FILES['img']['tmp_name'],"../../img/specialties/".$img);
    header("Location: admin.php");
}
?>
<main>
    <h1 style="margin-top: 120px;">Изменить</h1>
    <form action="changespec.php" method="post" class="changedoc" enctype="multipart/form-data">
        <div class="img">
            <img src="/img/specialties/<?=$specialt['img']?>">
        </div>
        <input type="hidden" name="id" value="<?=$specialt['id']?>">
        <input type="text" value="<?=$specialt['name']?>" name="name">
        <input type="file" name="img">
        <button name="change">Изменить</button>
        <button name="delete">Удалить</button>
    </form>
</main>


<?php
include "../footer.php";
?>