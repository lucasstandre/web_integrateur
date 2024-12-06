<?php include_once("inc/header.php"); 
$serveurManager = new serveurManager($bdd);
$serveurs = $serveurManager->getServeur();?>
    <div class="comparaison">
    <table class="comparaisonImage">
        <tr>
            <td>image1</td>
            <td>image2</td>
        </tr>
    </table>
    <table class="comparaison">
        <tr>
            <th colspan="3">Comparaison</th>
        </tr>

        <tr>
            <td><?=$serveurs[0]->get_marque() ?></td>
            <td>Marque</td>
            <td><?=$serveurs[1]->get_marque() ?></td>
        </tr>
        <tr>
            <td><?=$serveurs[0]->get_model() ?></td>
            <td>Modele</td>
            <td><?=$serveurs[1]->get_model() ?></td>
        </tr>
        <tr>
            <td>1</td>
            <td>Score</td>
            <td>2</td>
        </tr>

    </table>
    </div>
<?php include_once("inc/footer.php"); ?>