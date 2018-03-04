<?php
require_once "../accessoires/header.html";
require_once "../accessoires/nav.html";
session_start();
if ((!isset($_SESSION['email'])) && (!isset($_SESSION['password']))) {
    echo "<div id='div2'><a href='../utilisateurs/connexion.php'>Veuillez vous-connecter</a></div>";
} else {
$email = $_SESSION['email'];
$titles = array();
@$role = $_SESSION["role"];
//obtenir $titles depuis le tableau de double dimension
$i = 0;
//connexion BdD
$conn = mysqli_connect('localhost', 'root', 'Ab882685', 'utilisateurs');
$res = mysqli_query($conn, "select * from publication where login =  '$email'");
//Mettre les articles dans le tableau dans chaque case
//Information sur la publication
while ($row = mysqli_fetch_assoc($res)) {
    $titles[$i]['idPubli'] = $row['idPubli'];
    $titles[$i]['titre'] = $row['titre'];
    $titles[$i]['datePubli'] = $row['datePubli'];
    $i++;
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../accessoires/style.css">
</head>
<html>
<body>
<?php
//afficher les articles, et ajouter l'option modifier
echo "<table id='table3'>";

foreach ($titles as $value) {
    if ($role == 1) {
        echo "<tr><td>" . $value['titre'] . "</td>" . "<td>" . $value['datePubli'] . "</td> " . "<td><a href=../Publication/modification.php?name=" . $value['idPubli'] . ">Modifier</a></td>" . "<td><a href=../Publication/suppression.php?name=" . $value['idPubli'] . ">Supprimer</a></td></tr>";
    } else {
        echo "<tr><td>" . $value['titre'] . "</td>" . "<td>" . $value['datePubli'] . "</td> " . "<td><a href=../Publication/modification.php?name=" . $value['idPubli'] . ">Modifier</a></td>";
    }
}
echo "</table>";
require_once "../accessoires/footer.html";
}
?>
</body>
</html>
