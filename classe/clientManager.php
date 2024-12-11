<?php

  class ClientManager {
    private $_db;

    const CLIENT_EXISTE = "SELECT idClient , nom, prenom FROM tblClient WHERE courriel = :courriel AND mdp = :motPasse";

    const ADRESSE_EXISTE = "SELECT idAdresse FROM tblAdresse WHERE codePostal LIKE CONCAT('%', :codePostal, '%')";
    
    const INSERT_ADRESSE = "INSERT INTO tblAdresse (adresse, ville, province, codePostal, idPays) VALUES (:adresse, :ville, :province, :codePostal, (SELECT idPays FROM tblPays WHERE pays LIKE CONCAT('%', :pays, '%')))";

    const INSERT_CLIENT = "INSERT INTO tblClient (prenom, nom, courriel, mdp, idAdresse, idTypeTel, tel, idPaysDelivrance, noPermis, dateNaissance, dateExp, infolettre, modalite, dateCreation) VALUES (:prenom, :nom, :courriel, :motPasse, :idAdresse, (SELECT idTypeTel FROM tblTypeTel WHERE typeTel LIKE CONCAT('%', :typeTel, '%')), :telephone, (SELECT idPays FROM tblPays WHERE pays LIKE CONCAT('%', :paysDelivrance, '%')), :permis, :dateNaissance, :dateExpiration, :promotions, :modalites, CURRENT_DATE())";

    const GET_CLIENT_INFO = "SELECT idClient, prenom, nom, courriel, tel, noPermis, dateNaissance, dateExp AS dateExpiration, infolettre, modalite FROM tblClient WHERE idClient = :idClient"; 
    
    private function set_db($db) {
      assert(is_a($db, 'PDO'), 'La classe "CLIENTManager" doit recevoir une instance (un objet) de la classe "PDO" lors de l\'appel à son constructeur.');

      $this->_db = $db;
    }

    private function addressExiste(string $codePostal) {
      $query = $this->_db->prepare(self::ADRESSE_EXISTE);
      $query->execute(array(':codePostal' => $codePostal));

      return $query->fetchColumn();
    }

    private function addAdresse($clientObj) {
      $idAdresse = $this->addressExiste($clientObj->get_codePostal());

      if ($idAdresse)
        return $idAdresse;

      else {        
        $query = $this->_db->prepare(self::INSERT_ADRESSE);
        
        $adresseArray = array(
                              ':adresse' => $clientObj->get_adresse(),
                              ':ville' => $clientObj->get_ville(),
                              ':province' => $clientObj->get_province(),
                              ':codePostal' => $clientObj->get_codePostal(),
                              ':pays' => $clientObj->get_pays()
                            );
        
        assert($query->execute($adresseArray), 'L\'adresse n\'a pas pu être insérée dans la table "tblAdresse".'); 

        return $this->_db->lastInsertId();
      }
    }

    public function __construct($db) { $this->set_db($db); }

    public function clientExiste(string $courriel, string $motPasse) {
      $query = $this->_db->prepare(self::CLIENT_EXISTE);

      $loginArray = array(
                          ':courriel' => $courriel,
                          ':motPasse' => $motPasse
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
      
      assert(!$this->clientExiste($clientObj->get_courriel(), $clientObj->get_mdp()), 'L\'utilisateur existe déjà dans la base de données. L\'inscription a donc été abandonnée.');

      $query = $this->_db->prepare(self::INSERT_CLIENT);

      $query->bindValue(':prenom', $clientObj->get_prenom());
      $query->bindValue(':nom', $clientObj->get_nom());
      $query->bindValue(':courriel', $clientObj->get_courriel());
      $query->bindValue(':motPasse', $clientObj->get_mdp());
      $query->bindValue(':idAdresse', $this->addAdresse($clientObj));
      $query->bindValue(':typeTel', $clientObj->get_typeTel());
      $query->bindValue(':telephone', $clientObj->get_tel());
      $query->bindValue(':paysDelivrance', $clientObj->get_paysDelivrance());
      $query->bindValue(':permis', $clientObj->get_noPermis());
      $query->bindValue(':dateNaissance', $clientObj->get_dateNaissance());
      $query->bindValue(':dateExpiration', $clientObj->get_dateExpiration());
      $query->bindValue(':promotions', ($clientObj->get_infolettre() == 'Oui' ? true : false),PDO::PARAM_BOOL);
      $query->bindValue(':modalites', ($clientObj->get_modalite() == 'Oui' ? true : false),PDO::PARAM_BOOL);                              
      
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

  };
?>