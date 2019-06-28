<?php

namespace App\Application;

use \Dotenv\Dotenv;

class DatabaseConfig {

    // private const HOSTNAME = 'localhost';
    // private const DATABASE = 'test';
    // private const USER = 'root';
    // private const PASSWORD = 'online@2017';

    /**
     * @var PDO
     */
    public $db;


    private function config () {

        $dotenv = \Dotenv\Dotenv::create('../');
        $dotenv->load();
        try {
            // un \ devant PDO car PDO() n'appartient pas à mon espace de nom
            $this->db = new \PDO
                ('mysql:host=' .getenv('HOSTNAME') . ';
                dbname=' .getenv('DBNAME'), getenv('USER'), getenv('PASSWORD'));
        } 
        catch (exception $e) {
            die('erreur : ' . $e->get->message());
        }
    }


    public function connect () {

        $this->config();
    }
}