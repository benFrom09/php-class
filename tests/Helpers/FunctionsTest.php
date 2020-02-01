<?php

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    
    public function test_config_function() {
        require dirname(dirname(__DIR__)) . "/Ben09/Helpers/functions.php";
        $db_options =dbConfig('options');
        $this->assertIsArray($db_options);
        $db_default = dbConfig('default');
        $this->assertEquals("mysql", $db_default);
        $db_name = dbConfig('db_name');
        $this->assertEquals("test_db", $db_name);
        $db_connection = dbConfig('connections');
        $this->assertIsArray($db_connection);
    }
}