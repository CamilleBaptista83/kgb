<?php

class AdminManager
{
    // attributs
    private $pdo;

    public function __construct()
    {

        try {
            $this->setPdo(new PDO('mysql:host=localhost;dbname=kgb;charset=utf8', 'kgb_admin', 'vladimirovitch'));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
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

    public function create(Admin $agent)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_admin(admin_id_uuid, first_name, last_name, email, password, creation_date) VALUES (UUID(), :first_name,  :last_name, :email, :password, :creation_date)");
        $request->bindValue(':identification_code', $agent->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $agent->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $agent->getEmail(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $agent->getPassword(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $agent->getCreation_date(), PDO::PARAM_STR);
        $request->execute();
    }

    public function update(Admin $agent)
    {
        $request = $this->pdo->prepare("UPDATE `dt_admin` SET first_name=:first_name,  last_name=:last_name, email=:email, password=:password, creation_date=:creation_date WHERE admin_id_uuid=:admin_id_uuid");
        $request->bindValue(':identification_code', $agent->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $agent->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $agent->getEmail(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $agent->getPassword(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $agent->getCreation_date(), PDO::PARAM_STR);
        $request->bindValue(':agent_id_uuid', $agent->getAdmin_id_uuid(), PDO::PARAM_STR);
        $request->execute();
    }

    public function delete(string $agent_id_uuid)
    {
        $request = $this->pdo->prepare("DELETE FROM `dt_admin` WHERE admin_id_uuid= :admin_id_uuid ");
        $request->bindValue(':agent_id_uuid', $agent_id_uuid, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $agent_id_uuid)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_admin WHERE admin_id_uuid= :admin_id_uuid");
        $request->bindValue(':agent_id_uuid', $agent_id_uuid, PDO::PARAM_STR);
        $request->execute();
        $data = $request->fetch();
        return new Admin($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT * FROM dt_admin ORDER BY identification_code ASC");
        $agents = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $agents[] = new Admin($datas);
        }
        return $agents;
    }


}
