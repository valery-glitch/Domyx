<?php
    require_once("controllers/cprdlist.php");
?>

<div class="card card-form p-4 mb-5">
    <h4 class="subtitle mb-4"><i class="fa-solid fa-arrow-down-wide-short"></i> Filtrar Productos</h4>
    <form action="#" name="filtprd" method="POST" class="row">
        <div class="col-md-6">
            <label for="idcat">Categoría</label>
            <select name="idcat" id="idcat" class="form-control form-select">
                <option value="">Todas las categorias</option>
            <?php if($datCat){ foreach($datCat AS $dt){ ?>
                <option value="<?=$dt['idcat']; ?>"><?=$dt['nomcat'];?></option>
            <?php }} ?>
            </select>
        </div>
        <!--Queda pendiente hacerlo con el comercio para filtrarlo tambien, toca hacer el modelo de usuario
        Cambiar la consulta como lo dijo chat de ejemplo e intentarlo 
        <div class="col-md-6">
            <label for="idcat">Comercio</label>
            <select name="idcat" id="idcat" class="form-control form-select">
                <option value="">Todas los comercios</option>
            </select>
        </div>
        -->
        <div class="col-md-12 mt-4 text-end">
            <button type="submit" class="btn btn-submit shadow">
                <i class="bi bi-save me-2"></i>Filtrar
            </button>
        </div>
    </form>
</div>

<div class="table-container mt-4">
    <h4 class="subtitle mb-3">
        <i class="fa-solid fa-cheese"></i> Listado de Productos
    </h4>
    <div class="table-responsive">
        <table id="myTable">
            <thead>
                <tr>
                    <th>Comercio</th>
                    <th>Producto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if($datAll){ foreach ($datAll AS $dt){?>
                <tr>
                    <td class="max-width: 50px; text-center align-middle fw-bold"><?=$dt["nomcom"];?></td>
                    <td>
                        <strong><?=$dt["nomprd"];?></strong><br>
                        <small><?=$dt["desprd"];?></small><br>
                        <small><strong>Categoría: </strong><?=$dt["nomcat"];?></small><br>
                        <small><strong>Precio: </strong><?=$dt["vlrprd"];?></small><br>
                        <small><strong>Cantidad: </strong><?=$dt["canprd"];?></small><br>
                        <div class="mt-2 mb-2 align-middle">
                            <span class="badge <?=($dt['estprd']==2) ? 'bg-success' : 'bg-danger';?>">
                                <?=($dt['estprd']==2) ? 'Activo' : 'Inactivo';?>
                            </span>
                        </div>
                    </td>
                    <td>
                       <i class="fa-solid fa-cart-plus fa-2x"></i><br>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Comercio</th>
                <th>Producto</th>
                <th></th>
            </tr>
        </tfoot>
        </table>
    </div>
</div>
