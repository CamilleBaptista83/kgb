<?php

class Planques
{

    private $id;
    private $code;
    private $adress;
    private $id_country;
    private $id_type;
    private $name_country;
    private $name_type;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data) : void {
        foreach ($data as $key => $value){
            $method = 'set' . ucfirst($key); //ucfirst = premiere lettre maj
            if(method_exists($this, $method)){
                $this -> $method($value);
            }
        }
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of adress
     */ 
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set the value of adress
     *
     * @return  self
     */ 
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get the value of id_country
     */ 
    public function getId_country()
    {
        return $this->id_country;
    }

    /**
     * Set the value of id_country
     *
     * @return  self
     */ 
    public function setId_country($id_country)
    {
        $this->id_country = $id_country;

        return $this;
    }

    /**
     * Get the value of id_type
     */ 
    public function getId_type()
    {
        return $this->id_type;
    }

    /**
     * Set the value of id_type
     *
     * @return  self
     */ 
    public function setId_type($id_type)
    {
        $this->id_type = $id_type;

        return $this;
    }


    /**
     * Get the value of name_country
     */ 
    public function getName_country()
    {
        return $this->name_country;
    }

    /**
     * Set the value of name_country
     *
     * @return  self
     */ 
    public function setName_country($name_country)
    {
        $this->name_country = $name_country;

        return $this;
    }

    /**
     * Get the value of name_type
     */ 
    public function getName_type()
    {
        return $this->name_type;
    }

    /**
     * Set the value of name_type
     *
     * @return  self
     */ 
    public function setName_type($name_type)
    {
        $this->name_type = $name_type;

        return $this;
    }
}
