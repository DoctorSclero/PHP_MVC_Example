<?php
    require_once("../models/user.php");
    
    if (isset($_REQUEST["id"])) {
        $id = intval($_REQUEST["id"]);
        $user = User::get($id);
        require_once("../views/user_update.php");
    } else {
        die("User id must be specified!");
    }
    
?>