<?php
require_once("models/mgres.php");
require_once("models/mgprd.php");

$idres = isset($_REQUEST["idres"]) ? $_REQUEST["idres"]:NULL;
$idprd = isset($_REQUEST["idprd"]) ? $_REQUEST["idprd"]:NULL;
$idusu = $_SESSION['idusu'];
$comres = isset($_POST["comres"]) ? $_POST["comres"]:NULL;
$calres = isset($_POST["calres"]) ? $_POST["calres"]:NULL;
$fecres = isset($_POST["fecres"]) ? $_POST["fecres"]: date('Y-m-d');
$ope = isset($_REQUEST["ope"]) ? $_REQUEST["ope"]:NULL;
$dtOn = NULL;

$mgres = new mGres();
$mgprd = new mGprd();

$mgres->setIdres($idres);
$mgprd->setIdprd($idprd);

if($ope=="save"){
    $mgres->setIdusu($idusu);
    $mgres->setComres($comres);
    $mgres->setCalres($calres);
    $mgres->setIdprd($idprd);
    $mgres->setFecres($fecres);
    if($idres) $mgres->upd();
    else {
        $mgres->save();
        //header("Location: home.php?pg=26");
        //exit();
    }
}

if($ope=="eli" AND $idres){
    $mgres->del();
    echo "<script>window.location='home.php?pg=26';</script>";
}

if($ope=="edi" AND $idres){} $dtOn = $mgres->getOne();

if(($ope=="res" && $idprd) || ($ope=="edi")){
    echo "
    <script>
        window.onload = function(){
            let modal = new bootstrap.Modal(
                document.getElementById('modalRes')
            );
            modal.show();
            window.history.replaceState({}, document.title, 'home.php?pg=26');
        };
    </script>";
}

$dtOnPrd = $mgprd->getOne();
$datPrd = $mgprd->getPrdRes();
$datAll = $mgres->getResUsu();
?>