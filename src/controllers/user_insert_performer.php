<?php
require_once("../models/user.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {  //controlla che il metodo di richiesta sia POST
    if (
        isset($_REQUEST["nome"])
        &&
        isset($_REQUEST["data_nascita"])
        &&
        isset($_REQUEST["provincia"])
        &&
        isset($_REQUEST["hobby"])
    ) {
        $nome = $_REQUEST["nome"];
        $provincia = $_REQUEST["provincia"];
        $nascita = new DateTime($_REQUEST["data_nascita"], new DateTimeZone("Europe/Rome"));
        $patente = (isset($_REQUEST["patente"])) ? true : false;
        $hobby = $_REQUEST["hobby"];

        $user = new User(
            null,
            $nome,
            $nascita,
            $provincia,
            $patente,
            $hobby
        );

        User::insert($user);
        header("Location: ../views/user_insert.php");
    }
}
