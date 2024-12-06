<?php 

class Serveur
{
    private $_server_id;
    private $_marque;
    private $_model;
    private $_lineUp;
    private $_formFactor;
    private $_Os;
    private $_CPU_brand;
    private $_CPU_model;
    private $_CPU_baseClockSpeed;
    private $_CPUCount;
    private $_RAM_capacity;
    private $_RAM_frequency;
    private $_RAMCount;
    private $_storage_capacity;
    private $_storage_interface;
    private $_storage_type;
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
     * Get the value of _marque
     */ 
    public function get_marque()
    {
        return $this->_marque;
    }

    /**
     * Set the value of _marque
     *
     * @return  self
     */ 
    public function set_marque($_marque)
    {
        $this->_marque = $_marque;

        return $this;
    }

    /**
     * Get the value of _lineUp
     */ 
    public function get_lineUp()
    {
        return $this->_lineUp;
    }

    /**
     * Set the value of _lineUp
     *
     * @return  self
     */ 
    public function set_lineUp($_lineUp)
    {
        $this->_lineUp = $_lineUp;

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
     * Get the value of _formFactor
     */ 
    public function get_formFactor()
    {
        return $this->_formFactor;
    }

    /**
     * Set the value of _formFactor
     *
     * @return  self
     */ 
    public function set_formFactor($_formFactor)
    {
        $this->_formFactor = $_formFactor;

        return $this;
    }

    /**
     * Get the value of _Os
     */ 
    public function get_Os()
    {
        return $this->_Os;
    }

    /**
     * Set the value of _Os
     *
     * @return  self
     */ 
    public function set_Os($_Os)
    {
        $this->_Os = $_Os;

        return $this;
    }

    

    /**
     * Get the value of _CPU_brand
     */ 
    public function get_CPU_brand()
    {
        return $this->_CPU_brand;
    }

    /**
     * Set the value of _CPU_brand
     *
     * @return  self
     */ 
    public function set_CPU_brand($_CPU_brand)
    {
        $this->_CPU_brand = $_CPU_brand;

        return $this;
    }

    /**
     * Get the value of _CPU_model
     */ 
    public function get_CPU_model()
    {
        return $this->_CPU_model;
    }

    /**
     * Set the value of _CPU_model
     *
     * @return  self
     */ 
    public function set_CPU_model($_CPU_model)
    {
        $this->_CPU_model = $_CPU_model;

        return $this;
    }

    /**
     * Get the value of _CPU_baseClockSpeed
     */ 
    public function get_CPU_baseClockSpeed()
    {
        return $this->_CPU_baseClockSpeed;
    }

    /**
     * Set the value of _CPU_baseClockSpeed
     *
     * @return  self
     */ 
    public function set_CPU_baseClockSpeed($_CPU_baseClockSpeed)
    {
        $this->_CPU_baseClockSpeed = $_CPU_baseClockSpeed;

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
     * Get the value of _RAM_capacity
     */ 
    public function get_RAM_capacity()
    {
        return $this->_RAM_capacity;
    }

    /**
     * Set the value of _RAM_capacity
     *
     * @return  self
     */ 
    public function set_RAM_capacity($_RAM_capacity)
    {
        $this->_RAM_capacity = $_RAM_capacity;

        return $this;
    }

    /**
     * Get the value of _RAM_frequency
     */ 
    public function get_RAM_frequency()
    {
        return $this->_RAM_frequency;
    }

    /**
     * Set the value of _RAM_frequency
     *
     * @return  self
     */ 
    public function set_RAM_frequency($_RAM_frequency)
    {
        $this->_RAM_frequency = $_RAM_frequency;

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
     * Get the value of _storage_capacity
     */ 
    public function get_storage_capacity()
    {
        return $this->_storage_capacity;
    }

    /**
     * Set the value of _storage_capacity
     *
     * @return  self
     */ 
    public function set_storage_capacity($_storage_capacity)
    {
        $this->_storage_capacity = $_storage_capacity;

        return $this;
    }

    /**
     * Get the value of _storage_interface
     */ 
    public function get_storage_interface()
    {
        return $this->_storage_interface;
    }

    /**
     * Set the value of _storage_interface
     *
     * @return  self
     */ 
    public function set_storage_interface($_storage_interface)
    {
        $this->_storage_interface = $_storage_interface;

        return $this;
    }

    /**
     * Get the value of _storage_type
     */ 
    public function get_storage_type()
    {
        return $this->_storage_type;
    }

    /**
     * Set the value of _storage_type
     *
     * @return  self
     */ 
    public function set_storage_type($_storage_type)
    {
        $this->_storage_type = $_storage_type;

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