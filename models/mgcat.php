<?php
    class mGcat{
    //ATRIBUTOS
        private $idcat;
        private $nomcat;
        private $estcat;
        private $icocat;
        private $depcat;

    //GETTERS
        function getIdcat(){ return $this->idcat;}
        function getNomcat(){ return $this->nomcat;}
        function getEstcat(){ return $this->estcat;}
        function getIcocat(){ return $this->icocat;}
        function getDepcat(){ return $this->depcat;}
    

    //SETTERS
        function setIdcat($idcat){ $this->idcat = $idcat;}
        function setNomcat($nomcat){ $this->nomcat = $nomcat;}
        function setEstcat($estcat){ $this->estcat = $estcat;}
        function setIcocat($icocat){ $this->icocat = $icocat;}
        function setDepcat($depcat){ $this->depcat = $depcat;}

    //Metodos Generales
        public function getAll(){
            $sql = "SELECT c.idcat, c.nomcat, c.estcat, c.icocat, c.depcat, d.nomcat AS nomdep FROM categoria AS c LEFT JOIN categoria AS d ON c.depcat = d.idcat";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOne(){
            $sql = "SELECT c.idcat, c.nomcat, c.estcat, c.icocat, c.depcat, d.nomcat AS nomdep FROM categoria AS c LEFT JOIN categoria AS d ON c.depcat = d.idcat WHERE c.idcat=:idcat";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idcat = $this->getIdcat();
            $result->bindParam("idcat", $idcat);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function save(){
            $sql = "INSERT INTO categoria (nomcat, estcat, icocat, depcat) 
            VALUES (:nomcat, :estcat, :icocat, :depcat)";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nomcat = $this->getNomcat();
            $result->bindParam("nomcat", $nomcat);
            $estcat = $this->getEstcat();
            $result->bindParam("estcat", $estcat);
            $icocat = $this->getIcocat();
            $result->bindParam("icocat", $icocat);
            $depcat = $this->getDepcat();
            $result->bindParam("depcat", $depcat);
            $result->execute();
        }

        public function upd(){
            $sql = "UPDATE categoria SET nomcat=:nomcat, estcat=:estcat, icocat=:icocat, depcat=:depcat WHERE idcat=:idcat";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idcat = $this->getIdcat();
            $result->bindParam("idcat", $idcat);
            $nomcat = $this->getNomcat();
            $result->bindParam("nomcat", $nomcat);
            $estcat = $this->getEstcat();
            $result->bindParam("estcat", $estcat);
            $icocat = $this->getIcocat();
            $result->bindParam("icocat", $icocat);
            $depcat = $this->getDepcat();
            $result->bindParam("depcat", $depcat);
            $result->execute();
        }

        public function del(){
            $sql = "DELETE FROM categoria WHERE idcat=:idcat";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idcat = $this->getIdcat();
            $result->bindParam("idcat", $idcat);
            $result->execute();
        }
    }
?>