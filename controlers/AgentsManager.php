<?php

class AgentsManager
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

    public function create(Agents $agent)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_agents(agent_id_uuid, identification_code, first_name, last_name, birth_date, id_country) VALUES (UUID(), :identification_code,  :first_name, :last_name, :birth_date, :id_country)");
        $request->bindValue(':identification_code', $agent->getIdentification_code(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $agent->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $agent->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $agent->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $agent->getId_country(), PDO::PARAM_INT);
        $request->execute();
    }

    public function update(Agents $agent)
    {
        $request = $this->pdo->prepare("UPDATE `dt_agents` SET identification_code=:identification_code,  first_name=:first_name, last_name=:last_name, birth_date=:birth_date, id_country=:id_country WHERE agent_id_uuid=:agent_id_uuid");
        $request->bindValue(':identification_code', $agent->getIdentification_code(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $agent->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $agent->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $agent->getBirth_date(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $agent->getId_country(), PDO::PARAM_INT);
        $request->bindValue(':agent_id_uuid', $agent->getAgent_id_uuid(), PDO::PARAM_STR);
        $request->execute();
    }

    public function delete(string $agent_id_uuid)
    {
        $request = $this->pdo->prepare("DELETE FROM `dt_agents` WHERE agent_id_uuid= :agent_id_uuid ");
        $request->bindValue(':agent_id_uuid', $agent_id_uuid, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $agent_id_uuid)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_agents LEFT JOIN dt_countries ON dt_agents.id_country = dt_countries.id WHERE agent_id_uuid= :agent_id_uuid");
        $request->bindValue(':agent_id_uuid', $agent_id_uuid, PDO::PARAM_STR);
        $request->execute();
        $data = $request->fetch();
        return new Agents($data);
    }

    public function getByCode(int $identification_code)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_agents LEFT JOIN dt_countries ON dt_agents.id_country = dt_countries.id WHERE identification_code= :identification_code");
        $request->bindValue(':identification_code', $identification_code, PDO::PARAM_INT);
        $request->execute();
        $data = $request->fetch();
        return new Agents($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT * FROM dt_agents LEFT JOIN dt_countries ON dt_agents.id_country = dt_countries.id ORDER BY identification_code ASC");
        $agents = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $agents[] = new Agents($datas);
        }
        return $agents;
    }


    // MISSIONS

    public function getByMission(string $id_mission)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_agents_missions 
        LEFT JOIN dt_missions ON dt_agents_missions.id_mission = dt_missions.mission_id_uuid 
        LEFT JOIN dt_agents ON dt_agents_missions.id_agent = dt_agents.agent_id_uuid 
        LEFT JOIN dt_countries ON dt_agents.id_country = dt_countries.id
        WHERE mission_id_uuid= :mission_id_uuid");
        $request->bindValue(':mission_id_uuid', $id_mission, PDO::PARAM_STR);
        $request->execute();
        $agents = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $agents[] = new Agents($datas);
        }
        return $agents;
    }

    // récupérer la liste des agents qui sont égligible sur une mission, pas le même id pays
    public function getAgentsListForAddMission(string $id_pays_mission)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_agents
        WHERE id_country != :id_pays_mission");
        $request->bindValue(':id_pays_mission', $id_pays_mission, PDO::PARAM_INT);
        $request->execute();
        $agents = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $agents[] = new Agents($datas);
        }
        return $agents;
    }

    // récupérer la liste des agents qui sont égligible sur une mission, pas le même id pays
    public function getAgentsListForAddMissionAndSpeciliality(string $id_pays_mission, int $id_speciality)
    {
        $request = $this->pdo->prepare("SELECT dt_agents.agent_id_uuid, dt_agents.first_name, dt_agents.last_name, 
        dt_agents_specialities.id_agent, 
        dt_agents_specialities.id_speciality
        FROM dt_agents
        LEFT JOIN dt_agents_specialities ON dt_agents.agent_id_uuid = dt_agents_specialities.id_agent 
        WHERE id_country != :id_pays_mission AND dt_agents_specialities.id_speciality = :id_speciality");
        $request->bindValue(':id_pays_mission', $id_pays_mission, PDO::PARAM_INT);
        $request->bindValue(':id_speciality', $id_speciality, PDO::PARAM_INT);
        $request->execute();
        $agents = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $agents[] = new Agents($datas);
        }
        return $agents;
    }

    public function asignAgentToMission(Agents $agent)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_agents_missions(id_agent, id_mission) VALUES (:id_agent, :id_mission)");
        $request->bindValue(':id_agent', $agent->getAgent_id_uuid(), PDO::PARAM_STR);
        $request->bindValue(':id_mission', $agent->getMission_id_uuid(), PDO::PARAM_STR);
        $request->execute();
    }
}
