<?php

namespace App\Model\Repository;

use App\Model\Entity\User;
use App\Service\Database;

class UserRepository
{

    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function install()
    {
        $query = "DROP TABLE IF EXISTS utilisateur;
        CREATE TABLE utilisateur (
            id INT(11) AUTO_INCREMENT,
            login VARCHAR(255),
            password VARCHAR(255),
            mail VARCHAR(255),
            PRIMARY KEY (id)
        );
        INSERT INTO utilisateur(login, password, mail) VALUES ('dgueudre', 'demo', 'dgueudre@test.local')";
        return $this->db->query($query);
    }

    public function add(User $user)
    {
        $query = 'INSERT INTO utilisateur (login, password, mail) VALUES (?,?,?);';
        $sth = $this->db->prepare($query);
        $sth->execute([$user->login, $user->password, $user->mail]);
    }

    public function getAll()
    {
        $sth = $this->db->prepare('SELECT * FROM utilisateur;');
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

    public function get($id)
    {
        $sth = $this->db->prepare('SELECT * FROM utilisateur WHERE id = ?;');
        $sth->execute([$id]);

        return $sth->fetchAll(\PDO::FETCH_CLASS, User::class)[0];
    }

    public function update(User $user)
    {
        $query = 'UPDATE utilisateur SET login = ?, password = ?, mail = ? WHERE id = ?;';
        $sth = $this->db->prepare($query);
        $sth->execute([$user->login, $user->password, $user->mail, $user->id]);
    }

    public function delete($id)
    {
        $sth = $this->db->prepare('DELETE FROM utilisateur WHERE id = ?;');
        $sth->execute([$id]);
    }
}
