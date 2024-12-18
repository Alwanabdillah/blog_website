<?php

require_once __DIR__ . '../../model/model.php';
require_once __DIR__ . '../../model/users.php';


$user = new Users();
$user->logout();


header("Location: login.php");
exit;
