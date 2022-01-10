<?php

class Agents
{

    private $agent_id_uuid;
    private $identification_code;
    private $first_name;
    private $last_name;
    private $birth_date;
    private $id_country;
    private $name;
    private $id_speciality;

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
     * Get the value of identification_code
     */
    public function getIdentification_code()
    {
        return $this->identification_code;
    }

    /**
     * Set the value of identification_code
     *
     * @return  self
     */
    public function setIdentification_code(string $identification_code)
    {
        if (!strlen($identification_code) === 7) {
            echo 'Le nombre doit contenir 7 chiffre';
        } else {
            $this->identification_code = $identification_code;
        }


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
    public function setFirst_name(string $first_name)
    {
        $this->first_name = $first_name;

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
    public function setLast_name(string $last_name)
    {
        $this->last_name = $last_name;

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
    public function setBirth_date(string $birth_date)
    {
        $this->birth_date = $birth_date;

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
    public function setName(string $name)
    {
        $this->name = $name;

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
    public function setId_speciality($id_speciality)
    {
        $this->id_speciality = $id_speciality;

        return $this;
    }
}
