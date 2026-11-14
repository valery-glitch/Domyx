<?php
    class mGres{
    //ATRIBUTOS
        private $idres;
        private $idusu;
        private $comres;
        private $calres;
        private $idprd;
        private $fecres;
    //GETTERS
        function getIdres(){ return $this->idres;}
        function getIdusu(){ return $this->idusu;}
        function getComres(){ return $this->comres;}
        function getCalres(){ return $this->calres;}
        function getIdprd(){ return $this->idprd;}
        function getFecres(){ return $this->fecres;}
    //SETTERS
        function setIdres($idres){ $this->idres = $idres;}
        function setIdusu($idusu){ $this->idusu = $idusu;}
        function setComres($comres){ $this->comres = $comres;}
        function setCalres($calres){ $this->calres = $calres;}
        function setIdprd($idprd){ $this->idprd = $idprd;}
        function setFecres($fecres){ $this->fecres = $fecres;}

    //Metodos Generales
        public function getAll(){
            $sql = "SELECT r.idres, r.idusu, r.comres, r.calres, r.idprd, r.fecres, p.nomprd, u.nomusu FROM resena AS r 
            INNER JOIN producto AS p ON r.idprd=p.idprd INNER JOIN usuario AS u ON r.idusu=u.idusu";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getResUsu(){
            $sql = "SELECT r.idres, r.idusu, r.comres, r.calres, r.idprd, r.fecres, p.nomprd, p.imgprd, u.nomusu FROM resena AS r 
            INNER JOIN producto AS p ON r.idprd=p.idprd INNER JOIN usuario AS u ON r.idusu=u.idusu WHERE r.idusu=:idusu";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idusu = $_SESSION['idusu'];
            $result->bindParam(':idusu', $idusu);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOne(){
            $sql = "SELECT r.idres, r.idusu, r.comres, r.calres, r.idprd, r.fecres, p.nomprd, u.nomusu FROM resena AS r 
            INNER JOIN producto AS p ON r.idprd=p.idprd INNER JOIN usuario AS u ON r.idusu=u.idusu WHERE r.idres=:idres";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idres = $this->getIdres();
            $result->bindParam("idres", $idres);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function save(){
            $sql = "INSERT INTO resena (idusu, comres, calres, idprd, fecres)
            VALUES (:idusu, :comres, :calres, :idprd, :fecres)";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idusu = $this->getIdusu();
            $result->bindParam("idusu", $idusu);
            $comres = $this->getComres();
            $result->bindParam("comres", $comres);
            $calres = $this->getCalres();
            $result->bindParam("calres", $calres);
            $idprd = $this->getIdprd();
            $result->bindParam("idprd", $idprd);
            $fecres = $this->getFecres();
            $result->bindParam("fecres", $fecres);
            $result->execute();
        }

        public function upd(){
            $sql = "UPDATE resena SET idusu=:idusu, comres=:comres, calres=:calres, 
            idprd=:idprd, fecres=:fecres WHERE idres=:idres";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idres = $this->getIdres();
            $result->bindParam("idres", $idres);
            $idusu = $this->getIdusu();
            $result->bindParam("idusu", $idusu);
            $comres = $this->getComres();
            $result->bindParam("comres", $comres);
            $calres = $this->getCalres();
            $result->bindParam("calres", $calres);
            $idprd = $this->getIdprd();
            $result->bindParam("idprd", $idprd);
            $fecres = $this->getFecres();
            $result->bindParam("fecres", $fecres);
            $result->execute();
        }

        public function del(){
            $sql = "DELETE FROM resena WHERE idres=:idres";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idres = $this->getIdres();
            $result->bindParam("idres", $idres);
            $result->execute();
        }

        public function getAllCom(){
            $sql = "SELECT r.idres, r.idusu, r.comres, r.calres, r.idprd, r.fecres, p.nomprd, u.nomusu FROM resena AS r 
            INNER JOIN producto AS p ON r.idprd=p.idprd INNER JOIN usuario AS u ON r.idusu=u.idusu WHERE p.idcom=:idcom";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idcom = $_SESSION['idusu'];
            $result->bindParam(":idcom", $idcom);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    

?>