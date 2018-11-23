<?php

class DB {
    public $mdb;
    public $sql;
    public $dsn;
    public $stmt;
    public $opciones;
    public function __construct(){
        $this->dsn = 'mysql:host='. DB_HOST .';dbname=' . DB_NAME;
        $opciones = array( 
            PDO::ATTR_PERSISTENT => true,
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHAR
            );

    try{
        $this->mdb = new PDO($this->dsn, DB_USER , DB_PASS, $this->opciones);
    }catch (PDOException $e){
        print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
        }
    }
public function query($sql){
    $this->stmt = $this->mdb->prepare($sql);
}
public function bind($parametro, $valor, $tipo = null){
    if(is_null($tipo)){
        switch (true) {
            case is_int($valor):
                $tipo = PDO::PARAM_INT;
            break;
            case is_bool($valor):
                $tipo = PDO::PARAM_BOOL;
            break;
            case is_null($valor):
                $tipo = PDO::PARAM_NULL;
            break;
            
            default:
                $tipo = PDO::PARAM_STR;
                break;
        }
    }
    $this->stmt->bindValue($parametro, $valor, $tipo);
}
public function execute(){
    return $this->stmt->execute();
}
public function registros(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);

}
public function registro(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);

}

public function rowCount(){
    return $this->stmt->rowCount();
}

}