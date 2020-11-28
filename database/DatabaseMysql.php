<?php
require_once 'DataBase.php';
require_once 'config/configDB.php';

class DatabaseMysql extends DataBase
{

    public function __construct()
    {
        parent::__construct(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD, DB_CHARSET);
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->databaseName,
                $this->user,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET CHARACTER SET " . $this->charset);
        } catch (PDOException $exeption) {
            throw $exeption;
        }
    }

    public function disconnect()
    {
    }

}
