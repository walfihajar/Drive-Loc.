<?php

/* we are using the singleton design pattern.
we defined a class named Database, a class is a blueprint for creating objects
and in this case this class is designed to handle database connections*/
class Database
{
    private $connection;
    private static $instance = null;
    /* this is a special variable used in the singleton design pattern
    it's used to ensure that only one instance or object of the database class is created 
    which prevents creating multiple database connections*/

    private $host = 'localhost';
    private $dbname = 'drive_loc';
    private $username = 'root'; 
    private $password = ''; 

    /* this is a special method that gets called when an object of the database
    class is created , it's marked private so that it can't be called from outside the class*/
    private function __construct()
    {
        try {
            /* we are using PDO (php data objects) the PDO object is a way to 
            to interact with databases in PHP*/

            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password );
            /* this is the data source name (DSN) that tells PDO where the database is located 
            and which database to connect to */

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // If there is an error (like a connection failure), an exception will be thrown, which can be caught and handled.
        } catch (PDOException $e) {
            
           die("Erreur de connexion à la base de données : " . $e->getMessage());
            exit();
        }
    }
    // this method is used to get the single instance of the database class (this is a singleton pattern)
    //it ensures that only one connection to the database is created and reused
    public static function getInstance()
    {
        if (self::$instance === null) { // this line checks if the instance has already been created 
            self::$instance = new self(); // if no instance exists, it creates a new instance of the class 
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
/* the singleton pattern is a design pattern in a software development that restricts the instantiation of a class 
to one single instance: this means that no matter how many times the class is requested or accessed, only one 
instance of the class will ever exist 
when to use it ? 
- when you need to control the creation of objects and ensure that a class has only one instance such as a db connection
- you dont want to have multiple instances of certain objects as tehy may interfere with each other 
- when you want to provide global access to a shared ressource but only one instance of that ressource 
*/