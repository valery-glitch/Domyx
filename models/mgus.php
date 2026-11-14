<?php
    class mGus{
        public function getAllCom(){
            $sql = "SELECT idusu, nomusu FROM usuario WHERE estusu=11 AND idrol=4";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>