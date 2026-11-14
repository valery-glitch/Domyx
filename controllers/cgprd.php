<?php
require_once("models/mgprd.php");
require_once("models/mgcat.php");
require_once("models/mvalue.php");
require_once("models/mgus.php");

$idprd = isset($_REQUEST["idprd"]) ? $_REQUEST["idprd"]:NULL;
$canprd = isset($_POST["canprd"]) ? $_POST["canprd"]:NULL;
$imgprd = isset($_POST["imgprd"]) ? $_POST["imgprd"]:NULL;
$nomprd = isset($_POST["nomprd"]) ? $_POST["nomprd"]:NULL;
$vlrprd = isset($_POST["vlrprd"]) ? $_POST["vlrprd"]:NULL;
$desprd = isset($_POST["desprd"]) ? $_POST["desprd"]:NULL;
$estprd = isset($_POST["estprd"]) ? $_POST["estprd"]:NULL;
$idcom = $_SESSION['idusu'];
$idcat = isset($_POST["idcat"]) ? $_POST["idcat"]:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
$dtOn = NULL;

$mgprd = new mGprd();
$mgcat = new mGcat();
$mvalue = new mValue();
$mgus = new mGus();

$mgprd->setIdprd($idprd);

if($ope=="save"){
    $mgprd->setCanprd($canprd);
    $mgprd->setImgprd($imgprd);
    $mgprd->setNomprd($nomprd);
    $mgprd->setVlrprd($vlrprd);
    $mgprd->setDesprd($desprd);
    $mgprd->setEstprd($estprd);
    $mgprd->setIdcom($idcom);
    $mgprd->setIdcat($idcat);
    if($idprd) $mgprd->upd();
    else {
        $mgprd->save();
    }
}


if($ope=="eli" AND $idprd) $mgprd->del();
if($ope=="edi" AND $idprd){
    $dtOn = $mgprd->getOne();
    echo "
    <script>
        window.onload = function(){
            let modal = new bootstrap.Modal(
                document.getElementById('modalPrd')
            );
            modal.show();
        }
    </script>";
} 

$mvalue->setIddom(2);
$datEt = $mvalue->getAllVD();

$datAll = $mgprd->getAll();
$datCat = $mgcat->getAll();
$datCom = $mgus->getAllCom();
?>