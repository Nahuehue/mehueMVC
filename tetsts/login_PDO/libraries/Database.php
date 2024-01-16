<?php

// Ya se que esto esta mal; deberia usar la base del proyecto, pero esto es para probar.
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '1234';
    private $dbname = 'login-php';

    // Segun el tutorial, esto es el objeto PDO.
    private $dbh; // Database Handle, nombre de variable que se utiliza en el objeto PDO.
    private $stmt; // Esto representa una consulta preparada.
    private $error; // Aqui se guardaran los errores de PDO.

    public function __construct() {
        // DSN (informacion para conectarse a la base de datos).
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        
        // La siguiente configuracion es para establecer opciones
        // especificas al conectar con la base de datos mediante PDO.
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            // El atributo PERSISTENT es para mantener la conexion a la base de datos y que sea reutilizable en vez de abrirla y cerrarla.
        );

        // PDO: instanciamos o inicializamos el PDO.
        try {
            // Al hacer $this->.. ya estoy informando que estoy accediendo a una propiedad de la clase (atributo).
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Si pasa bien y no rompe, hacemos la consulta.
    public function query($sql) {
        // Preparamos la consulta SQL utilizando la conexion PDO.
        // Esto devuelve un objeto de declaracion (statement) que podemos utilizar para ejecutar la consulta.
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Vincular valores al statement(declaracion) preparado utilizando parametros con nombres
    //si no me envian type lo inicializo como null
    public function bind($param, $value, $type = null){     
    // Si el tipo no está definido, determinarlo automaticamente basandose en el tipo del valor proporcionado
        if(is_null($type)){
            switch(true){
                //evalua distintos caso dependiendo del value y define distintos tipos
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    reak; //romper para salir es rercomendable?
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    //por defecto el param va a ser un string
            }
        }
        // Vincular el parámetro, el valor y el tipo al statement preparado
        $this->stmt->bindValue($param, $value, $type)
    }
    //ejecuta la declaracion preparada
    public function execute(){
        return $this->stmt->execute();
    }
    //fetch se usa para recuperar una fila de resultados

    //return de varias filas/objetos 
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //return una filas/objeto
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    // Obtiene el número de filas afectadas por la última operación del statement preparado
    public functio rowCount(){
        return $this->stmt->rowCount();
    }
}
