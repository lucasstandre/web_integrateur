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
    private $_code_postal;
    private $_province_name;
    

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
            "code_postal"=> $this->_code_postal,
            "province_name"=> $this->_province_name,
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
        $this->_code_postal = $data["code_postal"];
        $this->_province_name = $data["province_name"];
        $this->_reservationArray = $data["reservationArray"]; 
    }

    public function get_userID() {
      return $this->_userID;
    }
    public function set_userID($value) {
      $this->_userID = $value;
    }

    public function get_mdp() {
      return $this->_mdp;
    }
    public function set_mdp($value) {
      $this->_mdp = $value;
    }

    public function get_adresse_ID() {
      return $this->_adresse_ID;
    }
    public function set_adresse_ID($value) {
      $this->_adresse_ID = $value;
    }

    public function get_nom() {
      return $this->_nom;
    }
    public function set_nom($value) {
      $this->_nom = $value;
    }

    public function get_email() {
      return $this->_email;
    }
    public function set_email($value) {
      $this->_email = $value;
    }

    public function get_numero_rue() {
      return $this->_numero_rue;
    }
    public function set_numero_rue($value) {
      $this->_numero_rue = $value;
    }

    public function get_nom_rue() {
      return $this->_nom_rue;
    }
    public function set_nom_rue($value) {
      $this->_nom_rue = $value;
    }

    public function get_ville() {
      return $this->_ville;
    }
    public function set_ville($value) {
      $this->_ville = $value;
    }

    public function get_province_ID() {
      return $this->_province_ID;
    }
    public function set_province_ID($value) {
      $this->_province_ID = $value;
    }

    public function get_code_postal() {
      return $this->_code_postal;
    }
    public function set_code_postal($value) {
      $this->_code_postal = $value;
    }

    public function get_province_name() {
      return $this->_province_name;
    }
    public function set_province_name($value) {
      $this->_province_name = $value;
    }
    

}



?>