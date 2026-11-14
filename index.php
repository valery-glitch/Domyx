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
        $pg = isset($_GET["pg"]) ? $_GET["pg"]:3;
        include 'views/header.php';
    ?>

<section>
    <section class="cont">
        <?php
            if($pg==3) include "views/vlogin.php";
            else echo "<script>window.location='index.php';</script>"
        ?>
        
    </section>

</section>
    <?php
        include 'views/footer.php';
    ?>

    <script src="js/code.js"></script>
</body>

</html>