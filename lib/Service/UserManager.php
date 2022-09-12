<?php


class UserManager
{
    private $userStorage;

    public function __construct($userStorage)
    {
        $this->userStorage = $userStorage;
    }

    public function getUsers()
    {
        $usersData = $this->userStorage->fetchAllUsersData();
        foreach($usersData as $user){
            $users[] = $this->createUserFromData($user);
        }
        return $users;
    }
    public function createUserFromData($userData){
        $user = new Person($userData['name']);
        $user->setUsername($userData['userName']);
        $user->setEmail($userData['email']);
        $user->setRole($userData['role']);
        $user->setPassword($userData['password']);
        $user->setId($userData['id']);

        return $user;
    }
    public function deleteUser($id){
        $this->userStorage->fetchDeletedUser($id);

    }
}