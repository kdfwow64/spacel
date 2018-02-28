<?php


/*-------------------------------------------------------------------------------------------*/
// DB Class
/*-------------------------------------------------------------------------------------------*/

class DB
{
    private $_conn
    , $_resultSet
    , $_error
    , $_errorMessage
    , $_rowCount
    , $_affectedRows
    , $_queryStmt
    , $_lastInsertedId
    , $_error_code;

    /*---------------------------------------------------------------------------------------*/
    /**
     * DB constructor.
     * @param null
     */
    public function __construct()
    {
        $this->_conn = null;
        $this->_resultSet = array();
        $this->_error = false;
        $this->_errorMessage = null;
        $this->_rowCount = 0;
        $this->_affectedRows = 0;
        $this->_queryStmt = null;
        $this->_lastInsertedId = 0;
        $this->_error_code = null;
    }


    /*---------------------------------------------------------------------------------------*/

    /**
     * DB Connection
     * @return $conn
     */
    function DBConnection()
    {
        /*----------------------------------------------------------------------------------*/
//Connection String
        /*----------------------------------------------------------------------------------*/
//        $connection_string = "sqlsrv:Server=" . SERVER . ";Database=" . DB_NAME;
        $connection_string = "mysql:host=" . SERVER . ";dbname=" . DB_NAME;
        /*----------------------------------------------------------------------------------*/
// Establishing Connection

        /*----------------------------------------------------------------------------------*/
        try {
            $this->_conn = new PDO($connection_string, DB_USER, DB_PASS);
            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failed" . $e->getMessage();
        }
        /*----------------------------------------------------------------------------------*/

        return $this->_conn;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @return null
     */
    public function getConn()
    {
        return $this->_conn;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @param null $conn
     */
    public function setConn($conn)
    {
        $this->_conn = $conn;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @return array
     */
    public function getResultSet()
    {
        return $this->_resultSet;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @param array $resultSet
     */
    public function setResultSet($resultSet)
    {
        $this->_resultSet = $resultSet;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @return boolean
     */
    public function isError()
    {
        return $this->_error;
    }

    /**
     * @param boolean $error
     */
    public function setError($error)
    {
        $this->_error = $error;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @return null
     */
    public function getErrorMessage()
    {
        return $this->_errorMessage[2];
    }

    /*---------------------------------------------------------------------------------------*/
    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->_error_code[1];
    }

    /*---------------------------------------------------------------------------------------*/
    /**
     * @param int $error_code
     */
    public function setErrorCode($error_code)
    {
        $this->_error_code = $error_code;
    }

    /*---------------------------------------------------------------------------------------*/

    /**
     * @param null $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->_errorMessage = $errorMessage;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @return int
     */
    public function getRowCount()
    {
        return $this->_rowCount;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @param int $rowCount
     */
    public function setRowCount($rowCount)
    {
        $this->_rowCount = $rowCount;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @return int
     */
    public function getAffectedRows()
    {
        return $this->_affectedRows;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @param int $affectedRows
     */
    public function setAffectedRows($affectedRows)
    {
        $this->_affectedRows = $affectedRows;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @return null
     */
    public function getQueryStmt()
    {
        return $this->_queryStmt;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @param null $queryStmt
     */
    public function setQueryStmt($queryStmt)
    {
        $this->_queryStmt = $queryStmt;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @return int
     */
    public function getLastInsertedId()
    {
        return $this->_lastInsertedId;
    }
    /*---------------------------------------------------------------------------------------*/

    /**
     * @param int $lastInsertedId
     */
    public function setLastInsertedId($lastInsertedId)
    {
        $this->_lastInsertedId = $lastInsertedId;
    }

    /*---------------------------------------------------------------------------------------*/

    public function fetch_data($attr, $table_name, $WHERE_CLAUSE = "", $DEBUG = false)
    {
        $this->_error = false;
        if (is_array($attr) || count($attr) > 1) {
            $attr = implode(" , ", $attr);
        }
        if (is_array($table_name) || count($table_name) > 1) {
            $table_name = implode(" , ", $table_name);
        }
        $this->_queryStmt = "SELECT {$attr} FROM {$table_name}";
        if ($WHERE_CLAUSE) {
            $this->_queryStmt .= " {$WHERE_CLAUSE}";
        }
        if (!$DEBUG) {
            try {
                $DB = $this->DBConnection();
                $query = $DB->query($this->_queryStmt);
                if (!$query) {
                    $this->_error = true;
                    $this->_errorMessage = $DB->errorInfo();
                    $this->_error_code = $DB->errorInfo();
                } else {
                    $this->_resultSet = $query->fetchAll(PDO::FETCH_OBJ);
                    $this->_rowCount = $query->rowCount();
                }
                $this->DBClose();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


    /*---------------------------------------------------------------------------------------*/

    /**
     * DB Connection Ends
     * @return Null
     */
    public function DBClose()
    {
        $this->_conn = null;
    }
    /*---------------------------------------------------------------------------------------*/

    /*
    * Direct Query ExecuteSSSSSSSr
    * @return VOID
    * */

    public function execute_query($query)
    {
        $this->_queryStmt = $query;
        try {
            $DB = $this->DBConnection();
            $query = $DB->query($this->_queryStmt);
            if (!$query) {
                $this->_error = true;
                $this->_errorMessage = $DB->errorInfo();
                $this->_error_code = $DB->errorInfo();
            } else {
                $this->_resultSet = $query->fetchAll(PDO::FETCH_OBJ);
                $this->_rowCount = $query->rowCount();
            }
            $this->DBClose();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*---------------------------------------------------------------------------------------*/

    /*
    * General Function for
    * Truncate Data to Database
    * @return Boolean
    * */
    public function truncate_table($tableName)
    {

    }


    /*---------------------------------------------------------------------------------------*/

    /*---------------------------------------------------------------------------------------*/

    /*
    * General Function for
    * Insert Data to Database
    * @return Boolean
    * */

    public
    function insert_data($data = array(), $table_name, $DEBUG = false)
    {
        $this->_error = false;
        $data_arr = null;
        $value_arr = null;
        foreach ($data as $item => $value) {
            $data_arr[] = $item;
            $value_arr[] = "'" . $value . "'";
        }
        $data_arr = implode(" , ", $data_arr);
        $value_arr = implode(" , ", $value_arr);
        $this->_queryStmt = "INSERT INTO {$table_name} ({$data_arr}) VALUES ({$value_arr})";
        if (!$DEBUG) {
            try {
                $DB = $this->DBConnection();
                $query = $DB->exec($this->_queryStmt);
                if (!$query) {
                    $this->_error = true;
                    $this->_errorMessage = $DB->errorInfo();
                    $this->_error_code = $DB->errorInfo();
                    return false;
                } else {
                    $this->_lastInsertedId = $DB->lastInsertId();
                    return true;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

    }
    /*---------------------------------------------------------------------------------------*/

    /*
    * Update Data in DB
    * @param (array) Data , (string) Table Name , (string) Where Clause
    * @return boolean
    * */

    public function update_data($data = array(), $table_name, $WHERE_CLAUSE = "", $DEBUG = false)
    {
        $this->_error = false;
        $data_arr = null;
        foreach ($data as $item => $value) {
            $data_arr[] = $item . " = '" . $value . "'";
        }
        $data_arr = implode(" , ", $data_arr);
        $this->_queryStmt = "UPDATE {$table_name} SET {$data_arr}";
        if ($WHERE_CLAUSE) {
            $this->_queryStmt .= " {$WHERE_CLAUSE}";
        }
        if (!$DEBUG) {
            try {
                $DB = $this->DBConnection();
                $query = $DB->exec($this->_queryStmt);
                if (!$query) {
                    $this->_error = true;
                    $this->_errorMessage = $DB->errorInfo();
                    $this->_error_code = $DB->errorInfo();
                    return false;
                } else {
                    return true;
                }
                $this->DBClose();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    /*---------------------------------------------------------------------------------------*/
    /*
    * Delete Data in DB
    * @param  (string) Table Name , (string) Where Clause
    * @return boolean
    * */

    public function delete($table_name, $WHERE_CLAUSE, $DEBUG = false)
    {
        $this->_error = false;
        $this->_queryStmt = "DELETE FROM {$table_name} {$WHERE_CLAUSE}";
        if (!$DEBUG) {
            try {
                $DB = $this->DBConnection();
                $query = $DB->exec($this->_queryStmt);
                if (!$query) {
                    $this->_error = true;
                    $this->_errorMessage = $DB->errorInfo();
                    $this->_error_code = $DB->errorInfo();
                    return false;
                } else {
                    return true;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            return false;
        }
    }
    /*---------------------------------------------------------------------------------------*/

}

/*-------------------------------------------------------------------------------------------*/
// DB Class Ends
/*-------------------------------------------------------------------------------------------*/