<?php
include "../header.php";

if(isset($_POST['add'])){
    $img = uniqid().'.'.substr($_FILES['img']['type'], 6);
    $change = $core->query("INSERT INTO `specialties`(`name`, `img`) VALUES ('{$_POST['name']}', '$img')");
    move_uploaded_file($_FILES['img']['tmp_name'],"../../img/specialties/".$img);
    header("Location: admin.php");
}


?>
<main>
    <h1 style="margin-top: 120px;">Добавить специализацию</h1>
    <form action="addSpec.php" method="post" class="changedoc" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Название" required>
        <input type="file" name="img" required>
        <button name="add">Добавить</button>
    </form>
</main>


<?php
include "../footer.php";
?>