<?php

class Database
{
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    private $db_handler, $query;

    public function __construct()
    {
        $source = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->db_handler = new PDO($source, $this->db_user, $this->db_pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($sql)
    {
        $this->query = $this->db_handler->prepare($sql);
        return $this->query;
    }

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->query->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->query->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->query->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        return $this->query->rowCount();
    }
}
