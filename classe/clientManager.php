<?php

  class ClientManager {
    private $_db;

    const CLIENT_EXISTE = "SELECT user_id FROM utilisateur WHERE email = :email AND mdp = :mdp";

    const GET_CLIENT_INFO = "SELECT user_id from utilisateur, mdp, adresse_id, nom, email, numero_rue, nom_rue, ville, province_id, code_postal, province_name where user_id = :idClient"; 
    
    const ADRESSE_EXISTE = "SELECT adresse_id FROM adresse WHERE code_postal LIKE CONCAT('%', :codePostal, '%')";
    
    const INSERT_ADRESSE = "INSERT INTO adresse (numero_rue, nom_rue, ville, province_id, code_postal)
     VALUES (:numero_rue, :nom_rue, :ville, :province, :codePostal)";

    const INSERT_CLIENT = "INSERT INTO utilisateur (mdp, adresse_id, nom, email)
    VALUES (:mdp, :adresseId, :nom, :email)";

    

public function __construct($pdo) {
    $this->_db = $pdo;
}
    private function set_db($db) {
      assert(is_a($db, 'PDO'), 'La classe "CLIENTManager" doit recevoir une instance (un objet) de la classe "PDO" lors de l\'appel à son constructeur.');

      $this->_db = $db;
    }
    private function addressExiste($codePostal) {
        $query = $this->_db->prepare(self::ADRESSE_EXISTE);
        $query->execute(array(':codePostal' => $codePostal));
  
        return $query->fetchColumn();
      }
      private function addAdresse($clientObj) {
        $idAdresse = $this->addressExiste($clientObj->get_code_postal());
  
        if ($idAdresse)
          return $idAdresse;
  
        else {        
          $query = $this->_db->prepare(self::INSERT_ADRESSE);
          
          $adresseArray = array(
                                ':numero_rue' => $clientObj->get_numero_rue(),
                                ':nom_rue' => $clientObj->get_nom_rue(),
                                ':ville' => $clientObj->get_ville(),
                                ':province' => $clientObj->get_province_ID(),
                                ':codePostal' => $clientObj->get_code_postal()
                              );

          assert($query->execute($adresseArray), 'L\'adresse n\'a pas pu être insérée dans la table "tblAdresse".'); 
  
          return $this->_db->lastInsertId();
        }
      }

      public function clientExiste($courriel, $motPasse) {
        $query = $this->_db->prepare(self::CLIENT_EXISTE);
  
        $loginArray = array(
                            ':email' => $courriel,
                            ':mdp' => $motPasse
                           );
  
        $query->execute($loginArray);
  
        if($bddResult = $query->fetch()){
          return new Client($bddResult);
        } else {
          return null;
        }
      }

      public function addClient($clientObj) {
        assert(is_a($clientObj, 'Client'), 'La classe "ClientManager" doit recevoir une instance (un objet) de la classe "Client" pour qu\'un nouveau client soit ajouté à la base de données.');
               assert(
 !$this->clientExiste($clientObj->get_email(), $clientObj->get_mdp()), 'L\'utilisateur existe déjà dans la base de données. L\'inscription a donc été abandonnée.');
        $adresseId = $this->addAdresse($clientObj);

        $query = $this->_db->prepare(self::INSERT_CLIENT);
  
        $query->bindValue(':mdp', $clientObj->get_mdp());
        $query->bindValue(':adresseId', $adresseId);
        $query->bindValue(':nom', $clientObj->get_nom());
        $query->bindValue(':email', $clientObj->get_email());

        $query->execute();
  
        return $this->_db->lastInsertId();
      }


      public function get_client_info($idClient){
        $query = $this->_db->prepare(self::GET_CLIENT_INFO);
  
        $query->execute(array(':idClient' => $idClient));
  
        if($bddResult = $query->fetch()){
          return new Client($bddResult);
        } else {
          return null;
        }
      }



}