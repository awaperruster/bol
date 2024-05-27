<?php
include "../header.php";


if(isset($_POST['deleteDoctor'])){
    $delete = $core->query("DELETE FROM `doctors` WHERE `id` = '{$_POST['id']}'");
    header("Location: admin.php");
}

if(isset($_POST['changeDoctor'])){
    $doctors = $core->query("SELECT * FROM `doctors` WHERE `id` = '{$_POST['id']}'");
    $doctor = $doctors->fetch_assoc();
}

if(isset($_POST['change'])){
    $img = uniqid().'.'.substr($_FILES['img']['type'], 6);
    $change = $core->query("UPDATE `doctors` SET `name` = '{$_POST['name']}', `phone` = '{$_POST['phone']}', `email` = '{$_POST['email']}', `id_specialties` = '{$_POST['specialties']}', `img` = '$img' WHERE `id` = '{$_POST['id']}'");
    move_uploaded_file($_FILES['img']['tmp_name'],"../../img/doctors/".$img);
    header("Location: admin.php");
}
?>
<main>
    <h1 style="margin-top: 120px;">Изменить</h1>
    <form action="changedoc.php" method="post" class="changedoc" enctype="multipart/form-data">
        <div class="img">
            <img src="/img/doctors/<?=$doctor['img']?>">
        </div>
        <input type="hidden" name="id" value="<?=$doctor['id']?>">
        <input type="text" value="<?=$doctor['name']?>" name="name">
        <input type="text" value="<?=$doctor['phone']?>" name="phone">
        <input type="email" value="<?=$doctor['email']?>" name="email">
        <select name="specialties">
            <?php
            $specialties = $core->query("SELECT * FROM `specialties`");
            while($specialt = $specialties->fetch_assoc()){
                ?>
                    <option value="<?=$specialt['id']?>"><?=$specialt['name']?></option>
                <?php }?>
        </select>
        <input type="file" name="img">
        <button name="change">Изменить</button>
    </form>
</main>


<?php
include "../footer.php";
?>