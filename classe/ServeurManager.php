<?php
require_once './classe/Serveur.php';
class ServeurManager
{
    private $_bdd;
    const SELECT_ALL_SERVEURS = "SELECT s.server_id, 
                                        b.name AS marque, 
                                        s.model, 
                                        b.lineUp,
                                        f.name AS formFactor, 
                                        o.name AS Os, 
                                        cb.name AS CPU_brand, 
                                        c.model AS CPU_model, 
                                        c.baseClockSpeed AS CPU_baseClockSpeed, 
                                        s.CPUCount, 
                                        r.capacity AS RAM_capacity, 
                                        r.frequency AS RAM_frequency, 
                                        s.RAMCount, 
                                        st.capacity AS storage_capacity, 
                                        sti.name AS storage_interface, 
                                        stt.name AS storage_type, 
                                        s.storageCount, 
                                        s.description, 
                                        s.price, 
                                        s.imgName,
                                        s.hasGPU
                                FROM Serveur AS s
                                INNER JOIN ServerBrand AS b ON s.brand_id = b.ServerBrand_id
                                INNER JOIN formFactor AS f ON s.formFactor_id = f.formFactor_id
                                INNER JOIN OS AS o ON s.OS_id = o.OS_id
                                INNER JOIN CPU AS c ON s.CPU_id = c.CPU_id
                                INNER JOIN ProcessorBrand as cb ON c.brand_id = cb.ProcessorBrand_id 
                                INNER JOIN RAM AS r ON s.RAM_id = r.RAM_id
                                INNER JOIN STORAGE as st ON s.storage_id = st.Storage_id
                                LEFT JOIN StorageInterface as sti ON st.interface_id = sti.storageInterface_id
                                INNER JOIN StorageType as stt ON st.type_id = stt.storageType_id";


    const SELECT_ALL_MODELS = "SELECT model FROM serveur ORDER BY model ASC";

    const SELECT_ALL_PRICES= "SELECT price FROM serveur ORDER BY price ASC";
    const SELECT_ALL_FORMS= "SELECT formFactor_id, name FROM formfactor ORDER BY formFactor_id ASC";
    const TAILLES_FILTER = "s.formFactor_id = :taille";
    const PRIX_FILTER = "s.price < :prix";

    public function __construct(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }

    public function getServeur(){
        $bddResults =  $this->_bdd->query(self::SELECT_ALL_SERVEURS);
        $serveurs = array();
        while($fetchData = $bddResults->fetch()){
                array_push($serveurs, new Serveur($fetchData));
        }
       return $serveurs;
    }  
    public function selectAllModeles(): array
    {
        return $this->_bdd->query(self::SELECT_ALL_MODELS)->fetchAll();
    }
    public function selectAllPrices(): array
    {
        return $this->_bdd->query(self::SELECT_ALL_PRICES)->fetchAll();
    }
    public function selectAllFormFactors(): array
    {
        return $this->_bdd->query(self::SELECT_ALL_FORMS)->fetchAll();
    }
    public function selectModeles(array $formArray): array
    {
        $modeleArray = array();
        $bindParam = array();
        $whereClause = '';

        if (isset($formArray['taille']) && $formArray['taille'] != 'Toutes') {
            $whereClause .= self::TAILLES_FILTER;
            $bindArray[":taille"] = $formArray['taille'];
        }
        if (isset($formArray['prix']) && $formArray['prix'] != 0) {
            if (!empty($whereClause)) {
                $whereClause .= " AND ";
            }

            $whereClause .= self::PRIX_FILTER;
            $bindArray[":prix"] = $formArray['prix'];
        }
        if (empty($whereClause))
            $dbResult = $this->_bdd->query(self::SELECT_ALL_SERVEURS)->fetchAll();
        else {
            $query = $this->_bdd->prepare(self::SELECT_ALL_SERVEURS . ' WHERE ' . $whereClause);

            $query->execute($bindArray);

            $dbResult = $query->fetchAll();
        }

        foreach ($dbResult as $row) {
            array_push($modeleArray, new Serveur($row) );
        }
        return $modeleArray;
    }
};