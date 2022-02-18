<?php

namespace App\Domain\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    const HOSTNAME = "127.0.0.1";
    const USERNAME = "root";
    const PASSWORD = "10sa!@#SA";
    const DBNAME = "dbEcommerce";

    public function createConnection(PDO $connection): PDO
    {
        return new PDO("mysql:dbname=" . Sql::DBNAME . ";host=" . Sql::HOSTNAME,
            Sql::USERNAME,
            Sql::PASSWORD
        );
    }
}