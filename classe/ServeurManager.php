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

    public function getServeur() {
        $bddResults = $this->_bdd->query(self::SELECT_ALL_SERVEURS);
        $serveurs = [];
        
        while($data = $bddResults->fetch(PDO::FETCH_ASSOC)) {
            $serveur = new Serveur([
                'server_id' => $data['server_id'],
                'marque' => $data['marque'],
                'model' => $data['model'],
                'price' => $data['price'],
                'imgName' => $data['imgName'],
                // Add other properties as needed
            ]);
            $serveurs[] = $serveur;
        }
        return $serveurs;
    }
};
