<?php
    require_once("../models/user.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (
            isset($_REQUEST["nome"])
            &&
            isset($_REQUEST["data_nascita"])
            &&
            isset($_REQUEST["provincia"])
            &&
            isset($_REQUEST["hobby"])
        ) {
            $id = $_REQUEST["id"];
            $nome = $_REQUEST["nome"];
            $provicia = $_REQUEST["provincia"];
            $nascita = new DateTime($_REQUEST["data_nascita"], new DateTimeZone("Europe/Rome"));
            $patente = (isset($_REQUEST["patente"])) ? true : false;
            $hobby = $_REQUEST["hobby"];
    
            $user = User::get($id);
            $user->setNome($nome);
            $user->setProvincia($provicia);
            $user->setNascita($nascita);
            $user->setPatente($patente);
            $user->setHobby($hobby);
    
            User::update($user);
            header("Location: ../views/user_show.php");
        }
    }
?>