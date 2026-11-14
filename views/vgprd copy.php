<?php
    require_once("controllers/cgprd.php");
?>

<div class="text-end">
    <a href="home.php?pg=16&ope=open" class="btn btn-submit">
        <i class="fa-solid fa-plus"></i> Nuevo Producto
    </a>
</div>

<?php if($ope=="open" || $ope=="edi"){ ?>
    <div class="card card-form p-4 mb-5">
        <h4 class="subtitle mb-4"><i class="fa-solid fa-burger"></i><?php if($dtOn) echo "Actualizar Producto"; else echo "Nuevo Producto";?></h4>
        <form action="#" name="formprd" method="POST" class="row">
            <div class="col-md-6">
                <label for="nomprd">Nombre<span class="required-mark">*</span></label>
                <input type="text" id="nomprd" name="nomprd" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['nomprd']; ?>">
            </div>
            <div class="col-md-6">
                <label for="desprd">Descripción<span class="required-mark">*</span></label>
                <input type="text" id="desprd" name="desprd" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['desprd']; ?>">
            </div>
            <div class="col-md-6">
                <label for="vlrprd">Precio<span class="required-mark">*</span></label>
                <input type="number" id="vlrprd" name="vlrprd" class="form-control" required min="1" value="<?php if($dtOn) echo $dtOn[0]['vlrprd']; ?>">
            </div>
            <div class="col-md-6">
                <label for="canprd">Cantidad<span class="required-mark">*</span></label>
                <input type="number" id="canprd" name="canprd" class="form-control" required min="0" value="<?php if($dtOn) echo $dtOn[0]['canprd']; ?>">
            </div>
            <div class="col-md-6">
                <label for="idcat">Categoría<span class="required-mark">*</span></label>
                <select id="idcat" name="idcat" class="form-control form-select" required>
                <?php if($datCat){ foreach($datCat AS $dtc){ ?>
                    <option value="<?=$dtc['idcat']; ?>" <?php if($dtOn AND $dtOn[0]['idcat']==$dtc['idcat']) echo "selected";?>><?=$dtc['nomcat'];?></option>
                <?php }}?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="estprd">Estado<span class="required-mark">*</span></label>
                <select id="estprd" name="estprd" class="form-control form-select" required>
                <?php if($datEt){ foreach($datEt AS $dt){ ?>
                    <option value="<?=$dt['idval'];?>" <?php if($dtOn AND $dtOn[0]['estprd']==$dt['idval']) echo "selected";?>><?=$dt['nomval'];?></option>
                <?php }} ?>
                </select>
            </div>
            <div class="col-md-12">
                <label for="imgprd">Imagen</label>
                <input class="form-control" type="url" id="imgprd" name="imgprd" value="<?php if($dtOn) echo $dtOn[0]['imgprd']; ?>">
            </div>
            <div class="col-md-12 mt-4 text-end">
                <input type="hidden" id="idprd" name="idprd" value="<?php if($dtOn) echo $dtOn[0]['idprd']; ?>">
                <input type="hidden" name="ope" value="save">
                <button type="submit" class="btn btn-submit shadow">
                    <i class="bi bi-save me-2"></i> Guardar Producto
                </button>
            </div>
        </form>
    </div>
<?php } ?>

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



<h4 class="subtitle mb-4"><i class="fa-solid fa-list"></i> Mis Productos</h4>

<?php 
    function forPre($numero) {
        return "$" . number_format($numero, 0, ",", ".");
    }
?>

