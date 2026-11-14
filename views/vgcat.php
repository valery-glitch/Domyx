<?php 
    require_once("controllers/cgcat.php");
?>

<div class="card card-form p-4 mb-5">
    <h4 class="subtitle mb-4"><i class="fa-solid fa-tag"></i> Nueva Categoria</h4>
    <form action="#" name="formcat" method="POST" class="row">
        <div class="col-md-3">
            <label for="nomcat">Nombre<span class="required-mark">*</span></label>
            <input type="text" id="nomcat" name="nomcat" class="form-control" required value="<?php if($dtOn) echo $dtOn[0]['nomcat']; ?>">
        </div>
        <div class="col-md-3">
            <label for="icocat">Icono</label>
            <input type="text" id="icocat" name="icocat" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['icocat']; ?>">
        </div>
        <div class="col-md-3">
            <label for="estcat">Estado<span class="required-mark">*</span></label>
            <select id="estcat" name="estcat" class="form-control form-select" required>
            <?php if($datEt){ foreach($datEt AS $dt){ ?>
                <option value="<?=$dt['idval'];?> <?php if($dtOn AND $dtOn[0]['estcat']==$dt['idval']) echo "selected";?>"><?=$dt['nomval'];?></option>
            <?php }} ?>
            </select>

        </div>
        <div class="col-md-3">
            <label for="depcat">Dependencia<span class="required-mark">*</span></label>
            <select id="depcat" name="depcat" class="form-control form-select" required>
                <option value="0">Sin dependencia</option>
            <?php if($datAll){ foreach ($datAll AS $dt){ ?>
                <option value="<?=$dt['idcat']; ?>" <?php if($dtOn AND $dtOn[0]['depcat']==$dt['idcat']) echo "selected";?>><?=$dt["nomcat"];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-12 mt-4 text-end">
            <input type="hidden" id="idcat" name="idcat" value="<?php if($dtOn) echo $dtOn[0]['idcat']; ?>">
            <input type="hidden" name="ope" value="save">
            <button type="submit" class="btn btn-submit shadow">
                <i class="bi bi-save me-2"></i>Guardar Categoria
            </button>
        </div>
    </form>
</div>

<div class="table-container mt-4">
    <h4 class="subtitle mb-3">
        <i class="fa-solid fa-tags"></i> Listado de Categorías
    </h4>
    <div class="table-responsive">
        <table id="myTable">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if($datAll){ foreach ($datAll AS $dt){?>
                <tr>
                    <td>
                            <strong>ID: </strong><?=$dt['idcat'];?><br>
                            <strong><?=$dt["nomcat"];?></strong> <i class="<?=$dt['icocat'];?>"></i><br>
                            <strong>Dependencia: </strong><?=($dt["nomdep"]) ? $dt["nomdep"] : 'Sin dependencia';?>
                    </td>
                    <td>
                        <a href="home.php?pg=18&ope=edi&idcat=<?=$dt["idcat"];?>">
                            <i class="fa-regular fa-pen-to-square fa-2x"></i>
                        </a>
                        <a href="home.php?pg=18&ope=eli&idcat=<?=$dt["idcat"];?>" onclick="return eliminar('<?=$dt["nomcat"];?>');">
                            <i class="fa-regular fa-trash-can fa-2x"></i>
                        </a>
                        <div class="mt-2 mb-2 align-middle">
                            <span class="badge <?=($dt['estcat']==11) ? 'bg-success' : 'bg-danger';?>">
                                <?=($dt['estcat']==11) ? 'Activo' : 'Inactivo';?>
                            </span>
                        </div>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Categoría</th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

