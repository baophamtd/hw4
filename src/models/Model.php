<?php

namespace threemuskateers\hw4\models;

use mysqli;
require_once(realpath(dirname(__FILE__) . '/../configs/Config.php'));
require_once(realpath(dirname(__FILE__) . '/../configs/CreateDB.php'));

abstract class Model {
    private $connection;
    /**
     * Connect to the database
    */
    public function connectToDB() {
        //Establish connection to database
        $this->connection = mysqli_connect("localhost","root","mypassword");

        // Create database
        //Check connection was successful
        if($this->connection->connect_error) {
            echo "Connection failed: " . $this->connection->connect_error . "\n";
        }
        mysqli_select_db($this->connection, 'hw4');
        return $this->connection;
    }
}

?>


