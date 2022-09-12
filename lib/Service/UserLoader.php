<?php


class UserLoader
{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function save_person(){

        $name = $_REQUEST['name'];
        $username = $_REQUEST['userName'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $role = $_REQUEST['role'];
        $query = 'INSERT INTO person (name, userName, email, password, role) VALUES (?,?,?,?,?)';

        if($role != ''){
            $role = $_REQUEST['role'];
         } else{
            $role = 'SIMPLE';
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$name, $username, $email,$password,$role]);
    }

    public function log_in(){
        $username = $_REQUEST['userName'];
        $password = $_REQUEST['password'];
        $query = 'SELECT * FROM person WHERE userName= :username and password = :password';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam('username',$username);
        $stmt->bindParam('password', $password);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetchAll();
        $user_data = $row[0];
        var_dump($row[0]['role']);
        if($count == 1){
            $_SESSION['userName'] = $user_data['userName'];
            $_SESSION['role'] = $user_data['role'];
            header("Location: index.php");
        }else{
            echo "Wrong password or userName";
            header("Location: signin.php");
        }

    }



}