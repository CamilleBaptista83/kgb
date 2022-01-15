<?php

class SpecialityManager
{
    // attributs
    private $pdo;

    public function __construct()
    {
        if (getenv('JAWSDB_URL') !== false) {
            $dbparts = parse_url(getenv('JAWSDB_URL'));

            $hostname = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $database = ltrim($dbparts['path'], '/');
        } else {
            $hostname = 'localhost';
            $username = 'kgb_admin';
            $password = 'vladimirovitch';
            $database = 'kgb';
        }

        try {
            $this->setPdo(new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';charset=utf8', $username, $password));
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

    public function create(Speciality $specialities)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_agents_specialities(id_agent, id_speciality) VALUES (:id_agent, :id_speciality)");
        $request->bindValue(':id_agent', $specialities->getAgent_id_uuid(), PDO::PARAM_STR);
        $request->bindValue(':id_speciality', $specialities->getId(), PDO::PARAM_INT);
        $request->execute();
    }

    public function getSpecialityById(string $agent_id_uuid)
    {
        $request = $this->pdo->query("SELECT dt_agents.agent_id_uuid,
        dt_specialities.name AS spe_name 
        FROM dt_agents 
        LEFT OUTER JOIN dt_agents_specialities ON dt_agents.agent_id_uuid = dt_agents_specialities.id_agent
        LEFT OUTER JOIN dt_specialities ON dt_agents_specialities.id_speciality = dt_specialities.id
        WHERE agent_id_uuid = '$agent_id_uuid'");
        $specialities = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $specialities[] = new Speciality($datas);
        }
        return $specialities;
    }

    public function getSpecialitiesName()
    {
        $request = $this->pdo->query("SELECT id, name AS spe_name FROM dt_specialities");
        $specialities = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $specialities[] = new Speciality($datas);
        }
        return $specialities;
    }
}
