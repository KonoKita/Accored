<?php 
class AccoreDB {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $database = 'accoredb';
    private $connection = false;
    
    function __construct(){
        $this->connection = $this->getConnectionToDB();
    }
    
    function getConnectionToDB(){
        $this->connection = mysqli_connect($this->hostname,$this->username, $this->password, $this->database);
        return $this->connection;
    }
    
    function testConnectionToDB(){
        $testSql = 'SELECT * FROM test_table';
        $result = self::query($testSql);
        if ($result == false) {
            print("Не получается подключиться к бд");
        } else{
            print("Соединение установлено");
        }
    }

    function closeConnection(){
        $link = mysqli_connect(hostname, username, password, database);
    }

    function query($query){
        $fullRes = [];
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    function queryReturnAssoc($query){
        $fullRes = [];
        $result = mysqli_query($this->connection, $query);
        if($result){
            while($row = $result->fetch_row()){
                $fullRes[] = $row;
            }
        }
        return $fullRes;
    }
    function sqlDef($variable){
        $protectedVariable = $this->connection->real_escape_string($variable);
        return $protectedVariable;
    }

}


