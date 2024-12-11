<?php include_once("inc/header.php"); ?>

<div class="pagePanier">

    <h1 class="titrePanier">Votre Panier :</h1>

    <section>

        <div class="panier">
            <?php for ($i = 1; $i < 10; $i++) { ?>
                <article class="produit">
                    <img src="img/R250.jpg" alt="image server" /> <br>
                    <?= "<p>nom produit #$i: prix</p>" ?>
                    <ul>
                        <li>CPU</li>
                        <li>RAM</li>
                        <li>Form Factor</li>
                        <li>Stockage</li>
                        <li>Modèle</li>
                        <li>Marque</li>
                        <li>OS</li>
                        <!-- <li><?= $_COOKIE['CPU'][$i] ?></li>
                        <li><?= $_COOKIE['RAM'][$i] ?></li>
                        <li><?= $_COOKIE['Stockage'][$i] ?></li>
                        <li><?= $_COOKIE['Modele'][$i] ?></li>
                        <li><?= $_COOKIE['Marque'][$i] ?></li> -->
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
                        echo "<li><strong>Produit $i: $i $</strong></li>";
                        $prix += $i;
                    }
                ?>
                <?= "<li><strong>Total: $prix $ </strong></li>" ?>
            </ul>

            <button id="btnPaiement"><strong>Procéder au paiement</strong></button>

        </div>

    </section>

    <form action="" id="formPanier" class="hidden">

        <fieldset>

            <legend>Charactéristique à modifier</legend>

            <label>CPU: </label>
            <select type="list" id="CPU" name="CPU">

            </select>

            <label>RAM: </label>
            <select type="list" id="RAM" name="RAM">

            </select>
            
            <label>Form Factor: </label>
            <select type="list" id="formFactor" name="formFactor">

            </select>
            
            <label>Stockage: </label>
            <select type="list" id="stockage" name="stockage">

            </select>
            
            <label>Modèle: </label>
            <select type="list" id="modele" name="modele">

            </select>
            
            <label>Marque: </label>
            <select type="list" id="brand" name="brand">

            </select>
            
            <label>OS: </label>
            <select type="list" id="OS" name="OS">

            </select>

            
            <button type="submit" id="btnModifier">Sauvegarder les modifications</button>

        </fieldset>

    </form>

</div>

<?php include_once("inc/footer.php"); ?>