<?php

class MissionsManager
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

    public function create(Missions $mission)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_missions(mission_id_uuid,title ,description , code_name,start, end, id_type, id_country, id_statut, id_speciality) VALUES 
        (UUID(), :title,  :description, :code_name, :start, :end, :id_type, :id_country, :id_statut, :id_speciality)");
        $request->bindValue(':title', $mission->getTitle(), PDO::PARAM_STR);
        $request->bindValue(':description', $mission->getDescription(), PDO::PARAM_STR);
        $request->bindValue(':code_name', $mission->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':start', $mission->getStart(), PDO::PARAM_STR);
        $request->bindValue(':end', $mission->getEnd(), PDO::PARAM_STR);
        $request->bindValue(':id_type', $mission->getId_type(), PDO::PARAM_INT);
        $request->bindValue(':id_country', $mission->getId_country(), PDO::PARAM_INT);
        $request->bindValue(':id_statut', $mission->getId_statut(), PDO::PARAM_INT);
        $request->bindValue(':id_speciality', $mission->getId_speciality(), PDO::PARAM_INT);
        $request->execute();
    }

    public function update(Missions $mission)
    {
        $request = $this->pdo->prepare("UPDATE `dt_missions` 
        SET title=:title,  description=:description, code_name=:code_name, start=:start, end=:end, 
        id_type=:id_type, id_country=:id_country, id_statut=:id_statut, id_speciality=:id_speciality
        WHERE mission_id_uuid=:mission_id_uuid");
        $request->bindValue(':title', $mission->getTitle(), PDO::PARAM_STR);
        $request->bindValue(':description', $mission->getDescription(), PDO::PARAM_STR);
        $request->bindValue(':code_name', $mission->getCode_name(), PDO::PARAM_STR);
        $request->bindValue(':start', $mission->getStart(), PDO::PARAM_STR);
        $request->bindValue(':end', $mission->getEnd(), PDO::PARAM_STR);
        $request->bindValue(':id_type', $mission->getId_type(), PDO::PARAM_INT);
        $request->bindValue(':id_country', $mission->getId_country(), PDO::PARAM_INT);
        $request->bindValue(':id_statut', $mission->getId_statut(), PDO::PARAM_INT);
        $request->bindValue(':id_speciality', $mission->getId_speciality(), PDO::PARAM_INT);
        $request->bindValue(':mission_id_uuid', $mission->getMission_id_uuid(), PDO::PARAM_STR);
        $request->execute();
    }

    public function delete(string $mission_id_uuid)
    {
        $request = $this->pdo->prepare("DELETE FROM `dt_missions` WHERE mission_id_uuid= :mission_id_uuid ");
        $request->bindValue(':mission_id_uuid', $mission_id_uuid, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $mission_id_uuid)
    {
        $request = $this->pdo->prepare("SELECT dt_missions.mission_id_uuid, dt_missions.title ,dt_missions.description , dt_missions.code_name,dt_missions.start, dt_missions.end,
        dt_missions.id_type, dt_missions.id_country, dt_missions.id_statut, dt_missions.id_speciality, 
        dt_mission_type.name AS mission_type_name,
        dt_countries.name AS country_name,
        dt_mission_statut.name AS mission_statut_name,
        dt_specialities.name AS speciality_name 
        FROM dt_missions 
        LEFT JOIN dt_mission_type ON dt_missions.id_type = dt_mission_type.id
        LEFT JOIN dt_countries ON dt_missions.id_country = dt_countries.id
        LEFT JOIN dt_mission_statut ON dt_missions.id_statut = dt_mission_statut.id
        LEFT JOIN dt_specialities ON dt_missions.id_speciality = dt_specialities.id
        WHERE mission_id_uuid= :mission_id_uuid");
        $request->bindValue(':mission_id_uuid', $mission_id_uuid, PDO::PARAM_STR);
        $request->execute();
        $data = $request->fetch();
        return new Missions($data);
    }


    public function getByCode(string $code_name)
    {
        $request = $this->pdo->prepare("SELECT dt_missions.mission_id_uuid, dt_missions.title ,dt_missions.description , dt_missions.code_name,dt_missions.start, dt_missions.end,
        dt_missions.id_type, dt_missions.id_country, dt_missions.id_statut, dt_missions.id_speciality, 
        dt_mission_type.name AS mission_type_name,
        dt_countries.name AS country_name,
        dt_mission_statut.name AS mission_statut_name,
        dt_specialities.name AS speciality_name 
        FROM dt_missions 
        LEFT JOIN dt_mission_type ON dt_missions.id_type = dt_mission_type.id
        LEFT JOIN dt_countries ON dt_missions.id_country = dt_countries.id
        LEFT JOIN dt_mission_statut ON dt_missions.id_statut = dt_mission_statut.id
        LEFT JOIN dt_specialities ON dt_missions.id_speciality = dt_specialities.id
        WHERE code_name= :code_name");
        $request->bindValue(':code_name', $code_name, PDO::PARAM_STR);
        $request->execute();
        $data = $request->fetch();
        return new Missions($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT dt_missions.mission_id_uuid, dt_missions.title ,dt_missions.description , dt_missions.code_name,dt_missions.start, dt_missions.end, 
        dt_missions.id_type, dt_missions.id_country, dt_missions.id_statut, dt_missions.id_speciality,
        dt_mission_type.name AS mission_type_name,
        dt_countries.name AS country_name,
        dt_mission_statut.name AS mission_statut_name,
        dt_specialities.name AS speciality_name 
        FROM dt_missions 
        LEFT JOIN dt_mission_type ON dt_missions.id_type = dt_mission_type.id
        LEFT JOIN dt_countries ON dt_missions.id_country = dt_countries.id
        LEFT JOIN dt_mission_statut ON dt_missions.id_statut = dt_mission_statut.id
        LEFT JOIN dt_specialities ON dt_missions.id_speciality = dt_specialities.id
        ORDER BY title ASC");
        $missions = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $missions[] = new Missions($datas);
        }
        return $missions;
    }
}
