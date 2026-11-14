<div class="card card-form p-4 mb-5">
    <h4 class="subtitle mb-4"><i class="fa-regular fa-user"></i> Crear Usuario</h4>
    <form name="formcom" method="POST" action="#" class="row">
        <div class="col-md-4">
            <label for="tipdoc">Tipo de documento<span class="required-mark">*</span></label>
            <select id="tipdoc" name="tipdoc" class="form-control form-select">
                <option selected disabled>Seleccionar</option>
                <option>Cedula</option>
                <option>Tarjeta de identidad</option>
                <option>Pasaporte</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="numdoc">No. Documento<span class="required-mark">*</span></label>
            <input type="number" id="numdoc" name="numdoc" class="form-control" min ="111111" max="99999999999" value="<?php if($dtOn) echo $dtOn[0]['numdoc']; ?>">
        </div>
        <div class="col-md-4">
            <label for="nomus">Nombre Completo<span class="required-mark">*</span></label>
            <input type="text" id="nomus" name="nomus" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="codubi">Ciudad<span class="required-mark">*</span></label>
            <select id="codubi" name="codubi" class="form-control form-select">
                <option>Chía</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="dirus">Dirección<span class="required-mark">*</span></label>
            <input type="text" id="dirus" name="dirus" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="telus">Teléfono<span class="required-mark">*</span></label>
            <input type="number" id="telus" name="telus" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="fnacus">F. nacimiento<span class="required-mark">*</span></label>
            <input type="date" id="fnacus" name="fnacus" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="genus">Genero<span class="required-mark">*</span></label>
            <select id="genus" name="genus" class="form-control form-select">
                <option selected disabled>Seleccionar</option>
                <option>Masculino</option>
                <option>Femenino</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="rolus">Rol<span class="required-mark">*</span></label>
            <select id="rolus" name="rolus" class="form-control form-select">
                <option selected disabled>Seleccionar</option>
                <option><i class="fa-solid fa-user"></i> Cliente</option>
                <option><i class="fa-solid fa-shop"></i> Comercio</option>
                <option><i class="fa-solid fa-motorcycle"></i> Domiciliario</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="mailus">E-mail<span class="required-mark">*</span></label>
            <input type="email" id="mailus" name="mailus" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="pass">Contraseña<span class="required-mark">*</span></label>
            <input type="password" id="pass" name="pass" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="estus">Estado<span class="required-mark">*</span></label>
            <select id="estus" name="estus" class="form-control form-select">
                <option selected>Activo</option>
                <option>Inactivo</option>
            </select>
        </div>
        <div class="col-12 mt-4 text-end">
            <input type="hidden" id="idusu" name="idusu">
            <input type="hidden" name="ope" value="save">
            <button type="submit" class="btn btn-submit shadow">
                <i class="bi bi-save me-2"></i>Registrar Usuario
            </button>
        </div>
    </form>
</div>

<div class="table-container mt-4">
    <h4 class="subtitle mb-3">
        <i class="fa-regular fa-user"></i> Listado de Usuarios
    </h4>
    <div class="table-responsive">
        <table id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Datos del Usuario</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td class="width: 50px; text-center align-middle fw-bold">1</td>
                    <td>
                        <strong>Usuario 1</strong>
                        <div class="mb-2">
                            <span class="badge bg-success">Activo</span>
                        </div>
                        <small><strong>Genero: </strong>Masculino</small><br>
                        <small><strong>Tipo de documento: </strong>CC</small><br>
                        <small><strong>Documento: </strong>123456789</small><br>
                        <small><strong>Email: </strong>user1@email.com</small><br>
                        <small><strong>Celular: </strong>1234567890</small><br>
                        <small><strong>Dirección: </strong>calle siempre viva</small><br>
                        <small><strong>Ciudad: </strong>Chía</small><br>
                    </td>
                    <td>
                        <i class="fa-regular fa-pen-to-square fa-2x"></i>
                        <i class="fa-regular fa-trash-can fa-2x"></i>
                    </td>
                </tr>
                <tr>
                    <td class="width: 50px; text-center align-middle fw-bold">2</td>
                    <td>
                        <strong>Usuario 2</strong>
                        <div class="mb-2">
                            <span class="badge bg-danger">Inactivo</span>
                        </div>
                        <small><strong>Genero: </strong>Femenino</small><br>
                        <small><strong>Tipo de documento: </strong>CC</small><br>
                        <small><strong>Documento: </strong>123456789</small><br>
                        <small><strong>Email: </strong>user1@email.com</small><br>
                        <small><strong>Celular: </strong>1234567890</small><br>
                        <small><strong>Dirección: </strong>calle siempre viva</small><br>
                        <small><strong>Ciudad: </strong>Chía</small><br>
                    </td>
                    <td>
                        <i class="fa-regular fa-pen-to-square fa-2x"></i>
                        <i class="fa-regular fa-trash-can fa-2x"></i>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Datos del Usuario</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>