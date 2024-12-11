<?php 
#classe client similaire au laboratoire
class Client
{
    private $_userID;
    private $_mdp;
    private $_adresse_ID;
    private $_nom;
    private $_email;
    private $_numero_rue;
    private $_nom_rue;
    private $_ville;
    private $_province_ID;
    private $_code_postale;
    private $_province_Name;
    

        private $_reservationArray = array();

    public function __construct($params = array()){
  
        foreach($params as $k => $v){

            $methodName = "set_" . $k;            
            if(method_exists($this, $methodName)) {
                $this->$methodName($v);
            }   
        }
    }

    public function __serialize(){
        return [
            "userId" => $this->_userID,
            "mdp"=> $this->_mdp, 
            "adresse_ID"=> $this->_adresse_ID, 
            "nom"=> $this->_nom, 
            "email"=> $this->_email,
            "numero_rue"=> $this->_numero_rue,
            "nom_rue"=> $this->_nom_rue,
            "ville"=> $this->_ville,
            "province_ID"=> $this->_province_ID,
            "code_postale"=> $this->_code_postale,
            "province_name"=> $this->_province_Name,
            "reservationArray" => $this->_reservationArray
        ];
    }

    public function __unserialize($data){
        $this->_userID = $data["userId"];
        $this->_mdp = $data["mdp"];
        $this->_adresse_ID = $data["adresse_ID"];        
        $this->_nom = $data["nom"];        
        $this->_email = $data["email"];
        $this->_numero_rue = $data["numero_rue"];
        $this->_nom_rue = $data["nom_rue"];
        $this->_ville = $data["ville"];
        $this->_province_ID = $data["province_ID"];
        $this->_code_postale = $data["code_postale"];
        $this->_province_Name = $data["province_name"];
        $this->_reservationArray = $data["reservationArray"]; 
    }

    public function addReservation($reservation) {
        array_push($this->_reservationArray, $reservation);
    }

    
    /**
     * Get the value of _reservation
     */ 
    public function get_reservationArray()
    {
        return $this->_reservationArray;
    }


    public function set_reservationArray($_reservation)
    {
        array_push($this->_reservationArray, $_reservation);

        return $this;
    }

    public function getUserID() {
      return $this->_userID;
    }
    public function setUserID($value) {
      $this->_userID = $value;
    }

    public function getMdp() {
      return $this->_mdp;
    }
    public function setMdp($value) {
      $this->_mdp = $value;
    }

    public function getAdresse_ID() {
      return $this->_adresse_ID;
    }
    public function setAdresse_ID($value) {
      $this->_adresse_ID = $value;
    }

    public function getNom() {
      return $this->_nom;
    }
    public function setNom($value) {
      $this->_nom = $value;
    }

    public function getEmail() {
      return $this->_email;
    }
    public function setEmail($value) {
      $this->_email = $value;
    }

    public function getNumero_rue() {
      return $this->_numero_rue;
    }
    public function setNumero_rue($value) {
      $this->_numero_rue = $value;
    }

    public function getNom_rue() {
      return $this->_nom_rue;
    }
    public function setNom_rue($value) {
      $this->_nom_rue = $value;
    }

    public function getVille() {
      return $this->_ville;
    }
    public function setVille($value) {
      $this->_ville = $value;
    }

    public function getProvince_ID() {
      return $this->_province_ID;
    }
    public function setProvince_ID($value) {
      $this->_province_ID = $value;
    }

    public function getCode_postale() {
      return $this->_code_postale;
    }
    public function setCode_postale($value) {
      $this->_code_postale = $value;
    }

    public function getProvince_Name() {
      return $this->_province_Name;
    }
    public function setProvince_Name($value) {
      $this->_province_Name = $value;
    }
    

}



?>