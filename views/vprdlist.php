<?php
    require_once("controllers/cprdlist.php");
?>

<div class="card card-form p-4 mb-5 mt-4">
    <form name="frmbusprd" method="POST" action="#" class="row">
        <div class="col-md-4">
            <label for="buscar"><i class="fa-solid fa-magnifying-glass"></i> Buscar Producto</label>
            <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Nombre, Descripción...">
        </div>
        <div class="col-md-3">
            <label for="nomcom"><i class="fa-solid fa-shop"></i> Comercio</label>
            <select id="nomcom" name="nomcom" class="form-control form-select">
            <?php if($datCom){ foreach($datCom AS $dt){ ?>
                <option value="<?=$dt['idusu'];?>"><?=$dt['nomusu'];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="idcat"><i class="fa-solid fa-tags"></i> Categoría</label>
            <select id="idcat" name="idcat" class="form-control form-select">
            <?php if($datCat){ foreach($datCat as $dt){ ?>
                <option value="<?=$dt['idcat'];?>"><?=$dt['nomcat'];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-2">
            <br>
            <button type="submit" class="btn btn-submit mt-2 col-md-12">
                <i class="fa-solid fa-arrow-rotate-right"></i> Reset
            </button>
        </div>
    </form>
</div>

<h4 class="subtitle mb-4"><i class="fa-solid fa-list"></i> Listado de Productos</h4>

<?php 
    function forPre($numero) {
        return "$" . number_format($numero, 0, ",", ".");
    }
?>

<?php if($datAll){ ?>
    <div class="cont-ver">
        <?php foreach($datAll AS $dt){ ?>
        <a href="home.php?pg=17&ope=det&idprd=<?=$dt['idprd'];?>">
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
                            <?= substr($dt['desprd'], 0, 30) . ' ...'; ?><br>
                        </div>
                    </div>
                    <div class="more-ver">
                        <span class="pre-info"><?=forPre($dt["vlrprd"]);?></span><br>
                        <a class="cart"><i class="fa-solid fa-cart-plus"></i> Añadir</a>  
                    </div>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
<?php } ?>


<div class="modal" tabindex="-1" id="modalLPrd">
  <div class="modal-dialog">
    <div class="modal-content modal-gen list">
      <div class="modal-header">
        <h4 class="modal-title text-white"><?=$dtOn[0]['nomprd'];?></h4>
        <button type="button" class="btn-close x-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="imgm-cont">
            <?php if($dtOn[0]['imgprd']){ ?>
                <img src="<?=$dtOn[0]['imgprd'];?>" class="img-mod">
            <?php } else {?>
                <div class="nimgm-cont">
                    <i class="fa-solid fa-dolly"></i>
                </div>
            <?php }?>
        </div>
        <div class="mb-2 text-white"><span class="fw-bold text-white">Comercio: </span><?=$dtOn[0]['nomcom'];?></div>
        <div class="mb-2 text-white">
            <span class="fw-bold text-white">Descripción:</span><br><?=$dtOn[0]['desprd'];?>
        </div>
         <div class="mb-2 text-white">
            <span class="fw-bold text-white">Categoría: </span><?=$dtOn[0]['nomcat'];?>
        </div>
        <div class="mb-2 text-white">
            <span class="fw-bold text-white">Precio: </span><span class="pre-info"><?=forPre($dtOn[0]["vlrprd"]);?></span><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-submit" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-submit"><i class="fa-solid fa-cart-plus"></i> Añadir</button>
      </div>
    </div>
  </div>
</div>


<?php if($dtOn){ ?>
    <script>
        window.onload = function(){
            let modal = new bootstrap.Modal(
                document.getElementById('modalLPrd')
            );
            modal.show();
        }
    </script>
<?php } ?>