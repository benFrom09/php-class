<?php
return [


    "options" => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ],

    "default" => "mysql",

    "connections" => [
        // MySQL
        "mysql" => [
            "driver" => "mysql",
            "host_name" => "localhost",
            "db_name" => "test_db",
            "db_user" => "root",
            "db_password" => "root"
        ],
         // PostgreSQL
         "pgsql" => [
            "driver" => "pgsql",
            "host_name' => 'localhost",
            "db_name' => 'database_name",
            "db_user' => 'database_username",
            "db_password' => 'database_user_password"
        ],

        // SQLite
        "sqlite" => [
            "db_path" => 'my/database/path/database.db',
        ],
    ]
];