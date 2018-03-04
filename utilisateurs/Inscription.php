<?php
require_once "../accessoires/header.html";
require_once "../accessoires/nav.html";
?>


<div id="div">
    <form id="form" action="" method="post">
        <table id="table">
            <tr>
                <td>Email:</td>
                <td><input placeholder="email" type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mot de passe:</td>
                <td><input placeholder="password" type="password" name="password"></td>
            </tr>
            <tr>
                <td>Nom:</td>
                <td><input placeholder="nom" type="text" name="nom"></td>
            </tr>
            <tr>
                <td>Prenom:</td>
                <td><input placeholder="prenom" type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>Genre:</td>
                <td><input type="radio" name="sex" value="male" checked>Homme</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="radio" name="sex" value="female">Femme</td>
            </tr>
            <tr>
                <td><input type="submit" value="Créer un compte"></td>
            </tr>
        </table>
    </form>
</div>

<?php

$options = [
    'salt' => uniqid(mt_rand(), true), //write your own code to generate a suitable salt
    'cost' => 12 // the default cost is 10
];
if ((isset($_POST["login"])) && (!empty($_POST["login"]))) {
    echo "Veuillez remplir le formulaire pour s'inscrire";
}
if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
    $servername = "localhost";
    $username = "root";
    $password = "Ab882685";
    $bdd = "utilisateurs";
    $conn = new mysqli($servername, $username, $password, $bdd);
    if ($conn->connect_error) {
        die("connexion échouée" . $conn->connect_error);
    } else {
        echo "<p id='notice'>Connecté au serveur $servername,à la base $bdd</p>";
        $email = htmlspecialchars($_POST["email"]);
        $pwd = htmlspecialchars($_POST["password"]);
        $hash = password_hash($pwd, PASSWORD_DEFAULT, $options);
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $genre = htmlspecialchars($_POST["sex"]);
        $role = 1;
        $sql1 = "insert into utilisateur(email,pwd,nom,prenom,genre,role) VALUES ('$email','$hash','$nom','$prenom','$genre',$role)";
        $result = $conn->query($sql1);
        if (!$result) {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        } else {
            header('Location: ../utilisateurs/connexion.php');
        }
        $conn->close();
    }
}
?>

<?php require_once "../accessoires/footer.html";

/**
 * Created by PhpStorm.
 * User: zhaow
 * Date: 2018/2/2
 * Time: 15:48
 */
?>

