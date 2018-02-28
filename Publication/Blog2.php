<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../accessoires/style.css">
</head>

<body>
<?php
require_once "../accessoires/header.html";
require_once "../accessoires/nav.html";
?>

<section>
    <p id="div3"><a href="modificationA.php">Voir mes publications</a></p>
    <div class="div">
        <div class="img1">
            <img width="200" height="150" src="../accessoires/images.jpg" alt="scene"></img>
            <h5 class="h">Ma première publication</h5>

            <p class="p">Lorem ipsum delor sit amet, consectetur.....</p></div>


        <div class="img2">
            <img class="img" width="200" height="150" src="../accessoires/images.jpg" alt="scene"></img>
            <h5>Ma deuxième publication</h5>
            <p class="p">Lorem ipsum delor sit amet, consectetur.....</p></div>


        <div class="img3">
            <img class="img" width="200" height="150" src="../accessoires/images.jpg" alt="scene"></img>
            <h5>Ma troisième publication</h5>
            <p class="p">Lorem ipsum delor sit amet, consectetur.....</p></div>
    </div>

    <?php
    require_once "../accessoires/footer.html";
    ?>
</section>

</body>
</html>
