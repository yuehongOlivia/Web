<?php
require_once "../accessoires/header.html";
require_once "../accessoires/nav.html";
session_start();
$idPubli=$_GET['name'];
$conn = mysqli_connect('localhost','root','Ab882685','utilisateurs');
$res = mysqli_query($conn,"select * from publication where idPubli =  '$idPubli' ");
$row = mysqli_fetch_assoc($res);
$titre=$row['titre'];
$image=$row['image'];
$corp=$row['corp'];

    ?>
    <form action="" method="post">
    <h5>Modifier article</h5>
    <table id="table2">
        <tr>
            <td><input placeholder="Changer lien de l'image" size="100" type="text" name="image2"
                       value="<?php echo $image ?>"></td>
        </tr>
        <tr></tr>
        <tr>
            <td><input placeholder="Changer le titre" type="text" size="100" name="titre2" value="<?php echo $titre ?>">
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td><textarea row="60" cols="80" name="corp2" form="formAjout"><?php echo $corp ?></textarea></td>
        </tr>
        <tr></tr>
        <tr>
            <td><input type="submit" value="Modifier article"></td>
        </tr>
    </table>
    <?php

if (isset($_POST["titre2"]) && (!empty($_POST["titre2"]))) {
    $titre2=$_POST["titre2"];
    $image2=$_POST["image2"];
    $corp2=$_POST["corp2"];
    $conn = mysqli_connect('localhost', 'root', 'Ab882685', 'utilisateurs');
    $change=mysqli_query($conn,"update publication set titre='$titre2',image='$image2',corp='$corp2' where idPubli='$idPubli'");
    $result = $conn->query($change);
        header('Location: ../Publication/modificationA.php');
}

/**
 * Created by PhpStorm.
 * User: zhaow
 * Date: 2018/3/4
 * Time: 11:17
 */