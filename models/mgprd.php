<?php
    class mGprd{
    //ATRIBUTOS
        private $idprd;
        private $canprd;
        private $imgprd;
        private $nomprd;
        private $vlrprd;
        private $desprd;
        private $estprd;
        private $idcom;
        private $idcat;

    //GETTERS
        function getIdprd(){ return $this->idprd;}
        function getCanprd(){ return $this->canprd;}
        function getImgprd(){ return $this->imgprd;}
        function getNomprd(){ return $this->nomprd;}
        function getVlrprd(){ return $this->vlrprd;}
        function getDesprd(){ return $this->desprd;}
        function getEstprd(){ return $this->estprd;}
        function getIdcom(){ return $this->idcom;}
        function getIdcat(){ return $this->idcat;}

    //SETTERS
        function setIdprd($idprd){ $this->idprd = $idprd; }
        function setCanprd($canprd){ $this->canprd = $canprd; }
        function setImgprd($imgprd){ $this->imgprd = $imgprd; }
        function setNomprd($nomprd){ $this->nomprd = $nomprd; }
        function setVlrprd($vlrprd){ $this->vlrprd = $vlrprd; }
        function setDesprd($desprd){ $this->desprd = $desprd; }
        function setEstprd($estprd){ $this->estprd = $estprd; }
        function setIdcom($idcom){ $this->idcom = $idcom; }
        function setIdcat($idcat){ $this->idcat = $idcat; }

    //Metodos Generales
        public function getAll(){
            $sql = "SELECT p.idprd, p.canprd, p.imgprd, p.nomprd, p.vlrprd, p.desprd, p.estprd, p.idcom, p.idcat, c.nomcat, u.nomusu AS nomcom FROM producto AS p INNER JOIN categoria AS c ON p.idcat = c.idcat INNER JOIN usuario AS u ON p.idcom=u.idusu";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllCat(){
            $sql = "SELECT p.idprd, p.canprd, p.imgprd, p.nomprd, p.vlrprd, p.desprd, p.estprd, p.idcom, p.idcat, c.nomcat, u.nomusu AS nomcom FROM producto AS p INNER JOIN categoria AS 
            c ON p.idcat = c.idcat INNER JOIN usuario AS u ON p.idcom=u.idusu WHERE p.idcat=:idcat OR c.depcat=:idcat";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idcat = $this->getIdcat();
            $result->bindParam("idcat", $idcat);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOne(){
            $sql = "SELECT p.idprd, p.canprd, p.imgprd, p.nomprd, p.vlrprd, p.desprd, p.estprd, p.idcom, p.idcat, c.nomcat, u.nomusu AS nomcom FROM producto AS p INNER JOIN categoria AS c ON p.idcat = c.idcat INNER JOIN usuario AS u ON p.idcom=u.idusu WHERE p.idprd=:idprd";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idprd = $this->getIdprd();
            $result->bindParam("idprd", $idprd);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function save(){
            $sql = "INSERT INTO producto (canprd, imgprd, nomprd, vlrprd, desprd, estprd, idcom, idcat) VALUES (:canprd, :imgprd, :nomprd, :vlrprd, :desprd, :estprd, 
            :idcom, :idcat)";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $canprd = $this->getCanprd();
            $result->bindParam("canprd", $canprd);
            $imgprd = $this->getImgprd();
            $result->bindParam("imgprd", $imgprd);
            $nomprd = $this->getNomprd();
            $result->bindParam("nomprd", $nomprd);
            $vlrprd = $this->getVlrprd();
            $result->bindParam("vlrprd", $vlrprd);
            $desprd = $this->getDesprd();
            $result->bindParam("desprd", $desprd);
            $estprd = $this->getEstprd();
            $result->bindParam("estprd", $estprd);
            $idcom = $this->getIdcom();
            $result->bindParam("idcom", $idcom);
            $idcat = $this->getIdcat();
            $result->bindParam("idcat", $idcat);
            $result->execute();
        }

        public function upd(){
            $sql = "UPDATE producto SET canprd=:canprd, imgprd=:imgprd, nomprd=:nomprd, vlrprd=:vlrprd, desprd=:desprd, estprd=:estprd, idcom=:idcom, idcat=:idcat WHERE idprd=:idprd";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idprd = $this->getIdprd();
            $result->bindParam("idprd", $idprd);
            $canprd = $this->getCanprd();
            $result->bindParam("canprd", $canprd);
            $imgprd = $this->getImgprd();
            $result->bindParam("imgprd", $imgprd);
            $nomprd = $this->getNomprd();
            $result->bindParam("nomprd", $nomprd);
            $vlrprd = $this->getVlrprd();
            $result->bindParam("vlrprd", $vlrprd);
            $desprd = $this->getDesprd();
            $result->bindParam("desprd", $desprd);
            $estprd = $this->getEstprd();
            $result->bindParam("estprd", $estprd);
            $idcom = $this->getIdcom();
            $result->bindParam("idcom", $idcom);
            $idcat = $this->getIdcat();
            $result->bindParam("idcat", $idcat);
            $result->execute();
        }

        public function del(){
            $sql = "DELETE FROM producto WHERE idprd=:idprd";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idprd = $this->getIdprd();
            $result->bindParam("idprd", $idprd);
            $result->execute();
        }

        public function getPrdRes(){
            try{
                $sql = "SELECT d.idprd, n.nomprd, n.imgprd, n.desprd, n.vlrprd, u.nomusu AS nomcom, MAX(p.fecped) AS ult_com FROM detpedido AS d INNER JOIN pedido AS p ON p.idped = d.idped INNER JOIN producto AS n ON n.idprd = d.idprd INNER JOIN usuario AS u ON u.idusu = n.idcom LEFT JOIN resena AS r ON d.idprd = r.idprd WHERE p.idcli = :idcli AND r.idres IS NULL GROUP BY d.idprd, n.nomprd, n.imgprd, n.desprd, n.vlrprd, u.nomusu";
                $modelo = new Conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idcli = $_SESSION['idusu'];
                $result->bindParam(":idcli", $idcli);
                $result->execute();
                return $result->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo $e;
            }
        }
    }

    
?>