<?php

class Database {
    private static $connection = null;

    public static function getConnection() {
        if (self::$connection === null) {
            $host = getenv('DB_HOST') ?: 'db';
            $dbName = getenv('DB_NAME') ?: 'fibromialgia';
            $username = getenv('DB_USER') ?: 'fibadmin';
            $password = getenv('DB_PASS') ?: 'fibpassword';

            try {
                $dsn = "pgsql:host=$host;dbname=$dbName";
                self::$connection = new PDO($dsn, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro de conexão com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
