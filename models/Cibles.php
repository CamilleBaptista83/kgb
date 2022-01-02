<?php

class Cibles
{

    private $target_id_uuid;
    private $code_name;
    private $first_name;
    private $last_name;
    private $birth_date;
    private $id_country;
    private $name;

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

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
     * Get the value of birth_date
     */ 
    public function getBirth_date()
    {
        return $this->birth_date;
    }

    /**
     * Set the value of birth_date
     *
     * @return  self
     */ 
    public function setBirth_date($birth_date)
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of code_name
     */ 
    public function getCode_name()
    {
        return $this->code_name;
    }

    /**
     * Set the value of code_name
     *
     * @return  self
     */ 
    public function setCode_name($code_name)
    {
        $this->code_name = $code_name;

        return $this;
    }

    /**
     * Get the value of target_id_uuid
     */ 
    public function getTarget_id_uuid()
    {
        return $this->target_id_uuid;
    }

    /**
     * Set the value of target_id_uuid
     *
     * @return  self
     */ 
    public function setTarget_id_uuid($target_id_uuid)
    {
        $this->target_id_uuid = $target_id_uuid;

        return $this;
    }
}
