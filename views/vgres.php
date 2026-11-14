<?php
    require_once("controllers/cgres.php");
?>

<?php 
    function forPre($numero) {
        return "$" . number_format($numero, 0, ",", ".");
    }
?>

<div class="mb-3 mt-3">
    <button class="btn btn-submit" onclick="mostrarSec('pendientes')">Pendientes</button>
    <button class="btn btn-submit" onclick="mostrarSec('resenas')">Mis reseñas</button>
</div>

<section id="pendientes" style="display:none;">
    <?php if(!$datPrd){ ?>
        <span class="inf">No tienes productos pendientes por reseñar en este momento.</span>
    <?php } ?>
    <?php if($datPrd){ ?>
        <div class="cont-ver">
            <?php foreach($datPrd AS $dt){ ?>
            <!--<a href="home.php?pg=17&ope=det&idprd=<?=$dt['idprd'];?>"> -->
                <div class="card-ver">
                    <?php if($dt["imgprd"]){ ?>
                        <div class="img-cont">
                            <img src="<?=$dt["imgprd"];?>" class="img-ver">
                        </div>
                    <?php } else { ?>
                        <div class="nimg-cont">
                            <div class="nimg-ver">
                                <i class="fa-solid fa-dolly"></i>
                            </div>    
                        </div>
                    <?php } ?>

                    <div class="content-ver">
                        <div class="text-ver">
                            <div class="com-info">
                                <i class="fa-solid fa-store"></i> <?=$dt['nomcom'];?>
                            </div>
                            <h4 class="title-ver"><?=$dt["nomprd"];?></h4>
                            <div class="info-ver">
                                <i class="fa-solid fa-calendar"></i> <?=$dt['ult_com']?><br>
                            </div>
                        </div>
                        <div class="more-ver">
                            <span class="pre-info"><?=forPre($dt["vlrprd"]);?></span>
                            <a class="cart" href="home.php?pg=26&ope=res&idprd=<?=$dt['idprd'];?>"><i class="fa-solid fa-cart-plus"></i> Reseñar</a>  
                        </div>
                    </div>
                </div>
        <!-- </a> -->
            <?php } ?>
        </div>
    <?php } ?>
</section>

<section id="resenas" style="display:none;">

    <?php if(!$datAll){ ?>
        <span class="inf">
            Sin reseñas registradas<br>
            Aún no has valorado ningún producto.
        </span>
    <?php } ?>
    <?php if($datAll){ ?>
    <div class="cont-ver">
        <?php foreach($datAll AS $dt){?>
            <div class="card-ver">
                <div class="content-ver">
                    <div class="text-ver">
                        <h4 class="title-ver"><?=$dt["nomprd"];?></h4>
                        <div class="card-info">
                            <span class="pre-info fs-5"><i class="fa-solid fa-calendar icores"></i> <?=$dt['fecres']?></span><br>
                            <span class="text-white">Calificación: <?=str_repeat("⭐", $dt['calres']);?></span>
                            <br>
                            <p class="mt-2"><?=$dt["comres"];?></p>
                        </div>
                    </div>
                    <div class="more-res">
                        <a href="home.php?pg=26&ope=edi&idres=<?=$dt['idres'];?>&idprd=<?=$dt['idprd'];?>">
                            <i class="fa-solid fa-pen edi res"></i>
                        </a>
                        <a href="home.php?pg=26&ope=eli&idres=<?=$dt['idres'];?>" onclick="return eliminar('<?=$dt['nomprd'];?>');">
                            <i class="fa-regular fa-trash-can eli res"></i>
                        </a>    
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php } ?>
</section>


<div class="modal" tabindex="-1" id="modalRes">
    <div class="modal-dialog">
        <div class="modal-content modal-gen">
            <div class="modal-header">
                <h4 class="modal-title text-white"> <i class="fa-solid fa-star text-white"></i> Nueva Reseña</h4>
                <button type="button" class="btn-close x-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" name="formres" method="POST" class="row">
                    <div class="col-md-12">
                        <label>Producto</label>
                        <input type="text" class="form-control" readonly value="<?=$dtOnPrd[0]['nomprd'];?>">
                    </div>
                    <div class="col-md-12">
                        <label for="calres">Calificación</label>
                        <select name="calres" id="calres" class="form-control form-select" required>
                        <?php for($i=1; $i<=5; $i++){ ?>
                            <option value="<?=$i;?>" <?php if($dtOn && $dtOn[0]['calres']==$i) echo "selected";?> ><?=$i;?> <?=str_repeat("⭐", $i);?></option>
                        <?php } ?>
                        </select>
                        <option value=""></option>
                    </div>
                    <div class="col-md-12">
                        <label for="comres">Comentario</label>
                        <textarea type="text" name="comres" id="comres" rows="3" class="form-control" required><?php if($dtOn) echo $dtOn[0]['comres'];?></textarea>
                    </div>
                    <div class="col-md-12 mt-4 text-end">
                        <input type="hidden" id="idprd" name="idprd" value="<?=$dtOnPrd[0]['idprd'];?>">
                        <input type="hidden" id="idres" name="idres" value="<?php if($dtOn) echo $dtOn[0]['idres']; ?>">
                        <input type="hidden" name="ope" value="save">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-submit" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-submit"><i class="bi bi-save me-2"></i> Guardar Reseña</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>