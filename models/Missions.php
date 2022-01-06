<?php

class Missions
{

    private $mission_id_uuid;
    private $title;
    private $description;
    private $code_name;
    private $start;
    private $end;
    private $id_type;
    private $id_country;
    private $id_statut;
    private $id_speciality;

    private $mission_type_name;
    private $country_name;
    private $mission_statut_name;
    private $speciality_name;

    public function __construct(array $data = array())
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            // One gets the setter's name matching the attribute.
            $method = 'set' . ucfirst($key);

            // If the matching setter exists
            if (method_exists($this, $method)) {
                // One calls the setter.
                $this->$method($value);
            }
        }
    }


    /**
     * Get the value of mission_id_uuid
     */ 
    public function getMission_id_uuid()
    {
        return $this->mission_id_uuid;
    }

    /**
     * Set the value of mission_id_uuid
     *
     * @return  self
     */ 
    public function setMission_id_uuid(string $mission_id_uuid)
    {
        $this->mission_id_uuid = $mission_id_uuid;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

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
    public function setCode_name(string $code_name)
    {
        $this->code_name = $code_name;

        return $this;
    }

    /**
     * Get the value of start
     */ 
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set the value of start
     *
     * @return  self
     */ 
    public function setStart(string $start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get the value of end
     */ 
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set the value of end
     *
     * @return  self
     */ 
    public function setEnd($end)
    {
        if(empty($end)){
            $this->end = NULL;

            return $this;
        }else{
            $this->end = $end;

            return $this;
        }

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
    public function setId_type(int $id_type)
    {
        $this->id_type = $id_type;

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
    public function setId_country(int $id_country)
    {
        $this->id_country = $id_country;

        return $this;
    }

    /**
     * Get the value of id_statut
     */ 
    public function getId_statut()
    {
        return $this->id_statut;
    }

    /**
     * Set the value of id_statut
     *
     * @return  self
     */ 
    public function setId_statut(int $id_statut)
    {
        $this->id_statut = $id_statut;

        return $this;
    }

    /**
     * Get the value of id_speciality
     */ 
    public function getId_speciality()
    {
        return $this->id_speciality;
    }

    /**
     * Set the value of id_speciality
     *
     * @return  self
     */ 
    public function setId_speciality(int $id_speciality)
    {
        $this->id_speciality = $id_speciality;

        return $this;
    }


    

    /**
     * Get the value of mission_type_name
     */ 
    public function getMission_type_name()
    {
        return $this->mission_type_name;
    }

    /**
     * Set the value of mission_type_name
     *
     * @return  self
     */ 
    public function setMission_type_name(string $mission_type_name)
    {
        $this->mission_type_name = $mission_type_name;

        return $this;
    }

    /**
     * Get the value of country_name
     */ 
    public function getCountry_name()
    {
        return $this->country_name;
    }

    /**
     * Set the value of country_name
     *
     * @return  self
     */ 
    public function setCountry_name(string $country_name)
    {
        $this->country_name = $country_name;

        return $this;
    }

    /**
     * Get the value of mission_statut_name
     */ 
    public function getMission_statut_name()
    {
        return $this->mission_statut_name;
    }

    /**
     * Set the value of mission_statut_name
     *
     * @return  self
     */ 
    public function setMission_statut_name(string $mission_statut_name)
    {
        $this->mission_statut_name = $mission_statut_name;

        return $this;
    }

    /**
     * Get the value of speciality_name
     */ 
    public function getSpeciality_name()
    {
        return $this->speciality_name;
    }

    /**
     * Set the value of speciality_name
     *
     * @return  self
     */ 
    public function setSpeciality_name(string $speciality_name)
    {
        $this->speciality_name = $speciality_name;

        return $this;
    }
}
