<?php
require_once "../accessoires/header.html";
require_once "../accessoires/nav.html";

session_start();
if (!isset($_SESSION["nom"])) {
    echo "<div id='div2'><a href='../utilisateurs/connexion.php'>Veuillez vous-connecter</a></div>";
} else {
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    @$role=$_SESSION["role"];
    ?>
    <ul id="ul">
    <dl>
    <?php
    if ($role == 1) {
        ?>
        <dt><?php echo "Welcome, rédacteur " . $nom . " " . $prenom . ", veuillez choisir une option"; ?></dt><?php } else { ?>
        <dt><?php echo "Welcome, administrateur " . $nom . " " . $prenom . ", veuillez choisir une option"; ?></dt><?php } ?>
        </dl>
        <li><a href="../Publication/publication.php">Faire une publication</a></li>
        <li><a href="../Publication/modificationA.php">Gérer vos publications</a></li>
        <br>
        <br>
        </ul>

        <?php
        require_once "../accessoires/footer.html";
    }
/**
 * Created by PhpStorm.
 * User: zhaow
 * Date: 2018/2/28
 * Time: 10:10
 */
