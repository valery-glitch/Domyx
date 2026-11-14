<?php
    require_once("models/mgres.php");

    $mgres = new mGres();
    $datAll = $mgres->getAllCom();
?>