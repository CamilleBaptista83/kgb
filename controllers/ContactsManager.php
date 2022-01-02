<?php

class ContactsManager
{
    // attributs
    private $pdo;

    public function __construct()
    {
        $this->setPdo(new PDO('mysql:host=localhost;dbname=kgb;charset=utf8', 'kgb_admin', 'vladimirovitch'));
    }

    /**
     * Get the value of pdo
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @return  self
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }

    public function create(Contacts $agent)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_agents(contact_id_uuid, identification_code, first_name, last_name, birth_date, id_country) VALUES (UUID(), :identification_code,  :first_name, :last_name, :birth_date, :id_country)");
        $request->bindValue(':identification_code', $agent->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $agent->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $agent->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $agent->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $agent->getId_country(), PDO::PARAM_INT);
        $request->execute();
    }

    public function update(Contacts $agent)
    {
        $request = $this->pdo->prepare("UPDATE dt_contacts(identification_code, first_name, last_name, birth_date, id_country) SET identification_code=:identification_code,  first_name=:first_name, last_name=:last_name, birth_date=:birth_date, id_country=:id_country WHERE contact_id_uuid=:contact_id_uuid");
        $request->bindValue(':identification_code', $agent->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $agent->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $agent->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $agent->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $agent->getId_country(), PDO::PARAM_INT);
        $request->execute();
    }

    public function delete(string $contact_id_uuid)
    {
        $request = $this->pdo->prepare("DELETE * FROM dt_contacts WHERE contact_id_uuid=:contact_id_uuid");
        $request->bindValue(':contact_id_uuid', $contact_id_uuid, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $contact_id_uuid)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_contacts WHERE contact_id_uuid=:contact_id_uuid");
        $request->bindValue(':contact_id_uuid', $contact_id_uuid, PDO::PARAM_STR);
        $data = $request->fetch();
        return new Contacts($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT * FROM dt_contacts LEFT JOIN dt_countries ON dt_contacts.id_country = dt_countries.id");
        $agents = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $agents[] = new Contacts($datas);
        }
        return $agents;
    }

}
