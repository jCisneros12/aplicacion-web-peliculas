<?php

abstract class DataBase
{
    //almacenar conexion
    protected $conn;
    //parametros de conexion
    protected $host;
    protected $databaseName;
    protected $user;
    protected $password;
    //utf-...
    protected $charset;

    function __construct($host, $databaseName, $user, $password, $charset)
    {
        $this->host = $host;
        $this->databaseName = $databaseName;
        $this->user = $user;
        $this->password = $password;
        $this->charset = $charset;
    }

    public function getConnection(){
        return $this->conn;
    }

    abstract public function connect();
    abstract public function disconnect();

}
