<?php 

class Serveur
{
    private $_server_id;
    private $_brand_id;
    private $_model;
    private $_formFactor_id;
    private $_Os_id;
    private $_CPU_id;
    private $_CPUCount;
    private $_RAM_id;
    private $_RAMCount;
    private $_storage_id;
    private $_storageCount;
    private $_description;
    private $_price;
    private $_imgName;
    private $_hasGPU;
    
    public function __construct($params = array()){
        foreach($params as $k => $v){

            $methodName = "set_" . $k;            
            if(method_exists($this, $methodName)) {
                $this->$methodName($v);
            }   
        }
    }
    /**
     * Get the value of _server_id
     */ 
    public function get_server_id()
    {
        return $this->_server_id;
    }

    /**
     * Set the value of _server_id
     *
     * @return  self
     */ 
    public function set_server_id($_server_id)
    {
        $this->_server_id = $_server_id;

        return $this;
    }

    /**
     * Get the value of _brand_id
     */ 
    public function get_brand_id()
    {
        return $this->_brand_id;
    }

    /**
     * Set the value of _brand_id
     *
     * @return  self
     */ 
    public function set_brand_id($_brand_id)
    {
        $this->_brand_id = $_brand_id;

        return $this;
    }

    /**
     * Get the value of _model
     */ 
    public function get_model()
    {
        return $this->_model;
    }

    /**
     * Set the value of _model
     *
     * @return  self
     */ 
    public function set_model($_model)
    {
        $this->_model = $_model;

        return $this;
    }

    /**
     * Get the value of _formFactor_id
     */ 
    public function get_formFactor_id()
    {
        return $this->_formFactor_id;
    }

    /**
     * Set the value of _formFactor_id
     *
     * @return  self
     */ 
    public function set_formFactor_id($_formFactor_id)
    {
        $this->_formFactor_id = $_formFactor_id;

        return $this;
    }

    /**
     * Get the value of _Os_id
     */ 
    public function get_Os_id()
    {
        return $this->_Os_id;
    }

    /**
     * Set the value of _Os_id
     *
     * @return  self
     */ 
    public function set_Os_id($_Os_id)
    {
        $this->_Os_id = $_Os_id;

        return $this;
    }

    /**
     * Get the value of _CPU_id
     */ 
    public function get_CPU_id()
    {
        return $this->_CPU_id;
    }

    /**
     * Set the value of _CPU_id
     *
     * @return  self
     */ 
    public function set_CPU_id($_CPU_id)
    {
        $this->_CPU_id = $_CPU_id;

        return $this;
    }

    /**
     * Get the value of _CPUCount
     */ 
    public function get_CPUCount()
    {
        return $this->_CPUCount;
    }

    /**
     * Set the value of _CPUCount
     *
     * @return  self
     */ 
    public function set_CPUCount($_CPUCount)
    {
        $this->_CPUCount = $_CPUCount;

        return $this;
    }

    /**
     * Get the value of _RAM_id
     */ 
    public function get_RAM_id()
    {
        return $this->_RAM_id;
    }

    /**
     * Set the value of _RAM_id
     *
     * @return  self
     */ 
    public function set_RAM_id($_RAM_id)
    {
        $this->_RAM_id = $_RAM_id;

        return $this;
    }

    /**
     * Get the value of _RAMCount
     */ 
    public function get_RAMCount()
    {
        return $this->_RAMCount;
    }

    /**
     * Set the value of _RAMCount
     *
     * @return  self
     */ 
    public function set_RAMCount($_RAMCount)
    {
        $this->_RAMCount = $_RAMCount;

        return $this;
    }

    /**
     * Get the value of _storage_id
     */ 
    public function get_storage_id()
    {
        return $this->_storage_id;
    }

    /**
     * Set the value of _storage_id
     *
     * @return  self
     */ 
    public function set_storage_id($_storage_id)
    {
        $this->_storage_id = $_storage_id;

        return $this;
    }

    /**
     * Get the value of _storageCount
     */ 
    public function get_storageCount()
    {
        return $this->_storageCount;
    }

    /**
     * Set the value of _storageCount
     *
     * @return  self
     */ 
    public function set_storageCount($_storageCount)
    {
        $this->_storageCount = $_storageCount;

        return $this;
    }

    /**
     * Get the value of _description
     */ 
    public function get_description()
    {
        return $this->_description;
    }

    /**
     * Set the value of _description
     *
     * @return  self
     */ 
    public function set_description($_description)
    {
        $this->_description = $_description;

        return $this;
    }

    /**
     * Get the value of _price
     */ 
    public function get_price()
    {
        return $this->_price;
    }

    /**
     * Set the value of _price
     *
     * @return  self
     */ 
    public function set_price($_price)
    {
        $this->_price = $_price;

        return $this;
    }

    /**
     * Get the value of _imgName
     */ 
    public function get_imgName()
    {
        return $this->_imgName;
    }

    /**
     * Set the value of _imgName
     *
     * @return  self
     */ 
    public function set_imgName($_imgName)
    {
        $this->_imgName = $_imgName;

        return $this;
    }

    /**
     * Get the value of _hasGPU
     */ 
    public function get_hasGPU()
    {
        return $this->_hasGPU;
    }

    /**
     * Set the value of _hasGPU
     *
     * @return  self
     */ 
    public function set_hasGPU($_hasGPU)
    {
        $this->_hasGPU = $_hasGPU;

        return $this;
    }
}