<?php

class Speciality
{

    private $agent_id_uuid;
    private $id;
    private $spe_name;

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
     * Get the value of agent_id_uuid
     */ 
    public function getAgent_id_uuid()
    {
        return $this->agent_id_uuid;
    }

    /**
     * Set the value of agent_id_uuid
     *
     * @return  self
     */ 
    public function setAgent_id_uuid($agent_id_uuid)
    {
        $this->agent_id_uuid = $agent_id_uuid;

        return $this;
    }

    /**
     * Get the value of spe_name
     */ 
    public function getSpe_name()
    {
        return $this->spe_name;
    }

    /**
     * Set the value of spe_name
     *
     * @return  self
     */ 
    public function setSpe_name($spe_name)
    {
        $this->spe_name = $spe_name;

        return $this;
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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}