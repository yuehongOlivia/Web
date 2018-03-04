<?php
require_once "../accessoires/header.html";
require_once "../accessoires/nav.html";
session_start();
$idPubli = $_GET['name'];
echo "article " . $idPubli;
$conn = mysqli_connect('localhost', 'root', 'Ab882685', 'utilisateurs');
$res1 = mysqli_query($conn, "delete from publication where idPubli =  '$idPubli' ");
header('Location: ../Publication/modificationA.php');


require_once "../accessoires/footer.html";
/**
 * Created by PhpStorm.
 * User: zhaow
 * Date: 2018/3/4
 * Time: 12:18
 */