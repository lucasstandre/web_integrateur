<?php include_once("inc/header.php"); ?>
<?php include_once("inc/footer.php"); 
$vm = new ServeurManager(PDOFactory::getMySQLConnection());
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Server Slider with Filter</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<header>
    <h1>Votre serveur, notre expertise.</h1>
</header>
  <?php 
  $serveurs = $vm->getServeur();
  $marques_filtre = $vm->getMarque();

  
  ?>

  <div class="slider-container">
    <div class="slider">
      <?php 
      //
      for ($i = 0; $i < count($serveurs); $i++) {
        $serveur = $serveurs[$i];
        $marque = $serveur->get_marque();
        $model = $serveur->get_model();
        $price = $serveur->get_price();
        $imgName = $serveur->get_imgName();
        echo "<div class='slide' data-brand='$marque' data-price='$price'>
        <a href='produit.php?id={$serveur->get_server_id()}'>
        <img src='./img/$imgName' alt='$model'>
        <h3>$model</h3>
        <p>$marque</p>
        <p>Starting at $$price</p>
        </a>
        </div>"; 
      }

      ?>
    </div>
    <button class="nav-btn prev">❮</button>
    <button class="nav-btn next">❯</button>
  </div>

<div class="filter-container">
  <input type="checkbox" id="checkbox">
    <label for="checkbox" class="toggle">
        <div class="bars" id="bar1"></div>
        <div class="bars" id="bar2"></div>
        <div class="bars" id="bar3"></div>
    </label>
        <div class="filter-content hidden">
            <label for="brand">Marque:</label>
            <select id="brand">
                <option value="all">All</option>
                <?php
             foreach ($marques_filtre as $marque) { 
                 echo "<option value='$marque'>$marque</option>";    
              }
                ?>
            </select>
            <label for="min-price">Prix:</label>
            <input type="number" id="min-price" placeholder="MIN">
            <input type="number" id="max-price" placeholder="MAX">
            <button id="filter-btn">Apply Filter</button>
        </div>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>
