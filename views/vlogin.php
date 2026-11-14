<div class="card card-form p-4 mb-5">
    <h4 class="mb-4 text-secondary">
        <i class="fa-solid fa-user-lock"></i>
        Inicio de Sesión
    </h4>
    <form action="models/control.php" method="POST" class="row">
        <div class="col-md-6">
            <label for="mailusu">Correo</label>
            <input type="email" name="user" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="passusu">Contraseña</label>
            <input type="password" name="pas" class="form-control">
        </div>
        <?php 
            $err = isset($_GET["error"]) ? $_GET["error"] : NULL;
            if($err=="ok"){
        ?>
            <div class="col-md-12 text-center text-danger fw-bold mt-4">¡Datos Incorrectos!</div>
        <?php } ?>
        <div class="col-md-12 mt-4 text-end">
            <button type="submit" class="btn btn-submit"><i class="fa-solid fa-right-to-bracket me-2"></i> Iniciar Sesión</button>
        </div>
    </form>
</div>