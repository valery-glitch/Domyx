<?php
    class mValue{
    //ATRIBUTOS
        private $idval;
        private $nomval;
        private $iddom;
        private $estval;
    
    //GETTERS
        function getIdval(){ return $this->idval;}
        function getNomval(){ return $this->nomval;}
        function getIddom(){ return $this->iddom;}
        function getEstval(){ return $this->estval;}
    //SETTERS
        function setIdval($idval){ $this->idval = $idval;}
        function setNomval($nomval){ $this->nomval = $nomval;}
        function setIddom($iddom){ $this->iddom = $iddom;}
        function setEstval($estval){ $this->estval = $estval;}

    //Metodoas Generales
        public function getAll(){
            $sql = "SELECT v.idval, v.nomval, v.iddom, v.estval, d.nomdom FROM valor AS v INNER JOIN dominio AS d ON v.iddom = d.iddom";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllVD(){
            $sql = "SELECT v.idval, v.nomval, v.iddom, v.estval, d.nomdom FROM valor AS v INNER JOIN dominio AS d ON v.iddom = d.iddom WHERE v.iddom=:iddom";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $iddom = $this->getIddom();
            $result->bindParam("iddom", $iddom);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>