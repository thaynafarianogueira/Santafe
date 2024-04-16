<?php
namespace Assets;

use PDO;
use PDOException;

final class Conn
{
    private $connection;
    private $sql;
    private $stmt;
    private $servername;
    private $username;
    private $password;
    private $database;
    public function __construct($servername, $username, $password, $database)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect()
    {
        try {
            // Create a PDO instance
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);

            // Set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function save(array $paramsAndValues, string $datatable)
    {
        try {
            $fields = [];
            $values = [];
            foreach ($paramsAndValues as $field => $value) {
                if (!is_null($value)) {
                    array_push($fields, "$field");
                    array_push($values, ":$field");
                }
            }
            $fieldsStr = implode(', ', $fields);
            $valuesStr = implode(', ', $values);
            $sql = "INSERT INTO $datatable ($fieldsStr) 
            VALUES ($valuesStr);";

             if (is_null($this->connection)) {
                $this->connection = $this->connect();
            }
            $stmt = $this->connection->prepare($sql);
            foreach ($paramsAndValues as $field => $value) {
                $field = ":$field";
                if (!is_null($value)) {
                    $stmt->bindValue($field, $value);
                }
            }
            return $stmt->execute();
        } catch (\Exception $th) {
            echo $th->getMessage() . '<br>';
            echo $th->getTraceAsString() . '<br>';
        }
    }

    // protected function bindParamsFromArray($paramsAndValues, $stmt)
    // {
    //     foreach ($paramsAndValues as $field => $value) {
    //         $field = ":$field";
    //         if (!is_null($value)) {
    //             $stmt->bindParam($field, $value);
    //             echo "$field => $value <br>";
    //         }
    //     }
    //     return $stmt;
    // }

    // protected function prepare($sql)
    // {
    //     if (is_null($this->connection)) {
    //         $this->connection = $this->connect();
    //     }
    //     return $this->connection->prepare($sql);
    // }
}

