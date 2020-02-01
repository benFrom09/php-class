<?php
namespace Ben09\Database;

use PDO;

trait DBProvider
{
    

    protected function mysql() {
        $pdo = new PDO(
                            "mysql:host=" . dbConfig("host_name") . ";dbname="
                             . dbConfig("db_name"),dbConfig("db_user"),
                            dbConfig("db_password"),dbConfig("options")
                            );
        $pdo->exec("set names " . 'utf8');
        return $pdo;
    }
}