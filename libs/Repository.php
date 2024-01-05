<?php
//Repositori aca estaa, esta es la clase padre de la que van a heredar todos los hijos ej funcionesRepository,PerfilRepository etc
abstract class Repository{

    protected $command;
    protected $params;

    function __construct(){
        //Conexión con la base de datos
        
        //MeloAsk llamandolo de esta forma hacemos un llamado a config no?
        $this->host     = constant('HOST');     
        $this->db       = constant('DB');
        $this->user     = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset  = constant('CHARSET');
        //esto es lo que esta en el config
    }

    //Este metodo como dice  su nombre es el encargado de conectarse a la base de datos.
    private function connect(){
        try{
         //PDO clase de php nativa
         //PDO PHP Data Objects
         //PDO se encarga de mantener la conexion con la base de datos
            return new PDO(
                //host es un parametro que se necesita para la conexion a la base de datos.
                //Esta defininendo un nuevo objeto PDO que Pdo va a ser el encargadpo de crear la conexion con la base de datos.
                "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset, 
                $this->user, 
                $this->password, //este user y password son los de la base de datos.
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false 
                ]//ademas tmbn esta manejando errores y el errmode_exception dice que el pdo va a lanzar excepciones
            );

        }catch(PDOException $e){
            return $e;
        }//esto retorna la excepcion capturada de tipo PDO (segun entiendo el $e va a guardar cualquier exception)
    }

    //funcion para buscartodos
    protected function findAll(){
        try{
            $db = $this->connect();                     //conexion a la base de datos (en $db se guarda el objeto PDO que es el encargado de la conexion)
            if( get_class($db) == "PDOException" )      //se fija que $db se una excepcion si lo es devuelve la excepcion 
                return $db;                             //(calculo que para manejarla de otra parte del codigo)
                

            $query = $db->prepare($this->command);      //prepatra la consulta a la base ej $this->command = "select * from articulos where id = :id"
            $query->execute($this->params);             //ejecuta la consulta con los parametros ej $this->params = array(':id' => $id)     

            return $this->loadAll($query);              //retorna todos los resultados de la consulta (todoso los usuruis todos los articulos etc)

            
        }catch(PDOException $e){
            return "FindAll error(".get_class($this)."): ".$e->getMessage();    //manejo de error, retonra un cartel informando el error
        }

    }

    //el find funciona de la misma manera que el load all solo dierie en que retorna un resultado no un arreglo
    protected function find(){
        try {
            if( get_class($db = $this->connect()) == "PDOException" ){      //consulta que  sea un ubjeo PDO EXcepcio
                return $db;                                                 //etorna la excepcion si lo es
            }
            $query = $db->prepare($this->command);          //prepara la consulta 
            $query->execute($this->params);                 //cambia los parametros  de la consulta y la ejecuta

            $result = $this->doLoad($query->fetch());       //procesa y carga el resultado
            //el fetch es de PDO, ab es del pdostestament que es lo que se crea cuandfo se usa un prepare 
            //fetch permite recuperar el resultado com un array asociativo(segun gpt) 
            
            return $result;
        } catch (PDOException $e) {
            return "Find error(".get_class($this)."): ".$e->getMessage();
        }
    }

    //las funciones executenonquery esta echa para consultas que no requiewren de un resultado o un return 
    //esta pensado para los insert, update, delete
    //retorna true o false si la consulta fue ejecutada
    protected function execNonQuery(){
        try{

            //esta parte es excatamente igual a las otras(meloask no es mejor un metodo para esto auqneu son 2 lineas nose xd)
            //se fija si es una excepcoin y si lo es maneja el error imprimiendo un cartelito
            if( get_class($db = $this->connect()) == "PDOException" ){
                return $db;
            }

            $query = $db->prepare($this->command);  //prepara la consulta
            $query->execute($this->params);         //ejecuta cambiando los parametros y se genera un onjeto pdotestament    
            
            return true;                            //si la consulta fue echa sin prblema retorna true(meloAsk enb que parte retorna false o no es necesario)
        }catch(PDOException $e){
            return "NonQuery error(".get_class($this)."): ".$e->getMessage();//si hubo una exception retorna un cartel
        }
    }

    //la funcion loadAll agrega todos los resultadios de la consulta a un array.
    //recibe uin ubjeto que contiene los resultados de una consulta.
    //retorna una array con los resultados
    protected function loadAll($query){
        $array = [];
        while($row = $query->fetch()){
            $array[] = $this->doLoad($row);//array[] de esta forma agrega todo al final
        }
        return $array;
    }

    public abstract function doLoad($array);    //crea la funcion abstracta dolad, qe cambiara su comportamiento dependiendo el luar donde es ejecutado
}

?>