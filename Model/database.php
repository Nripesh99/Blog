<?php
class Database
{
    private $dbHost = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName = "blog";

    public $conn;
    public function __construct()
    {
        // session_start();
        try {
            //creating a new connection using PDO
            $this->conn = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUsername, $this->dbPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //getting error mode and changing it to the exception
        } catch (PDOException $e) {
            die("Failed to connect with MySQL: " . $e->getMessage());
        }

    }
    public function select($table_name, $where_column, $where_value)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $table_name WHERE $where_column = :where_value");
            $stmt->bindParam(':where_value', $where_value);
            $stmt->execute();
            $count = $stmt->rowCount();

            if ($count == 0) {
                echo 'No person found';
            } elseif ($count == 1) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            } elseif ($count > 1) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        } catch (PDOException $e) {
            echo $stmt->queryString . "<br>" . $e->getMessage();
        }
    }

    public function delete($table_name, $where)
    {
        try {
            $stmt = $this->conn->exec("DELETE FROM " . $table_name . " " . $where);
            $_SESSION['toastr'] = array(
                'type' => 'error', // or 'success' or 'info' or 'warning'
                'message' => 'Deleted succesfully!',
            );
            

        } catch (PDOException $e) {
            echo $stmt . "<br>" . $e->getMessage();
        }
    }

    public function selectJoin($table_name1, $table_name2, $joining_stmt, $where, $column = '*')
    {
        try {
            $stmt = $this->conn->prepare("SELECT " . $column . " FROM " . $table_name1 . " ON " . $table_name1 . "." . $joining_stmt . " = " . $table_name2 . "." . $joining_stmt . " " . $where);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count = 1) {

                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            } else {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        } catch (PDOException $e) {
            echo $stmt->queryString . "<br>" . $e->getMessage();
        }

    }

    public function insert($tableName, $UserNew)
    {
        try {
            $columns = implode(', ', array_keys($UserNew));
            $placeholders = ':' . implode(', :', array_keys($UserNew));

            $stmt = $this->conn->prepare("INSERT INTO " . $tableName . " (" . $columns . ") VALUES (" . $placeholders . ")");

            // Bind parameters
            foreach ($UserNew as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            return $this->conn->lastInsertId();

            // return true;
        } catch (Exception $e) {
            echo $stmt->queryString . "<br>" . $e->getMessage();
        }
    }
    public function view($tableName)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $tableName");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        } catch (Exception $e) {
            echo $stmt->queryString . "<br>" . $e->getMessage();
        }
    }
    public function viewRandom($tableName, $limit)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $tableName ORDER BY RAND() LIMIT $limit");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        } catch (Exception $e) {
            echo $stmt->queryString . "<br>" . $e->getMessage();
        }
    }

    public function edit($tableName, $userNew, $condition)
    {
        try {


            // Add commas between columns and spaces between placeholders
            $setClause = implode(', ', array_map(function ($column) {
                return "$column = :$column";
            }, array_keys($userNew)));

            $stmt = $this->conn->prepare("UPDATE $tableName SET $setClause $condition");

            foreach ($userNew as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
        } catch (Exception $e) {
            echo $stmt->queryString . "<br>" . $e->getMessage();
        }
    }
    public function viewOnCondition($table, $condition)
    {
        try {

            $stmt = $this->conn->prepare("SELECT * FROM $table WHERE" . $condition . "");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo $stmt->queryString . "<br>" . $e->getMessage();
        }
    }

    public function viewonLimit($table, $condition)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $table " . $condition . "");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo $stmt->queryString . "<br>" . $e->getMessage();
        }

    }
}

?>