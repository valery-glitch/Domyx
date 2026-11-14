<?php
require_once("models/mgcat.php");
require_once("models/mvalue.php");

$idcat = isset($_REQUEST["idcat"]) ? $_REQUEST["idcat"]:NULL;
$nomcat = isset($_POST["nomcat"]) ? $_POST["nomcat"]:NULL;
$estcat = isset($_POST["estcat"]) ? $_POST["estcat"]:NULL;
$depcat = isset($_POST["depcat"]) ? $_POST["depcat"]:NULL;
$icocat = isset($_POST["icocat"]) ? $_POST["icocat"]:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
$dtOn = NULL;

$mgcat = new mGcat();
$mvalue = new mvalue();

$mgcat->setIdcat($idcat);

if($ope=="save"){
    $mgcat->setNomcat($nomcat);
    $mgcat->setEstcat($estcat);
    $mgcat->setIcocat($icocat);
    $mgcat->setDepcat($depcat);
    if($idcat) $mgcat->upd();
    else $mgcat->save();
}

if($ope=="eli" AND $idcat) $mgcat->del();
if($ope=="edi" AND $idcat) $dtOn = $mgcat->getOne();

$mvalue->setIddom(2);
$datEt = $mvalue->getAllVD();

//var_dump($dtOn);

$datAll = $mgcat->getAll();
?>