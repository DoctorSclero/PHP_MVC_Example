<?php

require_once("../models/user.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (
        isset($_REQUEST["user_id"])
    ) {
        $user_id = $_REQUEST["user_id"];
        $user = User::get($user_id);
        User::delete($user);
        header("Location: ../views/user_show.php");
    }
    
}