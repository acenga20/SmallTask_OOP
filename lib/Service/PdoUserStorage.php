<?php

class PdoUserStorage implements UserStorageInterface{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAllUsersData()
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare("SELECT * FROM person");
        $stmt->execute();
        $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usersData;
    }

    public function fetchDeletedUser($id)
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare("DELETE FROM person WHERE id= :id");
        $stmt->bindParam('id',$id);
        $stmt->execute();

    }

    public function fetchSingleUsersData($id)
    {
        // TODO: Implement fetchSingleUsersData() method.
    }
}