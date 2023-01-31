<?php

namespace app\Core;

use PDO;

/**
 * PDO PHP Persistence Class
 * https://github.com/victortassinari/pdophpclass
 *
 * @author Edson Pimenta <edson.tibo@gmail.com>
 */
class Model
{

    private static $_connection;

    private $_debug;
    private $_server;
    private $_user;
    private $_password;
    private $_database;

    /**
     * Contructor to declare db info.
     *
     * @return void
     */
    public function __construct()
    {

        $this->_debug = true;

        $this->_server   =  DB_HOST;
        $this->_user     =  DB_USER;
        $this->_password =  DB_PASS;
        $this->_database =  DB_NAME;
    }

    /**
     * Create a _database connection or return the connection already open using
     * Singletion Design Patern.
     *
     * @return PDOConnection|null
     */
    public function getConnection()
    {
        try {
            if (self::$_connection == null) {
                self::$_connection = new PDO("mysql:host={$this->_server};dbname={$this->_database};charset=utf8", $this->_user, $this->_password);
                self::$_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$_connection->setAttribute(PDO::ATTR_PERSISTENT, true);
            }

            return self::$_connection;
        } catch (\PDOException $ex) {
            if ($this->_debug)
                echo "<b>Error on getConnection(): </b>" . $ex->getMessage() . "<br/>";

            return null;
        }
    }

    /**
     * Unset connection
     *
     * @return void
     */
    public function disconnect()
    {
        self::$_connection = null;
    }

    /**
     * Return the last id of insert statement
     *
     * @return int
     */
    public function getLastID()
    {
        return $this->getConnection()->lastInsertId();
    }

    /**
     * Start one _database transaction
     *
     * @return void
     */
    public function beginTransaction()
    {
        return $this->getConnection()->beginTransaction();
    }

    /**
     * Commit changes on opened transaction
     *
     * @return void
     */
    public function commit()
    {
        return $this->getConnection()->commit();
    }

    /**
     * Roolback changes on opened transaction
     *
     * @return void
     */
    public function rollback()
    {
        return $this->getConnection()->rollBack();
    }

    /**
     * Returns the result of a query (select) of only one row
     *
     * @param string $sql the sql string
     * @param array  $params the array of parameters (array(":col1" => "val1",":col2" => "val2"))
     *
     * @return one position array for the result of query
     */
    public function executeQueryOneRow($sql, $params = null)
    {
        try {

            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $ex) {
            if ($this->_debug) {
                echo "<b>Error on ExecuteQueryOneRow():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }
            return null;
        }
    }

    /**
     * returns the result of a query (select)
     *
     * @param string $sql the sql string
     * @param array  $params the array of parameters (array(":col1" => "val1",":col2" => "val2"))
     *
     * @return array for the result of query
     */
    public function executeQuery($sql, $params = null)
    {
        try {
            $stmt = $this->getConnection()->prepare($sql);

            $stmt->execute($params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            if ($this->_debug) {
                echo "<b>Error on ExecuteQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }
            return null;
        }
    }

    /**
     * returns if the query was successful
     *
     * @param string $sql the sql string
     * @param array  $params the array of parameters (array(":col1" => "val1",":col2" => "val2"))
     *
     * @return boolean
     */
    public function executeNonQuery($sql, $params = null)
    {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            return $stmt->execute($params);

        } catch (\PDOException $ex) {
            if ($this->_debug) {
                echo "<b>Error on ExecuteNonQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }

            return false;
        }
    }

    /**
     * returns number of rows affected
     *
     * @param string $sql the sql string
     * @param array  $params the array of parameters (array(":col1" => "val1",":col2" => "val2"))
     *
     * @return int
     */
    public function NumberRows($sql, $params = null)
    {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute($params);

            return $stmt->rowCount();
        } catch (\PDOException $ex) {
            if ($this->_debug) {
                echo "<b>Error on ExecuteNonQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
            }

            return -1;
        }
    }

    public function getDebugState()
    {
        return $this->_debug;
    }
}
