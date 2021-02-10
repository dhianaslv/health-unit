<?php

namespace src\data\repository;

use src\data\repository\Connection;
use app\models\User;

class UserRepository
{

    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
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
        try {
            $sql = "INSERT INTO user (cpf, name, genre, date_of_birth, naturalness,
                    address, responsibility) 
                    VALUES (:cpf, :name, :genre, :date_of_birth, :naturalness, :address, :responsibility)";

            $stmt = $this->conn->getConnection()->prepare($sql);

            $success = $stmt->execute(array(
                ':cpf' => $cpf,
                ':name' => $name,
                ':genre' => $genre,
                ':date_of_birth' => $date_of_birth,
                ':naturalness' => $naturalness,
                ':address' => $address,
                ':responsibility' => $responsibility,
            ));

            if ($success) {
                return $success;
            }

            $response = "Não foi possível realizar o cadastro do funcionário(a).
            Verifique sua conexão com a internet ou tente mais tarde.";

            return $response;
        } catch (\Exception $e) {
            return "Exception: $e";
        } finally {
            $this->conn->disconnect();
        }
    }

    public function update($user)
    {
        try {
            $sql = "UPDATE user SET name = :name, genre = :genre,
            date_of_birth = :date_of_birth, naturalness = :naturalness, 
            responsibility = :responsibility,  address = :address, active = :active
            WHERE cpf = :cpf";

            $stmt = $this->conn->getConnection()->prepare($sql);

            $success = $stmt->execute(array(
                ':cpf' => $user->getCpf(),
                ':name' => $user->getName(),
                ':genre' => $user->getGenre(),
                ':date_of_birth' => $user->getDateOfBirth(),
                ':responsibility' => $user->getResponsibility(),
                ':naturalness' => $user->getNaturalness(),
                ':address' => $user->getAddress(),
                ':active' => $user->getActive(),
            ));

            if ($success) {
                return $success;
            }

            $response = "Não foi possível realizar as alterações desejadas.
            Verifique sua conexão com a internet ou tente mais tarde.";

            return $response;
        } catch (\Exception $e) {
            return "Exception: $e";
        } finally {
            $this->conn->disconnect();
        }
    }

    public function allUsers()
    {
        try {
            $sql = "SELECT * FROM user";

            $stmt = $this->conn->getConnection()->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetchAll();

            if ($result != null) {
                $list = [];

                foreach ($result as $row) {
                    $cpf = $row['cpf'];
                    $name = $row['name'];
                    $genre = $row['genre'];
                    $date_of_birth = $row['date_of_birth'];
                    $naturalness = $row['naturalness'];
                    $address = $row['address'];
                    $responsibility = $row['responsibility'];
                    $username = $row['username'];
                    $password = $row['password'];

                    if ($row['active']) {
                        $active = "Ativo";
                    } else {
                        $active = "Inativo";
                    }

                    $user = new User();
                    $user->constructor(
                        $cpf,
                        $name,
                        $genre,
                        $date_of_birth,
                        $naturalness,
                        $address,
                        $responsibility,
                        $username,
                        $password,
                        $active
                    );

                    array_push($list, $user);
                }

                return $list;
            }

            $response = "Não foi possível trazer a lista de funcionários";
            return $response;
        } catch (\Exception $e) {
            return "Exception: $e";
        } finally {
            $this->conn->disconnect();
        }
    }

    public function fetchUser($cpf)
    {
        try {
            $sql = "SELECT * FROM user WHERE cpf = :cpf";

            $stmt = $this->conn->getConnection()->prepare($sql);

            $stmt->execute(array(
                ':cpf' => $cpf
            ));

            $result = $stmt->fetchAll();

            if ($result != null) {
                $name = $result[0]['name'];
                $genre = $result[0]['genre'];
                $date_of_birth = $result[0]['date_of_birth'];
                $naturalness = $result[0]['naturalness'];
                $address = $result[0]['address'];
                $responsibility = $result[0]['responsibility'];
                $username = $result[0]['username'];
                $password = $result[0]['password'];
                $active = $result[0]['active'];

                $user = new User();
                $user->constructor(
                    $cpf,
                    $name,
                    $genre,
                    $date_of_birth,
                    $naturalness,
                    $address,
                    $responsibility,
                    $username,
                    $password,
                    $active
                );

                return $user;
            }

            $response = "Não foi possível trazer o funcionário(a) escolhido.";
            return $response;
        } catch (\Exception $e) {
            return "Exception: $e";
        } finally {
            $this->conn->disconnect();
        }
    }

    public function signIn($username, $password)
    {
        try {

            $sql = 'SELECT * FROM user WHERE username = :username 
            AND password = :password AND active = :active';

            $stmt = $this->conn->getConnection()->prepare($sql);

            $stmt->execute(array(
                ':username' => $username,
                ':password' => $password,
                ':active' => 1,
            ));

            $result = $stmt->fetchAll();

            if ($result != null) {
                $cpf = $result[0]['cpf'];
                $name = $result[0]['name'];
                $genre = $result[0]['genre'];
                $date_of_birth = $result[0]['date_of_birth'];
                $naturalness = $result[0]['naturalness'];
                $address = $result[0]['address'];
                $responsibility = $result[0]['responsibility'];
                $active = $result[0]['active'];

                $user = new User();
                $user->constructor(
                    $cpf,
                    $name,
                    $genre,
                    $date_of_birth,
                    $naturalness,
                    $address,
                    $responsibility,
                    $username,
                    $password,
                    $active
                );

                return $user;
            }

            $response = "Não foi possível realizar o login.";
            return $response;
        } catch (\Exception $e) {
            return "Exception: $e";
        } finally {
            $this->conn->disconnect();
        }
    }

    public function save($cpf, $username, $password)
    {
        try {
            $select = "SELECT * FROM user WHERE cpf = :cpf AND active = :active";

            $stmt = $this->conn->getConnection()->prepare($select);

            $stmt->execute(array(
                ':cpf' => $cpf,
                ':active' => 1,
            ));

            $user = $stmt->fetchAll();

            if ($user != null) {

                $sql = "UPDATE user SET username = :username, password = :password 
                        WHERE cpf = :cpf";

                $stmt = $this->conn->getConnection()->prepare($sql);

                $success = $stmt->execute(array(
                    ':cpf' => $cpf,
                    ':username' => $username,
                    ':password' => $password,
                ));

                if ($success) {
                    return $success;
                }

                $response = "Não foi possível realizar o cadastro do usuário na plataforma";

                return $response;
            }

            $response = "Você não é um Funcionário desta Unidade de Saúde.";

            return $response;
        } catch (\Exception $e) {
            return "Exception: $e";
        } finally {
            $this->conn->disconnect();
        }
    }
}
