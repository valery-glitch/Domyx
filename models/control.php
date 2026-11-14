<?php
    include("conexion.php");
    date_default_timezone_set('America/Bogota');
    $usu = isset($_POST['user']) ? $_POST['user'] : NULL;
    $con = isset($_POST['pas']) ? $_POST['pas'] : NULL;
    if($usu && $con) validar($usu, $con);
    else echo "<script>window.location='../index.php?error=ok';</script>";

    function validar($usu, $con){
        $res = verdat($usu, $con);
        $res = isset($res) ? $res : NULL;
        if($res){
            $fec = date("Y-m-d H:i:s");
            session_start();
            $_SESSION['idusu'] = $res[0]['idusu'];
            $_SESSION['nomusu'] = $res[0]['nomusu'];
            $_SESSION['mailusu'] = $res[0]['mailusu'];
            $_SESSION['aut'] = "P8L*n431&/gt|°00pLF";
            echo "<script>window.location='../home.php';</script>";
        }else echo "<script>window.location='../index.php?error=ok';</script>";
    }

    function verdat($usu, $con){
        $res = NULL;
        $pss = sha1(md5("S1".$con."7l4"));
        $sql = "SELECT idusu, nomusu, conusu, mailusu, estusu FROM usuario WHERE estusu=11 AND mailusu=:mailusu AND conusu=:conusu";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(":mailusu", $usu);
        $result->bindParam(":conusu", $pss);
        /*echo $usu." - ".$pss;
        die();*/
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
?>

<!-- Verificar lo del estado del usuario  -->