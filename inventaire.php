<?php include_once("inc/header.php"); ?>
<?php include_once("inc/footer.php"); 
$vm = new ServeurManager(PDOFactory::getMySQLConnection());
$serveurs = $vm->getServeur();
$marques_filtre = $vm->getMarque();
$comparerCookie = isset($_COOKIE['comparer']) ? $_COOKIE['comparer'] : '';
$comparerArray = [];

if ($comparerCookie){
  $comparerArray = json_decode($comparerCookie, true);
  if (!is_array($comparerArray)){
    $comparerArray = [];
  }
}

?>

<!DOCTYPE html>
<div>
    <h1>Votre serveur, notre expertise.</h1>
</div>


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
        $server_id = $serveur->get_server_id();

        if (in_array($server_id, $comparerArray)) {
          $count = count($comparerArray);
          if ($count == 1) {
              $dataContent = "1/2";
          } elseif ($count >= 2) {
              $dataContent = "2/2";
          }
      } 
      else {
          $dataContent = "Ajouter";
      }

        echo "<div class='slide' data-brand='$marque' data-price='$price'>
        <a href='produit.php?id={$serveur->get_server_id()}'>
        <img src='./img/$imgName' alt='$model'>
        <h3>$model</h3>
        <h2>$marque</h2>
        <p>Starting at $price $</p>
        </a>
        </br>
        <button class='button_Inventaire type1 comparer-btn' 
        data-id='$server_id' data-content='$dataContent'>
        </button>
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
            <br>
            <label for="min-price">Prix:</label>
            <br>
            <input type="number" id="min-price" placeholder="MIN">
            <input type="number" id="max-price" placeholder="MAX">
            <button id="filter-btn">Apply Filter</button>
        </div>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>
