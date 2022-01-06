<?php

class MissionTypesManager
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

    public function create(MissionTypes $missionTypes)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_mission_type(name) VALUES (:name)");
        $request->bindValue(':name', $missionTypes->getName(), PDO::PARAM_STR);
        $request->execute();
    }

    public function update(MissionTypes $missionTypes)
    {
        $request = $this->pdo->prepare("UPDATE dt_mission_type(name) SET name=:name WHERE id=:id");
        $request->bindValue(':name', $missionTypes->getName(), PDO::PARAM_STR);
        $request->execute();
    }

    public function delete(string $id)
    {
        $request = $this->pdo->prepare("DELETE * FROM dt_mission_type WHERE id=:id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $id)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_mission_type WHERE id=:id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $data = $request->fetch();
        return new MissionTypes($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT * FROM dt_mission_type");
        $missionTypes = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $missionTypes[] = new MissionTypes($datas);
        }
        return $missionTypes;
    }


}
