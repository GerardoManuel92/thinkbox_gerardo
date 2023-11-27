<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Registro de usuario</h2>
                <!-- <div class="text-center mb-5 text-dark">Made with bootstrap</div> -->
                <div class="card my-5">

                    <div class="card-body cardbody-color p-lg-5">

                        <div class="text-center">
                            <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>Th/assets/img/logo.png" class="img-fluid profile-image-pic img-thumbnail" width="250px" alt="profile"></a>
                        </div>
                        <br>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nombre" aria-describedby="nameHelp" placeholder="Nombre completo">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="apellido" aria-describedby="lastnameHelp" placeholder="Apellidos">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="empresa" aria-describedby="lastnameHelp" placeholder="Empresa">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Correo electrónico">
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" id="telefono" aria-describedby="telephoneHelp" placeholder="Telefono">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="usuario" aria-describedby="userHelp" placeholder="Usuario">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password1" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password2" placeholder="Repetir password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100" onclick="registrar();">Registrar</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-white">¿Tienes una cuenta? <a href="<?php echo base_url(); ?>Login" class="text-white fw-bold"> Inicia sesión</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>