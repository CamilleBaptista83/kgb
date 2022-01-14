<?php

class CountriesManager
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

    public function getCountryById(int $id)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_countries WHERE id= :id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();
        $data = $request->fetch();
        return new Agents($data);
    }

    public function getCountryName()
    {
        $request = $this->pdo->query("SELECT * FROM dt_countries");
        $countries = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $countries[] = new Countries($datas);
        }
        return $countries;
    }
}
