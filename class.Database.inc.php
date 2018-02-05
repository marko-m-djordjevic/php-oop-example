<?php

/**
 * MySQLi database; only one connection is allowed
 */
class Database {
    private $_connection;
    // Store the single instance
    private static $_instance;

    /**
     * Get an instace of database
     * @return Database
     */
    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance =  new self();
        }
        return self::$_instance;
    }

    /**
     * Constuctor
     */
    function __construct(){
        $this->_connection = new mysqli( 'localhost', 'root', '', 'sandbox' );
        // Error handling
        if ( mysqli_connect_error() ) {
            trigger_error( 'Faild to connecto to MySQL: ' . mysqli_connect_error(), E_USER_ERROR );
        }
    }

    /**
     * Empty colone magic metod to prevent duplication.
     */
    private function __clone() {}

    /**
     * Get the mysqli connection
     */
    public function getConnection() {
        return $this->_connection;
        //return new mysqli( 'localhost', 'root', '', 'sandbox' );
    }
}