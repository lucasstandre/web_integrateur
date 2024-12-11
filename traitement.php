<?php 
include_once("inc/pretraitement.php");
include_once("inc/header.php"); 


if(isset($_REQUEST['action'])) {
        if($_REQUEST['action'] == "inscription") {
            $cm = new ClientManager($bdd);
            $client = new Client($_REQUEST);
            $cm->addClient($client);     ?>
<h1> votre inscription fus un succès! </h1>
<?php
    } elseif ($_REQUEST['action'] == "connexion"){ ?>
                <?php 
                    if(isset($_SESSION['client'])){
                        $client = unserialize($_SESSION['client']); 
                    }
                } elseif ($_REQUEST['action'] == "logout"){ ?>
        <h1 class="center">Au revoir !</h1> <?php
            }
        }
        
 include_once("inc/footer.php");
    ?>


       