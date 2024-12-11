<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 
include_once("classe/PDOFactory.php");
require_once 'classe/Serveur.php';
require_once 'classe/ServeurManager.php';

$bdd = PDOFactory::getMySQLConnection();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="stylesheet" href="css/styles.css">
    <title>INTEGRATEUR</title>
    <script src="js/script.js" defer></script>
    <script src="js/header.js" defer></script>
    <script src="js/connexion.js" defer></script>
</head>

<body>

<main>
<header class="mobile" id="header">
    <nav>
    <a  href="index.php" class="mobile item"><img src="ressources/dragon.gif" width="60" height="40"></a>
 
    <?php if (isset($_SESSION['user_id'])): ?>
    <a href="traitement.php?action=logout">
        <button class="btnStarted">Se déconnecter</button>
    </a>
<?php else: ?>
    <a href="connexion.php">
        <button class="btnStarted">Get started</button>
    </a>
<?php endif; ?>
    <a id="selectionneMenu" class="mobile"><img src="ressources/menu.webp" width="40" height="40"></a>
</nav>
<div class="mobileHead mobile">
  <div >Integrateur</div>
  <div class="slogan">Votre serveur, notre expertise</div>
</div>
</header>
<div class="mobile-menu hidden" id="menu">
<button class="btn-menuPrev btnMobile hidden"><img src="ressources/arrow.svg" width="40" height="30"></button>
<a href="inventaire.php"><button class="btn-menu1 btnMobile hidden" ><img src="ressources/market.svg" width="100" height="90"> <br>inventaire <br><span style="font-size:20px">voir tous les produits</span> </button></a>
<a href="about.php"><button class="btn-menu2 btnMobile hidden" ><img src="ressources/APROPOS.svg" width="90" height="80"> <br>a propos</button></a>
<a href="comparaison.php"></a><button class="btn-menu3 btnMobile hidden"><img src="ressources/JUDGE.svg" width="90" height="80"> <br>comparer</button></button></a>
<a href="cart.php"></a><button class="btn-menu4 btnMobile hidden" ><img src="ressources/GUY.svg" width="100" height="90"> <br>mon compte <br><span style="font-size:20px">voir votre panier</span> </button></a>
</div>

<header class="PC">
<a  href="index.php" class="PC item"><img src="ressources/dragon.gif" width="30" height="20"></a>
<a>integrateur</a>
<nav>
<a  href="inventaire.php"  class="PC">inventaire</a>
     <a  href="comparaison.php"  class="PC">comparer</a>
     <a  href="index.php"  class="PC">accueil</a>
     <a  href="cart.php"  class="PC">compte</a>
     <a  href="about.php"  class="PC">à propos</a>
     </nav>
     <?php if (isset($_SESSION['user_id'])): ?>
    <a href="traitement.php?action=logout">
        <button class="btnStarted">Se déconnecter</button>
    </a>
<?php else: ?>
    <a href="connexion.php btnStarted">
        <button class="btnStarted">Get started</button>
    </a>
<?php endif; ?>
</header>