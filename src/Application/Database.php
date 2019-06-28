<?php

namespace App\Application;

use App\Application\DatabaseConfig;

class Database extends DatabasseConfig
{
    //PDO_STATEMENT
    private $sth;

    public function __construct()
    {
        $this->connect();
    }

    protected function prepare(string $sql):void
    {
        $this->sth = $this->db->prepare($sql);

    }

    //mixed car on s'attend un un autre type qu'une chaine de caractère | 3paramètre avec bindParam
    protected function bindParam( string $param, mixed $var, \PDO $type ):void

    {
        $this->sth->bindParam( $param, $var, $type);
    }

    protected function execute()
    {
        $this->sth->execute();
    }

    protected function fetchAll()
    {
       return $this->sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function fetch()
    {
       return $this->sth->fetch(\PDO::FETCH_ASSOC);
    }
}