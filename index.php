<?php

use App\Models\UserManager;


require "vendor/autoload.php";

//require for db config and instanciate pdo;
require "Ben09/Helpers/functions.php";


$db = new UserManager();
// create data
$create = $db->new(["user_name"=>"your user name"]);
//fetchall data
$fetchall = $db->fetchAll();
//find data by id
$fetch = $db->find(1);
//delete specific data
$delete->delete('user_name','=','ben');
//puge table
$deleteAll = $db->purge();
