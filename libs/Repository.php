<?php

abstract class Repository{

    protected $command;
    protected $params;

    function __construct(){
        //Conexión con la base de datos

        $this->host     = constant('HOST');
        $this->db       = constant('DB');
        $this->user     = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset  = constant('CHARSET');
    }

    private function connect(){
        try{
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset, 
                $this->user, 
                $this->password,
                $options);

            return $pdo;
        }catch(PDOException $e){
            return $e;
        }
    }

    protected function findAll(){
        try{
            if( get_class($query = $this->connect()) == "PDOException" ){
                return $query;
            }
            $query->prepare($this->command);
            $query->execute($this->params);

            $array = $this->loadAll($query);

            return $array;
        }catch(PDOException $e){

            return $e;
        }

    }

    protected function find(){
        try {
            if( get_class($db = $this->connect()) == "PDOException" ){
                return $db;
            }
            $query = $db->prepare($this->command);
            $query->execute($this->params);

            $result = $this->doLoad($query->fetch());
            
            return $result;
        } catch (PDOException $e) {
            return $e;
        }
    }

    protected function excecuteNonQuery(){
        try{

            if( get_class($query = $this->connect()) == "PDOException" ){
                return $query;
            }

            $query->prepare($this->command);
            $query->execute($this->params);
            
            return true;
        }catch(PDOException $e){
            return $e;
        }
    }

    protected function loadAll($query){
        $array = [];
        while($row = $query->fetch()){
            array_push($array, $this->doLoad($row) );
        }
        return $array;
    }

    public abstract function doLoad($array);
}

?>