<?php include_once("inc/header.php"); 
$serveurManager = new serveurManager($bdd);
$serveurs = $serveurManager->getServeur();?>
    <div class="comparaison">
    <table class="comparaisonImage" border>
        <tr>
            <td>image1</td>
            <td>image2</td>
        </tr>
    </table>
    <table class="comparaison" border>
        <tr>
            <th colspan="3">Comparaison</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Marque</td>
            <td>3</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Modele</td>
            <td>2</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Score</td>
            <td>2</td>
        </tr>

    </table>
    </div>
<?php include_once("inc/footer.php"); ?>