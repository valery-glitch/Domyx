<div class="card card-form p-4 mb-5">
    <h4 class="mb-4 text-secondary"><i class="fa-solid fa-store"></i> Crear Comercio</h4>
    <form name="formcom" method="POST" action="#" class="row">
        <div class="col-md-4">
            <label for="tipper">Tipo de documento<span class="required-mark">*</span></label>
            <select id="tipper" name="tipper" class="form-control form-select">
            <?php if($datTd){ foreach($datTd AS $dt){ ?>
                <option value="<?=$dt['idval'];?>" <?php if($dtOn AND $dtOn[0]['tipper']==$dt['idval']) echo "selected"; ?>><?=$dt['nomval'];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="nuiper">No. Documento<span class="required-mark">*</span></label>
            <input type="number" id="nuiper" name="nuiper" class="form-control" min ="111111" max="99999999999" value="<?php if($dtOn) echo $dtOn[0]['nuiper']; ?>">
        </div>
        <div class="col-md-4">
            <label for="nomper">Nombre Completo<span class="required-mark">*</span></label>
            <input type="text" id="nomper" name="nomper" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['nomper']; ?>">
        </div>
        <div class="col-md-4">
            <label for="dirper">Dirección<span class="required-mark">*</span></label>
            <input type="text" id="dirper" name="dirper" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['dirper']; ?>">
        </div>
        <div class="col-md-4">
            <label for="codubi">Ciudad<span class="required-mark">*</span></label>
            <select id="codubi" name="codubi" class="form-control form-select">
            <?php if($datUb){ foreach($datUb AS $dt){ ?>
                <option value="<?=$dt['codubi'];?>" <?php if($dtOn AND $dtOn[0]['codubi']==$dt['codubi']) echo "selected"; ?>><?=$dt['mn'];?> - <?=$dt['dp'];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="telper">Teléfono<span class="required-mark">*</span></label>
            <input type="number" id="telper" name="telper" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['telper']; ?>">
        </div>
        <div class="col-md-6">
            <label for="emaper">E-mail<span class="required-mark">*</span></label>
            <input type="email" id="emaper" name="emaper" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['emaper']; ?>">
        </div>
        
        <div class="col-md-6">
            <label for="pass">Contraseña<span class="required-mark">*</span></label>
            <input type="password" id="pass" name="pass" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="fnacper">F. nacimiento<span class="required-mark">*</span></label>
            <input type="date" id="fnacper" name="fnacper" class="form-control" value="<?php if($dtOn) echo $dtOn[0]['fnacper']; ?>">
        </div>
        <div class="col-md-4">
            <label for="genper">Genero<span class="required-mark">*</span></label>
            <select id="genper" name="genper" class="form-control form-select">
            <?php if($datGn){ foreach($datGn AS $dt){ ?>
                <option value="<?=$dt['idval'];?>" <?php if($dtOn AND $dtOn[0]['genper']==$dt['idval']) echo "selected"; ?>><?=$dt['nomval'];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="actper">Estado<span class="required-mark">*</span></label>
            <select id="actper" name="actper" class="form-control form-select">
            <?php if($datEt){ foreach($datEt AS $dt){ ?>
                <option value="<?=$dt['idval'];?>" <?php if($dtOn AND $dtOn[0]['actper']==$dt['idval']) echo "selected"; ?>><?=$dt['nomval'];?></option>
            <?php }} ?>
            </select>
        </div>
        <div class="col-12 mt-4 text-end">
            <input type="hidden" id="idper" name="idper" value="<?php if($dtOn) echo $dtOn[0]['idper']; ?>">
            <input type="hidden" name="ope" value="save">
            <button type="submit" class="btn btn-institutional shadow">
                <i class="bi bi-save me-2"></i>Registrar Persona
            </button>
        </div>
    </form>
</div>