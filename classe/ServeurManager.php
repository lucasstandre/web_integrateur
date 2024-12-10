<?php
require_once './classe/Serveur.php';
class ServeurManager
{
    private $_bdd;
    
    /* const SELECT_ALL_SERVEURS = "SELECT server_id, 
                                        b.name AS marque, s.model, b.lineUp,
                                        f.name AS formFactor, o.name AS Os, 
                                        cb.name AS CPU_brand, c.model AS CPU_model, c.baseClockSpeed AS CPU_baseClockSpeed, CPUCount, 
                                        r.capacity AS RAM_capacity, r.frequency AS RAM_frequency, RAMCount, 
                                        st.capacity AS storage_capacity, sti.name AS storage_interface, stt.name AS storage_type, storageCount, 
                                        description, price, imgName, hasGPU
                                        FROM Serveur AS s
                                        INNER JOIN ServerBrand AS b ON s.brand_id = b.ServerBrand_id
                                        INNER JOIN formFactor AS f ON s.formFactor_id = f.formFactor_id
                                        INNER JOIN OS AS o ON s.OS_id = o.OS_id
                                        INNER JOIN CPU AS c ON c.CPU_id = c.CPU_id
                                        INNER JOIN ProcessorBrand as cb ON c.brand_id = cb.ProcessorBrand_id 
                                        INNER JOIN RAM AS r ON r.RAM_id = r.RAM_id
                                        INNER JOIN STORAGE as st ON s.storage_id = st.storage_id
                                        INNER JOIN StorageInterface as sti ON st.interface_id = sti.storageInterface_id
                                        INNER JOIN StorageType as stt ON st.type_id = stt.storageType_id";
*/
const SELECT_ALL_SERVEURS = "SELECT DISTINCT s.server_id, 
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
    public function getMarque(){
        $bddResults =  $this->_bdd->query("SELECT * FROM ServerBrand");
        $marques = array();
        while($fetchData = $bddResults->fetch()){
                array_push($marques, $fetchData);
        }
       return $marques;
    }
    public function getFormFactor(){
        $bddResults =  $this->_bdd->query("SELECT * FROM formFactor");
        $formFactors = array();
        while($fetchData = $bddResults->fetch()){
                array_push($formFactors, $fetchData);
        }
       return $formFactors;
    }
    public function getOS(){
        $bddResults =  $this->_bdd->query("SELECT * FROM OS");
        $OSs = array();
        while($fetchData = $bddResults->fetch()){
                array_push($OSs, $fetchData);
        }
       return $OSs;
    }
    public function getCPU(){
        $bddResults =  $this->_bdd->query("SELECT * FROM CPU");
        $CPUs = array();
        while($fetchData = $bddResults->fetch()){
                array_push($CPUs, $fetchData);
        }
       return $CPUs;
    }
    public function getProcessorBrand(){
        $bddResults =  $this->_bdd->query("SELECT * FROM ProcessorBrand");
        $processorBrands = array();
        while($fetchData = $bddResults->fetch()){
                array_push($processorBrands, $fetchData);
        }
       return $processorBrands;
    }
    public function getRAM(){
        $bddResults =  $this->_bdd->query("SELECT * FROM RAM");
        $RAMs = array();
        while($fetchData = $bddResults->fetch()){
                array_push($RAMs, $fetchData);
        }
       return $RAMs;
    }
    public function getStorage(){
        $bddResults =  $this->_bdd->query("SELECT * FROM STORAGE");
        $storages = array();
        while($fetchData = $bddResults->fetch()){
                array_push($storages, $fetchData);
        }
       return $storages;
    }
    public function getStorageInterface(){
        $bddResults =  $this->_bdd->query("SELECT * FROM StorageInterface");
        $storageInterfaces = array();
        while($fetchData = $bddResults->fetch()){
                array_push($storageInterfaces, $fetchData);
        }
       return $storageInterfaces;
    }
    public function getStorageType(){
        $bddResults =  $this->_bdd->query("SELECT * FROM StorageType");
        $storageTypes = array();
        while($fetchData = $bddResults->fetch()){
                array_push($storageTypes, $fetchData);
        }
       return $storageTypes;
    }
    public function addServeur(Serveur $serveur){
        $req = $this->_bdd->prepare("INSERT INTO Serveur (brand_id, model, formFactor_id, OS_id, CPU_id, RAM_id, storage_id, description, price, imgName, hasGPU) VALUES (:brand_id, :model, :formFactor_id, :OS_id, :CPU_id, :RAM_id, :storage_id, :description, :price, :imgName, :hasGPU)");
        $req->execute(array(
            'brand_id' => $serveur->getBrand_id(),
            'model' => $serveur->getModel(),
            'formFactor_id' => $serveur->getFormFactor_id(),
            'OS_id' => $serveur->getOS_id(),
            'CPU_id' => $serveur->getCPU_id(),
            'RAM_id' => $serveur->getRAM_id(),
            'storage_id' => $serveur->getStorage_id(),
            'description' => $serveur->getDescription(),
            'price' => $serveur->getPrice(),
            'imgName' => $serveur->getImgName(),
            'hasGPU' => $serveur->getHasGPU()
        ));
    }
};
