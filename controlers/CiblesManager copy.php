<?php

class CiblesManager
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

    public function create(Cibles $agent)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_target(target_id_uuid, identification_code, first_name, last_name, birth_date, id_country) VALUES (UUID(), :identification_code,  :first_name, :last_name, :birth_date, :id_country)");
        $request->bindValue(':identification_code', $agent->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $agent->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $agent->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $agent->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $agent->getId_country(), PDO::PARAM_INT);
        $request->execute();
    }

    public function update(Cibles $agent)
    {
        $request = $this->pdo->prepare("UPDATE dt_target(identification_code, first_name, last_name, birth_date, id_country) SET identification_code=:identification_code,  first_name=:first_name, last_name=:last_name, birth_date=:birth_date, id_country=:id_country WHERE target_id_uuid=:target_id_uuid");
        $request->bindValue(':identification_code', $agent->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $agent->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $agent->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $agent->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $agent->getId_country(), PDO::PARAM_INT);
        $request->execute();
    }

    public function delete(string $agent_id_uuid)
    {
        $request = $this->pdo->prepare("DELETE * FROM dt_target WHERE target_id_uuid=:agent_id_uuid");
        $request->bindValue(':agent_id_uuid', $agent_id_uuid, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $agent_id_uuid)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_target WHERE agent_id_uuid=:agent_id_uuid");
        $request->bindValue(':agent_id_uuid', $agent_id_uuid, PDO::PARAM_STR);
        $data = $request->fetch();
        return new Cibles($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT * FROM dt_target LEFT JOIN dt_countries ON dt_target.id_country = dt_countries.id");
        $cibles = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $cibles[] = new Cibles($datas);
        }
        return $cibles;
    }

}
