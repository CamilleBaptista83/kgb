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

    public function create(Cibles $cible)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_target(target_id_uuid, code_name, first_name, last_name, birth_date, id_country) VALUES (UUID(), :code_name,  :first_name, :last_name, :birth_date, :id_country)");
        $request->bindValue(':code_name', $cible->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $cible->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $cible->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $cible->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $cible->getId_country(), PDO::PARAM_INT);
        $request->execute();
    }

    public function update(Cibles $cible)
    {
        $request = $this->pdo->prepare("UPDATE `dt_target` SET code_name=:code_name,  first_name=:first_name, last_name=:last_name, birth_date=:birth_date, id_country=:id_country WHERE target_id_uuid=:target_id_uuid");
        $request->bindValue(':code_name', $cible->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $cible->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $cible->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $cible->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $cible->getId_country(), PDO::PARAM_INT);
        $request->bindValue(':target_id_uuid', $cible->getTarget_id_uuid(), PDO::PARAM_STR);
        $request->execute();
    }

    public function delete(string $target_id_uuid)
    {
        $request = $this->pdo->prepare("DELETE FROM `dt_target` WHERE target_id_uuid=:target_id_uuid");
        $request->bindValue(':target_id_uuid', $target_id_uuid, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $target_id_uuid)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_target LEFT JOIN dt_countries ON dt_target.id_country = dt_countries.id WHERE target_id_uuid=:target_id_uuid");
        $request->bindValue(':target_id_uuid', $target_id_uuid, PDO::PARAM_STR);
        $request->execute();
        $data = $request->fetch();
        return new Cibles($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT * FROM dt_target LEFT JOIN dt_countries ON dt_target.id_country = dt_countries.id ORDER BY last_name ASC");
        $cibles = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $cibles[] = new Cibles($datas);
        }
        return $cibles;
    }


    // MISSIONS

    public function getByMission(string $id_mission)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_targets_missions 
            LEFT JOIN dt_missions ON dt_targets_missions.id_mission = dt_missions.mission_id_uuid 
            LEFT JOIN dt_target ON dt_targets_missions.id_target = dt_target.target_id_uuid 
            LEFT JOIN dt_countries ON dt_target.id_country = dt_countries.id
            WHERE mission_id_uuid= :mission_id_uuid");
        $request->bindValue(':mission_id_uuid', $id_mission, PDO::PARAM_STR);
        $request->execute();
        $cibles = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $cibles[] = new Cibles($datas);
        }
        return $cibles;
    }

    // récupérer la liste des agents qui sont égligible sur une mission, pas le même id pays
    public function getCiblesListForAddMission(string $id_pays_mission)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_target 
            WHERE id_country = :id_pays_mission");
        $request->bindValue(':id_pays_mission', $id_pays_mission, PDO::PARAM_INT);
        $request->execute();
        $cibles = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $cibles[] = new Cibles($datas);
        }
        return $cibles;
    }

    public function asignCiblesToMission(Cibles $cible)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_targets_missions(id_target, id_mission) VALUES (:id_target, :id_mission)");
        $request->bindValue(':id_target', $cible->getTarget_id_uuid(), PDO::PARAM_STR);
        $request->bindValue(':id_mission', $cible->getMission_id_uuid(), PDO::PARAM_STR);
        $request->execute();
    }
}
