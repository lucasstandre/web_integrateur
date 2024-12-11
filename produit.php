<?php
include_once("inc/header.php");
$vm = new ServeurManager(PDOFactory::getMySQLConnection());

$serveur_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$serveur = $vm->getServeurById($serveur_id);

// si serveur est vide sacre le user dans inventaire
if (!$serveur) {
    header('Location: inventaire.php');
    exit();
}
$base_price = $serveur->get_price();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $serveur->get_model() ?> - Details</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="./js/script_produit.js" defer></script>

</head>
<body>
    <div class="product-container">
        <div class="product-image">
            <img src="./img/<?= $serveur->get_imgName() ?>" alt="<?= $serveur->get_model() ?>">

        <div id="imgram" >
            <img src="./img/ram.png" alt="RAM" id="ramImg" class="ImgRam">
        </div>
        </div>
        <div class="product-info">
            <h1><?= $serveur->get_model() ?></h1>
            <h2><?= $serveur->get_marque() ?></h2>
            <div class="price">Commence a
                <span id="base-price" 
                data-value="<?= $serveur->get_price()?>" 
                data-id="<?= $serveur->get_server_id()?>" 
                data-model="<?= $serveur->get_model()?>">
                <?= $serveur->get_price() ?></span>
                $
            </div>
            
            <div class="configurator">
                <h3>Configuration du serveur</h3>

                 
                <div class="config-item">
                    <label for="ram">RAM:</label>
                    <button type="button" id="ram-decrease">-</button>
                    <span id="ram-value">
                        <?= $serveur->get_RAM_capacity() * $serveur->get_RAMCount()?>
                        GB</span>
                    <button type="button" id="ram-increase">+</button>
                </div>

               
                <div class="config-item">
                    <label for="storage">Storage:</label>
                    <button type="button" id="storage-decrease">-</button>
                    <span id="storage-value">
                    <?= $serveur->get_storage_capacity() * $serveur->get_storageCount()?>
                    GB</span>
                    <button type="button" id="storage-increase">+</button>
                </div>

                <div class="config-item">
                    <label for="cpu">CPU:</label>
                    <button type="button" id="cpu-decrease">-</button>
                    <span id="cpu-value"><?=$serveur->get_CPUCount()?>x</span>
                    <button type="button" id="cpu-increase">+</button>
                </div>
            </div>
            <div class ="CPU">
                <h3>CPU</h3>
                <p>Marque: <?= $serveur->get_CPU_brand() ?></p>
                <p>Model: <?= $serveur->get_CPU_model() ?></p>
                <p>Base Clock Speed: <?= $serveur->get_CPU_baseClockSpeed() ?> GHz</p>
            </div>
                <div class="description">
                <h3>Description</h3>
                <p>A server that is used as a <?= $serveur->get_formFactor()?> with <?= $serveur->get_RAM_frequency()?>Hz of ram speed and a <?= $serveur->get_storage_type()?> storage. <?= $serveur->get_description() ?></p>
                </div>
               
            <div class="total-price">
                Prix Total:<span id="total-price"><?= $base_price?> </span>
                $
            </div>

            <button onclick="addToCart()" class="add-to-cart">Add to Cart</button>

</body>
</html>

<?php include_once("inc/footer.php"); ?>