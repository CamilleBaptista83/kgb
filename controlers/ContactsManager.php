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

    public function create(Contacts $contact)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_contacts(contact_id_uuid, code_name, first_name, last_name, birth_date, id_country) VALUES (UUID(), :code_name,  :first_name, :last_name, :birth_date, :id_country)");
        $request->bindValue(':code_name', $contact->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $contact->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $contact->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $contact->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $contact->getId_country(), PDO::PARAM_INT);
        $request->execute();
    }

    public function update(Contacts $contact)
    {
        $request = $this->pdo->prepare("UPDATE `dt_contacts` SET code_name=:code_name,  first_name=:first_name, last_name=:last_name, birth_date=:birth_date, id_country=:id_country WHERE contact_id_uuid=:contact_id_uuid");
        $request->bindValue(':code_name', $contact->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $contact->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $contact->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $contact->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $contact->getId_country(), PDO::PARAM_INT);
        $request->bindValue(':contact_id_uuid', $contact->getContact_id_uuid(), PDO::PARAM_STR);
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
        $request = $this->pdo->prepare("SELECT * FROM dt_contacts LEFT JOIN dt_countries ON dt_contacts.id_country = dt_countries.id WHERE contact_id_uuid=:contact_id_uuid");
        $request->bindValue(':contact_id_uuid', $contact_id_uuid, PDO::PARAM_STR);
        $request->execute();
        $data = $request->fetch();
        return new Contacts($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT * FROM dt_contacts LEFT JOIN dt_countries ON dt_contacts.id_country = dt_countries.id ORDER BY last_name ASC");
        $contact = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $contact[] = new Contacts($datas);
        }
        return $contact;
    }

    // MISSIONS

    public function getByMission(string $id_mission)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_contacts_missions 
                LEFT JOIN dt_missions ON dt_contacts_missions.id_mission = dt_missions.mission_id_uuid 
                LEFT JOIN dt_contacts ON dt_contacts_missions.id_contact = dt_contacts.contact_id_uuid 
                LEFT JOIN dt_countries ON dt_contacts.id_country = dt_countries.id
                WHERE mission_id_uuid= :mission_id_uuid");
        $request->bindValue(':mission_id_uuid', $id_mission, PDO::PARAM_STR);
        $request->execute();
        $contacts = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $contacts[] = new Contacts($datas);
        }
        return $contacts;
    }
}
