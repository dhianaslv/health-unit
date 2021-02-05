<?php

namespace src\services;

use src\data\Facade;

class UserService
{

    private $facade;

    public function __construct()
    {
        $this->facade =  new Facade();
    }

    public function register(
        $cpf,
        $name,
        $genre,
        $date_of_birth,
        $naturalness,
        $address,
        $responsibility
    ) {

        $result = $this->facade->registerUser(
            $cpf,
            $name,
            $genre,
            $date_of_birth,
            $naturalness,
            $address,
            $responsibility
        );

        return $result;
    }

    public function update($user)
    {

        $result = $this->facade->updateUser($user);

        return $result;
    }

    public function allUsers()
    {
        $result = $this->facade->allUsers();

        return $result;
    }

    public function fetchUser($cpf)
    {
        $result = $this->facade->fetchUser($cpf);

        return $result;
    }

    public function signIn($username, $password)
    {
        $result = $this->facade->signIn($username, $password);

        return $result;
    }
}
