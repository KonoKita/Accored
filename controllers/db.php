<?php 
class AccoreDB {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $database = 'accoreDB';
    private $connection = false;
    
    function getConnectionToDB(){
        $this->connection = mysqli_connect($this->hostname,$this->username, $this->password, $this->database);
        return $this->connection;
    }
    function testConnectionToDB(){
        $testSql = 'SELECT * FROM test_table';
        $result = mysqli_query($this->connection, $testSql);
        if ($result == false) {
            print("Произошла ошибка при выполнении запроса");
        }
    }
    function closeConnection(){
        $link = mysqli_connect(hostname, username, password, database);
    }
    function getQuery($query){
        $result = mysqli_query($this->connection, $query);
        while($row = $result->fetch_row()){
            $fullRes[] = $row;
        }
        return $fullRes;
    }

}


