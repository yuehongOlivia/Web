<?php
require_once "../accessoires/header.html";
require_once "../accessoires/nav.html";
?>

<?php
session_start();
if ((!isset($_SESSION['email'])) && (!isset($_SESSION['password']))) {
    echo "<div id='div2'><a href='../utilisateurs/connexion.php'>Veuillez vous-connecter</a></div>";
} else {
    ?>
    <div id='div2'>
        <form name="formAjout" action="" method="post">
            <h5>Ajout article</h5>
            <table id="table2">
                <tr>
                    <td><input placeholder="Ajouter lien de l'image" size="100" type="text" name="image"></td>
                </tr>
                <tr></tr>
                <tr>
                    <td><input placeholder="Titre" type="text" size="100" name="titre"></td>
                </tr>
                <tr></tr>
                <tr>
                    <td><textarea row="60" cols="80" name="description" form="formAjout">Description...</textarea></td>
                </tr>
                <tr></tr>
                <tr>
                    <td><input type="submit" value="Ajouter article"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    $email = $_SESSION['email'];
    if ((isset($_POST["titre"])) && (!empty($_POST["titre"]))) {
        echo "Veuillez remplir le formualaire pour ajouter un article";
    }
    if (isset($_POST["titre"]) && (!empty($_POST["titre"]))) {
        $servername = "localhost";
        $username = "root";
        $password = "Ab882685";
        $bdd = "utilisateurs";
        $conn = new mysqli($servername, $username, $password, $bdd);
        if ($conn->connect_error) {
            die("connexion échouée" . $conn->connect_error);
        } else {
            echo "<p id='notice'>Connecté au serveur $servername,à la base $bdd</p>";
            $image = htmlspecialchars($_POST["image"]);
            $titre = htmlspecialchars($_POST["titre"]);
            $description = htmlspecialchars($_POST["description"]);
            $login = htmlspecialchars($_SESSION["email"]);
            $sql1 = "insert into publication(login,titre,image,corp) VALUES ('$login','$titre','$image','$description')";
            $result = $conn->query($sql1);
            if (!$result) {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            } else {
                header('Location: ../Publication/modification.php');
            }
            $conn->close();
        }
    }
}
?>

<?php
require_once "../accessoires/footer.html";
/**
 * Created by PhpStorm.
 * User: zhaow
 * Date: 2018/2/28
 * Time: 10:23
 */
?>