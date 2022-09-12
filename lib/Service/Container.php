<?php


class Container
{
    private $configuration;
    private $pdo;
    private $userLoader;
    private $userManager;
    private $userStorage;

    public function __construct($configuration){
        $this->configuration = $configuration;

    }

    public function getPdo(){
        if($this->pdo === null){
            $this->pdo = new PDO(
              $this->configuration['db_dsn'],
              $this->configuration['db_user'],
              $this->configuration['db_pass']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }
    public function getUserStorage(){
        if($this->userStorage === null){
            $this->userStorage = new PdoUserStorage($this->getPdo());
        }
        return $this->userStorage;
    }
    public function getUserLoader(){
        if($this->userLoader === null){
            $this->userLoader = new UserLoader($this->getPdo());
        }
        return $this->userLoader;
    }
    public function getUserManager(){
        if($this->userManager === null){
            $this->userManager = new UserManager($this->getUserStorage());
        }
        return $this->userManager;
    }


}