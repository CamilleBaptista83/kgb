<?php

class PlanqueTypesManager
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
        }    }

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

    public function create(PlanqueTypes $planqueTypes)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_stakeout_type(name) VALUES (:name)");
        $request->bindValue(':name', $planqueTypes->getName(), PDO::PARAM_STR);
        $request->execute();
    }

    public function update(PlanqueTypes $planqueTypes)
    {
        $request = $this->pdo->prepare("UPDATE dt_stakeout_type(name) SET name=:name WHERE id=:id");
        $request->bindValue(':name', $planqueTypes->getName(), PDO::PARAM_STR);
        $request->execute();
    }

    public function delete(string $id)
    {
        $request = $this->pdo->prepare("DELETE * FROM dt_stakeout_type WHERE id=:id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $id)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_stakeout_type WHERE id=:id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $data = $request->fetch();
        return new PlanqueTypes($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT * FROM dt_stakeout_type");
        $PlanqueTypes = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $PlanqueTypes[] = new PlanqueTypes($datas);
        }
        return $PlanqueTypes;
    }


}