<?php if($datAll){ ?>
    <div class="card-container">
        <?php foreach($datAll AS $dt){?>
            <div class="prd-card">
                <?php if($dt["imgprd"]){ ?>
                    <img class="prd-img" src="<?=$dt["imgprd"];?>" alt="">
                <?php }else { ?>
                    <div class="prd-img no-img">
                        <i class="fa-solid fa-dolly"></i>
                    </div>
                <?php } ?>
                <div class="card-content">
                    <div class="card-text">
                        <h4 class="card-title fs-5"><?=$dt["nomprd"];?></h4>
                        <div class="card-info">
                            <span class="pre-info fs-6"><?=forPre($dt["vlrprd"]);?></span>
                            <br>
                            <span class="text-white">Stock: <?=$dt["canprd"];?></span>
                            <br>
                            <span class="badge <?=($dt['estprd']==11) ? 'bg-success' : 'bg-danger';?>">
                                <?=($dt['estprd']==11) ? 'Activo' : 'Inactivo';?>
                            </span>
                        </div>
                    </div>
                    <div class="card-more">
                        <a href="home.php?pg=16&ope=edi&idprd=<?=$dt["idprd"];?>">
                            <i class="fa-solid fa-pen edi"></i>
                        </a>
                        <a href="home.php?pg=16&ope=eli&idprd=<?=$dt["idprd"];?>" onclick="return eliminar('<?=$dt['nomprd'];?>');">
                            <i class="fa-regular fa-trash-can eli"></i>
                        </a>    
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<!--
<div class="modal" tabindex="-1" id="modalPrd">
  <div class="modal-dialog">
    <div class="modal-content modPrd">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa-solid fa-cheese"></i> <?php if($dtOn) echo "Actualizar Producto"; else echo "Nuevo Producto";?></h4>
        <button type="button" class="btn-close x-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" name="formprd" method="POST" class="row">
            <div class="col-md-12">
                <label for="nomprd">Nombre<span class="required-mark">*</span></label>
                <input type="text" id="nomprd" name="nomprd" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['nomprd']; ?>">
            </div>
            <div class="col-md-12">
                <label for="desprd">Descripción<span class="required-mark">*</span></label>
                <input type="text" id="desprd" name="desprd" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['desprd']; ?>">
            </div>
            <div class="col-md-6">
                <label for="vlrprd">Precio<span class="required-mark">*</span></label>
                <input type="number" id="vlrprd" name="vlrprd" class="form-control" required min="1" value="<?php if($dtOn) echo $dtOn[0]['vlrprd']; ?>">
            </div>
            <div class="col-md-6">
                <label for="canprd">Cantidad<span class="required-mark">*</span></label>
                <input type="number" id="canprd" name="canprd" class="form-control" required min="0" value="<?php if($dtOn) echo $dtOn[0]['canprd']; ?>">
            </div>
            <div class="col-md-6">
                <label for="idcat">Categoría<span class="required-mark">*</span></label>
                <select id="idcat" name="idcat" class="form-control form-select" required>
                <?php if($datCat){ foreach($datCat AS $dtc){ ?>
                    <option value="<?=$dtc['idcat']; ?>" <?php if($dtOn AND $dtOn[0]['idcat']==$dtc['idcat']) echo "selected";?>><?=$dtc['nomcat'];?></option>
                <?php }}?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="estprd">Estado<span class="required-mark">*</span></label>
                <select id="estprd" name="estprd" class="form-control form-select" required>
                <?php if($datEt){ foreach($datEt AS $dt){ ?>
                    <option value="<?=$dt['idval'];?>" <?php if($dtOn AND $dtOn[0]['estprd']==$dt['idval']) echo "selected";?>><?=$dt['nomval'];?></option>
                <?php }} ?>
                </select>
            </div>
            <div class="col-md-12">
                <label for="imgprd">Imagen</label>
                <input class="form-control" type="url" id="imgprd" name="imgprd" value="<?php if($dtOn) echo $dtOn[0]['imgprd']; ?>">
            </div>
            <div class="col-md-12 mb-4">
                <input type="hidden" id="idprd" name="idprd" value="<?php if($dtOn) echo $dtOn[0]['idprd']; ?>">
                <input type="hidden" name="ope" value="save">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-submit" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-submit shadow">
                    <i class="bi bi-save me-2"></i>Guardar Producto
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
-->

<!--
<?php if($dtOn){ ?>
    <script>
        window.onload = function(){
            let modal = new bootstrap.Modal(
                document.getElementById('modalPrd')
            );
            modal.show();
        }
    </script>
<?php } ?>
-->