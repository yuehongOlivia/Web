<?php
require_once "../accessoires/header.html";
require_once "../accessoires/nav.html";
session_start();
if (session_destroy()) {
 echo "<p id='div2'>Vous etes deconnecte!!</p>";
}
require_once "../accessoires/footer.html";
/**
 * Created by PhpStorm.
 * User: zhaow
 * Date: 2018/2/28
 * Time: 13:29
 */