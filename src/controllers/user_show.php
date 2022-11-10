<?php
require_once("../models/user.php");
$users = User::getList();
require_once("../views/user_show.php");