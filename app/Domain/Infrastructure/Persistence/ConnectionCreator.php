<?php

namespace App\Domain\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    const HOSTNAME = "127.0.0.1";
    const USERNAME = "root";
    const PASSWORD = "10sa!@#SA";
    const DBNAME = "dbEcommerce";

    public function createConnection(): PDO
    {
        return new PDO("mysql:dbname=" . SELF::DBNAME . ";host=" . SELF::HOSTNAME,
            SELF::USERNAME,
            SELF::PASSWORD
        );
    }
}