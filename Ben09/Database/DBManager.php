<?php
declare(strict_types=1);

namespace Ben09\Database;

use Ben09\Database\Generic\Delete;
use Ben09\Database\Generic\Insert;
use Ben09\Database\Generic\Select;

class DBManager
{
    use Select;
    use Insert;
    use Delete;
    /**
     * Instance of PDO
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Database table name
     *
     * @var string $table database table name
     */
    protected $table;

    protected $primary_key = "id";
 


    public function __construct() {
        if($this->pdo === null) {
            $conn = new DBConnection();
            $this->pdo = $conn->getConnection();
        } 
    }

    /**
     * PDO query request
     *
     * @param string $sql sql query string
     * @return PDOStatement|null
     */
    public function query($sql) {
        return $this->pdo->query($sql);
    }

    /**
     * PDO prepared request
     *
     * @param string $sql sql query string
     * @return PDOStatement|false
     */
    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }

    /**
     * Truncate database table
     *
     * @param string $table database table name
     * @return PDOStatement|false
     */
    public function purge(string $table = null) {
        if(!is_null($table)) {
            $this->table = $table;
        }
         $statement = $this->prepare("TRUNCATE TABLE {$this->table}");
         return $statement;
    }

    /**
     * set the database table to query on
     *
     * @param string|null $table database table name
     * @return self
     */
    public function table(?string $table = null):self {
        if(!is_null($table)) {
            $this->table = $table;
        }  
        return $this;
    }

    public function lastnIsertId():string {
        return $this->pdo->lastnIsertId();
    }

      

    
}