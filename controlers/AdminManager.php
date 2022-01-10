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

    public function create(Admin $admin)
    {
        $request = $this->pdo->prepare("INSERT INTO dt_admin(admin_id_uuid, first_name, last_name, email, password, creation_date) VALUES (UUID(), :first_name,  :last_name, :email, :password, NOW())");
        $request->bindValue(':identification_code', $admin->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $admin->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $admin->getEmail(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', password_hash($admin->getPassword(), PASSWORD_BCRYPT));
        $request->execute();
    }

    public function update(Admin $admin)
    {
        $request = $this->pdo->prepare("UPDATE `dt_admin` SET first_name=:first_name,  last_name=:last_name, email=:email, password=:password WHERE admin_id_uuid=:admin_id_uuid");
        $request->bindValue(':identification_code', $admin->getFirst_name(), PDO::PARAM_STR);
        $request->bindValue(':first_name', $admin->getLast_name(), PDO::PARAM_STR);
        $request->bindValue(':last_name', $admin->getEmail(), PDO::PARAM_STR);
        $request->bindValue(':birth_date', $admin->getPassword(), PDO::PARAM_STR);
        $request->bindValue(':admin_id_uuid', $admin->getAdmin_id_uuid(), PDO::PARAM_STR);
        $request->execute();
    }

    public function delete(string $admin_id_uuid)
    {
        $request = $this->pdo->prepare("DELETE FROM `dt_admin` WHERE admin_id_uuid= :admin_id_uuid ");
        $request->bindValue(':admin_id_uuid', $admin_id_uuid, PDO::PARAM_STR);
        $request->execute();
    }

    public function getById(string $admin_id_uuid)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_admin WHERE admin_id_uuid= :admin_id_uuid");
        $request->bindValue(':admin_id_uuid', $admin_id_uuid, PDO::PARAM_STR);
        $request->execute();
        $data = $request->fetch();
        return new Admin($data);
    }

    public function getAll()
    {
        $request = $this->pdo->query("SELECT * FROM dt_admin ORDER BY identification_code ASC");
        $admins = array();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $admins[] = new Admin($datas);
        }
        return $admins;
    }


    public function login(string $email, string $password)
    {
        $request = $this->pdo->prepare("SELECT * FROM dt_admin WHERE email= :email");
        $request->bindValue(':email', $email, PDO::PARAM_STR);
        if ($request->execute()) {
            $admin = $request->fetch(PDO::FETCH_ASSOC);
            if ($admin === false) {
                // Si aucun utilisateur ne correspond au login entré, on affiche une erreur
                echo 'Identifiants invalides';
            } else {
                // On vérifie le hash du password
                if (password_verify($password, $admin['password'])) {
                    session_start();
                    $_SESSION['last_name']= $admin['last_name'];
                    $_SESSION['login'] = true;
                    echo '<script>window.location.href="../admin.php"</script>';
                } else {
                    echo 'Identifiants invalides';
                }
            }
        } else {
            echo 'Impossible de récupérer l\'utilisateur';
        }
    }
}
