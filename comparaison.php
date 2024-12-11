<?php include_once("inc/header.php");

$serveurManager = new serveurManager($bdd);
$serveurs = $serveurManager->getServeur();
if (isset($_REQUEST['comp1']) && isset($_REQUEST['comp2'])) {
    //if(1 != 0){
    $serveur1 = $serveurs[0];
    $serveur2 = $serveurs[1]; ?>
    <script src="js/scriptComparer.js" defer></script>
    <div id="comparaison">
        <table id="image">
            <tr>
                <td><img src="img/<?= $serveur1->get_imgName() ?>" alt="ok"></td>
                <td><img src="img/<?= $serveur2->get_imgName() ?>" alt=""></td>
            </tr>
        </table>
        <table id="marque">
            <tr>
                <th colspan="3">Comparaison</th>
            </tr>
            <tr>
                <td><?= $serveur1->get_marque() ?></td>
                <td><b>Marque</b></td>
                <td><?= $serveur2->get_marque() ?></td>
            </tr>
            <tr>
                <td><?= $serveur1->get_model() ?></td>
                <td><b>Modele</b></td>
                <td><?= $serveur2->get_model() ?></td>
            </tr>
            <tr>
                <td><?= $serveur1->get_lineUp() ?></td>
                <td><b>Série</b></td>
                <td><?= $serveur2->get_lineUp() ?></td>
            </tr>
            <tr class="couleur">
                <td>11</td>
                <td><b>Score</b></td>
                <td>2</td>
            </tr>
        </table>

        <table id="cpu">
            <tr>
                <th colspan="3">CPU</th>

            </tr>
            <tr>
                <td><?= $serveurs[0]->get_CPU_brand() ?></td>
                <td><b>Marque</b></td>
                <td><?= $serveurs[1]->get_CPU_brand() ?></td>
            </tr>
            <tr>
                <td><?= $serveurs[0]->get_CPU_model() ?></td>
                <td><b>Modele</b></td>
                <td><?= $serveurs[1]->get_CPU_model() ?></td>
            </tr>
            <tr class=" couleur">
                <td><?= $serveurs[0]->get_CPU_baseClockSpeed() ?></td>
                <td><b>Base Clock Speed</b></td>
                <td><?= $serveurs[1]->get_CPU_baseClockSpeed() ?></td>
            </tr>
            <tr class="couleur">
                <td><?= $serveurs[0]->get_CPUCount() ?></td>
                <td><b>Nombre</b></td>
                <td><?= $serveurs[1]->get_CPUCount() ?></td>
            </tr>
        </table>

        <table id="ram">

            <tr>
                <th colspan="3">RAM</th>

            </tr>
            <tr class="couleur">
                <td><?= $serveurs[0]->get_RAM_capacity() ?></td>
                <td><b>Capacité</b></td>
                <td><?= $serveurs[1]->get_RAM_capacity() ?></td>
            </tr>
            <tr class="couleur">
                <td><?= $serveurs[0]->get_RAM_frequency() ?></td>
                <td><b>Frequence</b></td>
                <td><?= $serveurs[1]->get_RAM_frequency() ?></td>
            </tr>
            <tr class="couleur">
                <td><?= $serveurs[0]->get_RAMCount() ?></td>
                <td><b>Nombre</b></td>
                <td><?= $serveurs[1]->get_RAMCount() ?></td>
            </tr>
        </table>

        <table id="stockage">

            <tr>
                <th colspan="3">Stockage</th>

            </tr>
            <tr class="couleur">
                <td><?= $serveurs[0]->get_storage_capacity() ?></td>
                <td><b>Capacité</b></td>
                <td><?= $serveurs[1]->get_storage_capacity() ?></td>
            </tr>
            <tr>
                <td><?= $serveurs[0]->get_storage_interface() ?></td>
                <td><b>interface</b></td>
                <td><?= $serveurs[1]->get_storage_interface() ?></td>
            </tr>
            <tr>
                <td><?= $serveurs[0]->get_storage_type() ?></td>
                <td><b>type</b></td>
                <td><?= $serveurs[1]->get_storage_type() ?></td>
            </tr>
            <tr class="couleur">
                <td><?= $serveurs[0]->get_storageCount() ?></td>
                <td><b>Nombre</b></td>
                <td><?= $serveurs[1]->get_storageCount() ?></td>
            </tr>
        </table>
        <table id="Autre">

            <tr>
                <th colspan="3">Autre</th>
            </tr>
            <tr>
                <td><?= $serveurs[0]->get_price() ?></td>
                <td><b>Prix</b></td>
                <td><?= $serveurs[1]->get_price() ?></td>
            </tr>
            <tr class="couleur">
                <td><?= $serveurs[0]->get_hasGPU() ?></td>
                <td><b>Gpu</b></td>
                <td><?= $serveurs[1]->get_hasGPU() ?></td>
            </tr>
            <tr class="description">
                <td><?= $serveurs[0]->get_description() ?></td>
                <td><b>Description</b></td>
                <td><?= $serveurs[1]->get_description() ?></td>
            </tr>
        </table>
        
    </div>
    <br>
    <section id="compButtons">
        <div>
            <button><a href="#image">Score</a></button>
            <button><a href="#cpu">Cpu</a></button>
            <button><a href="#ram">Ram</a></button>
            <button><a href="#stockage">Stockage</a></button>
            <button><a href="#ram">Autre</a></button>
        </div>
        <button id="btn-Couleur">Couleur</button>
    <?php
} else { ?>
        <div class="compVide">
            <h2>Veuillez selectionner deux produits</h2>
            <h3>filtre de modèle</h3>
            <?php $prix = $serveurManager->selectAllPrices()[0][0]
            ?>

            <form action="comparaison.php" class="filtreComparer">
                <label for="minimum">Prix minimum:</label>
                <input type="text" name="prix" id="minimum" value=0>
                <br>
                <label for="taille">Taille:</label>
                <select name="taille" id="taille">
                    <option value="Toutes" selected>Toutes</option>
                    <?php
                    $formArray = $serveurManager->selectAllFormFactors();
                    foreach ($formArray as $form)
                        echo '<option value="' . $form[0] . '">' . $form[1] . '</option>';
                    ?>
                </select>
                <input type="hidden" name="action" value="filtreComparer">
                <button class="button" type="submit">Filtrer</button>
            </form>
            <?php $serveurArray = 0;

            $serveurArray = $serveurManager->selectModeles($_REQUEST);
            ?>
            <h3>Selectionner un modèle</h3>
            <form action="comparaison.php">
                <label for="comp1">Modèle:</label>
                <select name="comp1" id="comp1">
                    <?php
                    foreach ($serveurArray as $serveur) {
                        echo '<option value="' . $serveur->get_server_id() . '">' . $serveur->get_model() . '</option>';
                    }
                    ?>
                </select>
                <label for="comp2">Modèle:</label>
                <select name="comp2" id="comp2">
                    <?php
                    foreach ($serveurArray as $serveur) {
                        echo '<option value="' . $serveur->get_server_id() . '">' . $serveur->get_model() . '</option>';
                    }
                    ?>
                </select>
                <button class="button" type="submit">Ajouter le produit</button>
            </form>

        </div>
    <?php
}
    ?>
    </section>


    <?php include_once("inc/footer.php"); ?>