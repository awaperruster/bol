<?php
include "../header.php";


if(isset($_POST['add'])){
    $img = uniqid().'.'.substr($_FILES['img']['type'], 6);
    $change = $core->query("INSERT INTO `doctors`(`name`, `phone`, `email`, `id_specialties`, `img`) VALUES ('{$_POST['name']}', '{$_POST['phone']}','{$_POST['email']}','{$_POST['specialties']}', '$img')");
    move_uploaded_file($_FILES['img']['tmp_name'],"../../img/doctors/".$img);
    header("Location: admin.php");
}
?>
<main>
    <h1 style="margin-top: 120px;">Изменить</h1>
    <form action="addDoc.php" method="post" class="changedoc" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="ФИО">
        <input type="text" name="phone" placeholder="Номер телефона">
        <input type="email" name="email" placeholder="Почта">
        <select name="specialties">
            <?php
            $specialties = $core->query("SELECT * FROM `specialties`");
            while($specialt = $specialties->fetch_assoc()){
                ?>
                    <option value="<?=$specialt['id']?>"><?=$specialt['name']?></option>
                <?php }?>
        </select>
        <input type="file" name="img">
        <button name="add">Изменить</button>
    </form>
</main>


<?php
include "../footer.php";
?>