<?php

require_once("../util/database.php");

class User {
    private ?int $id_user;
    private string $nome;
    private DateTime $nascita;
    private string $provincia;
    private bool $patente;
    private string $hobby;

    public function __construct(
        ?int $id_user,
        string $nome,
        DateTime $nascita,
        string $provincia,
        bool $patente,
        string $hobby
    ) {
        $this->id_user = $id_user;
        $this->nome = $nome;
        $this->nascita = $nascita;
        $this->provincia = $provincia;
        $this->patente = $patente;
        $this->hobby = $hobby;
    }

    public function getId() {
        return $this->id_user;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getNascita() {
        return $this->nascita;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getPatente() {
        return $this->patente;
    }

    public function getHobby() {
        return $this->hobby;
    }

    public function setNome(string $val) {
        $this->nome = $val;
    }

    public function setNascita(DateTime $val) {
        $this->nascita = $val;
    }

    public function setProvincia(string $val) {
        $this->provincia = $val;
    }

    public function setPatente(bool $val) {
        $this->patente = $val;
    }

    public function setHobby(string $val) {
        $this->hobby = $val;
    }

    // CRUD

    public static function insert(User $user) {
        $query = 
        "INSERT INTO users " . 
        "(" . 
            "nome," . 
            "nascita," . 
            "provincia," . 
            "patente," . 
            "hobby" . 
        ") VALUES (" .  
            "'{$user->getNome()}'," . 
            "'{$user->getNascita()->format("Y-m-d")}'," . 
            "'{$user->getProvincia()}'," . 
            "'{$user->getPatente()}'," . 
            "'{$user->getHobby()}'" . 
        ")";
        Database::getConnection()->query($query);
        if (Database::getConnection()->errno) {
            die(Database::getConnection()->error);
        }
    }

    public static function get(int $id_user) : User {
        $query = "SELECT * FROM users WHERE id_user='".$id_user."'";
        $res = Database::getConnection()->query($query);
        $user = $res->fetch_assoc();
        return new User(
            $user["id_user"],
            $user["nome"],
            new DateTime($user["nascita"]),
            $user["provincia"],
            $user["patente"],
            $user["hobby"]
        );
    }

    public static function getList() : array {
        $query = "SELECT * FROM users";
        $res = Database::getConnection()->query($query);
        while ($user = $res->fetch_assoc()) {
            $users[] = new User(
                $user["id_user"],
                $user["nome"],
                new DateTime($user["nascita"]),
                $user["provincia"],
                $user["patente"],
                $user["hobby"]
            );
        }
        return $users;
    }

    public static function update(User $user) {
        $query =
        "UPDATE users SET " . 
        "nome = '{$user->getNome()}', " . 
        "nascita = '{$user->getNascita()->format("Y-m-d")}', " . 
        "provincia = '{$user->getProvincia()}', " . 
        "patente = '{$user->getPatente()}', " . 
        "hobby = '{$user->getHobby()}' " . 
        "WHERE id_user = {$user->getId()}";
        Database::getConnection()->query($query);
        if (Database::getConnection()->errno) {
            die(Database::getConnection()->error);
        }
    }

    public static function delete(User $user) {
        $query = "DELETE FROM users WHERE " . 
        "id_user = '{$user->getId()}'";
        Database::getConnection()->query($query);
    }
}