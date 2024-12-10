<?php include_once("inc/header.php"); ?>

<h1>Votre Panier :</h1>

<section>

    <div class="panier">
        <?php for ($i = 1; $i < 10; $i++) { ?>
            <article class="produit">
                <img src="image/server.jpg" alt="image server" /> <br>
                <?= "nom produit #$i: " . "prix" ?>
                <br>
                <ul>
                    <li>CPU</li>
                    <li>RAM</li>
                    <li>Stockage</li>
                    <li>Modèle</li>
                    <li>Marque</li>
                    <li>Charactéristique</li>
                </ul>
                <div class="button">
                    <button class="btnModifier">Modifier</button> <br>
                    <button class="btnSupprimer">Supprimer</button>
                </div>
            </article>
        <?php } ?>
    </div>

    <div class="prix">

        <ul>
            <?php
                $prix = 0;
                for ($i = 1; $i <= 3; $i++) {
                    echo "<li>Produit $i: $i $</li>";
                    $prix += $i;
                }
            ?>
            <?= "<li>Total: $prix" ?>
        </ul>

        <button>Procéder au paiement</button>

    </div>

</section>

<?php include_once("inc/footer.php"); ?>