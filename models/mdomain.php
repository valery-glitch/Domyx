<?php
    class mDomain{
    //ATRIBUTOS
        private $iddom;
        private $nomdom;

    //GETTERS
        function getIddom(){ return $this->iddom;}
        function getNomdom(){ return $this->nomdom;}
    //SETTERS
        function setIddom($iddom){ $this->iddom = $iddom;}
        function setNomdom($nomdom){ $this->nomdom = $nomdom;}
    }
    //Metodos Generales
    public function getAll(){
        $sql = "SELECT d.iddom d.nomdom FROM dominio AS d";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
?>