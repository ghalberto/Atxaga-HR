<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/../../utils/Logger.php';

class DAO {

    private static $instance = null;
    private $connection;

    public function __construct() {
        try {
            $dsn = sprintf("mysql:host=%s;port=%s;dbname=%s;charset=%s", DB_HOST, DB_PORT, DB_NAME, DB_CHARSET);
            $this->connection = new PDO($dsn, DB_USER, DB_PASSWORD);
        } catch (Exception $ex) {
            Logger::addToErrorsLog($ex->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function executeQuery($sql = "", $values = array()) {
        try {
            if ($sql !== "" && strlen($sql) > 0) {
                return $this->executeSQLQuery($sql, $values);
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            Logger::addToErrorsLog($ex->getMessage());
        }
    }

    private function executeSQLQuery($sql, $values = array()) {
        try {
            $query = $this->connection->prepare($sql);
            $query->execute($values);

            if (intval($query->errorCode()) === 0) {
                return $query->fetchAll(PDO::FETCH_NUM);
            } else {
                return intval($query->errorCode());
            }
        } catch (Exception $ex) {
            Logger::addToErrorsLog($ex->getMessage());
            return $ex->getMessage();
        }
    }
}
