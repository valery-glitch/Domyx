<?php
    require_once("models/seguridad.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOMYX</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleAnt.css">

</head>
<body>
    <?php
        require_once("models/conexion.php");
        $pg = isset($_GET["pg"]) ? $_GET["pg"]:NULL;
        include 'views/header.php';
        date_default_timezone_set("America/Bogota");
    ?>
 
<section>
    <section class="menu">
        <?php include 'views/vmen.php'; ?>
    </section>

    <section class="cont">
        <?php
            if($pg==1)include "views/vhome.php";
            elseif($pg==2)include "views/vregister.php";
            elseif($pg==3)include "views/vlogin.php";
            elseif($pg==4)include "views/vforgot.php";
            elseif($pg==5)include "views/vdomain.php";
            elseif($pg==6)include "views/vvalue.php";
            elseif($pg==7)include "views/vmod.php";
            elseif($pg==8)include "views/vpage.php";
            elseif($pg==9)include "views/vubica.php";
            elseif($pg==10)include "views/vgperfil.php";
            elseif($pg==11)include "views/vgus.php";
            elseif($pg==12)include "views/vdirus.php";
            elseif($pg==13)include "views/vrepus.php";
            elseif($pg==14)include "views/vdusupd.php";
            elseif($pg==15)include "views/vgcomm.php";
            elseif($pg==16)include "views/vgprd.php";
            elseif($pg==17)include "views/vprdlist.php";
            elseif($pg==18)include "views/vgcat.php";
            elseif($pg==19)include "views/vgped.php";
            elseif($pg==20)include "views/vpedlist.php";
            elseif($pg==21)include "views/vdetped.php";
            elseif($pg==22)include "views/vgestp.php";
            elseif($pg==23)include "views/vcofent.php";
            elseif($pg==24)include "views/vpedreport.php"; 
            elseif($pg==25)include "views/vpaid.php"; 
            elseif($pg==26)include "views/vgres.php"; 
            elseif($pg==27)include "views/vreslist.php";
            elseif($pg==28)include "views/vresrep.php";
        ?>
        
    </section>

</section>
    <?php
        include 'views/footer.php';
    ?>

    <script src="js/code.js"></script>
</body>

</html>