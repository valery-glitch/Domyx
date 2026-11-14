<?php
    require_once("controllers/creslist.php");
?>

<h4><i class="fa-solid fa-star-half-stroke"></i><i class="fa-solid fa-star-half-stroke"></i> Reseñas</h4>

<?php if($datAll){ ?>
    <div class="cont-ver">
        <?php foreach($datAll AS $dt){?>
            <div class="card-ver">
                <div class="content-ver">
                    <div class="text-ver">
                        <h4 class="title-ver"><?=$dt["nomprd"];?></h4>
                        <div class="card-info">
                            <span class="pre-info fs-5"><i class="fa-solid fa-calendar icores"></i> <?=$dt['fecres']?></span><br>
                            <p class="text-white"><i class="fa-solid fa-user"></i> <?=$dt['nomusu'];?></p>
                            <span class="text-white">Calificación: <?=str_repeat("⭐", $dt['calres']);?></span>
                            <br>
                            <p class="mt-2"><?=$dt["comres"];?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>