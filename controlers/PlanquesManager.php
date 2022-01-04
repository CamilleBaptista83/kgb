<?php

class PlanquesManager
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

    public function create(Planques $planque)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_stakeout(code, adress, id_country, id_type) VALUES (:code,  :adress, :id_country, :id_type)");
        $request->bindValue(':code', $planque->getCode(), PDO::PARAM_STR);
        $request->bindValue(':adress', $planque->getAdress(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $planque->getId_country(), PDO::PARAM_INT);
        $request->bindValue(':id_type', $planque->getId_type(), PDO::PARAM_INT);
        $request->execute();
    }

    public function update(Planques $planque)
    {
        $request = $this->pdo->prepare("UPDATE dt_stakeout(code, adress, id_country, id_type) SET code=:code,  adress=:adress, id_country=:id_country, id_type=:id_type WHERE id=:id");
        $request->bindValue(':code', $planque->getCode(), PDO::PARAM_STR);
        $request->bindValue(':adress', $planque->getAdress(), PDO::PARAM_STR);
        $request->bindValue(':id_country', $planque->getId_country(), PDO::PARAM_INT);
        $request->bindValue(':id_type', $planque->getId_type(), PDO::PARAM_INT);
        $request->execute();
    }

    public function delete(string $id)
    {
        $request = $this->pdo->prepare("DELETE * FROM dt_stakeout WHERE id=:id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $id)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_stakeout WHERE id=:id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $data = $request->fetch();
        return new Planques($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT dt_stakeout.id, dt_stakeout.code, dt_stakeout.adress,
        dt_countries.name AS name_country,
        dt_stakeout_type.name AS name_type
        FROM dt_stakeout
        LEFT JOIN dt_stakeout_type ON dt_stakeout.id_type = dt_stakeout_type.id
        LEFT JOIN dt_countries ON dt_stakeout.id_country = dt_countries.id");
        $planques = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $planques[] = new Planques($datas);
        }
        return $planques;
    }

}
