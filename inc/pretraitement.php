
<?php

include_once("inc/autoloader.php");
session_start();


$bdd = PDOFactory::getMySQLConnection();

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "connexion"){
    $cm = new ClientManager($bdd); 
    $client = $cm->clientExiste($_REQUEST['email'], $_REQUEST['mdp']);
    if(is_a($client,'Client')){
        $_SESSION['client'] = serialize($client);
    }
    else{
        echo '<h1> votre connexion a echoué :( </h1>';
    }
    
} else if (isset($_REQUEST['action']) && $_REQUEST['action'] == "logout"){
    $_SESSION = array();
    session_destroy(); 
} ?>