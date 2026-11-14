<?php
    require_once("models/mgprd.php");
    require_once("models/mgcat.php");
    require_once("models/mgus.php");

    $idcat = isset($_REQUEST["idcat"]) ? $_REQUEST["idcat"] : NULL;
    $idprd = isset($_GET["idprd"]) ? $_GET["idprd"] : NULL;
    $ope = isset($_GET["ope"]) ? $_GET["ope"] : NULL;
    $dtOn = NULL;

    $mgprd = new mGprd();
    $mgcat = new mGcat();
    $mgus = new mGus();

    //$datAll = $mgprd->getAll();
    $datCat = $mgcat->getAll();
    $datCom = $mgus->getAllCom();

    $mgprd->setIdprd($idprd);
    $mgprd->setIdcat($idcat);

    if($idcat) $datAll = $mgprd->getAllCat($idcat);
    else $datAll = $mgprd->getAll();

    if($ope=="det" && $idprd){
        $dtOn = $mgprd->getOne();
    }

    //var_dump($datAll);
?>

