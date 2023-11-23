<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Iniciar sesión</h2>
                <!-- <div class="text-center mb-5 text-dark">Made with bootstrap</div> -->
                <div class="card my-5">

                    <form class="card-body cardbody-color p-lg-5">

                        <div class="text-center">
                            <img src="<?php echo base_url();?>Th/assets/img/logo.png" class="img-fluid profile-image-pic img-thumbnail" width="250px" alt="profile">
                        </div>
                        <br>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp" placeholder="Usuario">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Entrar</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-white">No estás
                            registrado? <a href="<?php echo base_url();?>Registro" class="text-white fw-bold"> Crea una cuenta</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>