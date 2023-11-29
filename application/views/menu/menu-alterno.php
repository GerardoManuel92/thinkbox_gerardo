<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-fixed bootsnav">

        <div class="container">
            <div class="nav-box">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav inc-border">
                    <ul>
                        <li class="contact">
                            <i class="fas fa-phone" style="font-size: 20px; color:#eb8b00;"></i>
                            <p>Hablar con un asesor <strong><a href="tel:<?php echo NUMERO_MARCAR; ?>" style="font-weight: bold; font-size:16px;"> <?php echo NUMERO_TEL; ?></a></strong></p>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">
                        <img src="<?php echo base_url(); ?>Th/assets/img/logo.png?v=<?php echo time(); ?>" class="logo logo-scrolled" alt="Logo" style="height: 60px;">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                        <li>
                            <a style="font-size: 12px;" href="<?php echo base_url(); ?>">Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a style="font-size: 12px;" href="<?php echo base_url(); ?>Nosotros/">Nosotros</a>
                        </li>
                        <li class="dropdown">
                            <a style="font-size: 12px;" href="<?php echo base_url(); ?>Servicios/" class="dropdown-toggle" data-toggle="dropdown">Soluciones</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Soluciones empresariales</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=ERP">ERP: Sistema administrativo</a></li>
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=CRM">CRM: Gestión de clientes</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Soluciones digitles</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=DW">Diseño web</a></li>
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=MD">Marketing digital</a></li>
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=TL">Tienda en linea</a></li>
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=EC">E-Commerce</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Soluciones TI</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=ER">Estructura de red</a></li>
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=IC">Instalación de cámaras</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenimiento</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=IM">Impresoras</a></li>
                                        <li><a href="<?php echo base_url(); ?>ServiciosDetallados?mostrar=E">Equipos de cómputo</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a style="font-size: 12px;" href="<?php echo base_url(); ?>Blog/">Blog</a>
                        </li>
                        <li class="dropdown">
                            <a style="font-size: 12px;" href="#" class="dropdown-toggle" data-toggle="dropdown">Contacto</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>Contacto/">Contáctanos</a></li>
                                <li><a href="<?php echo base_url(); ?>Faq/">Preguntas frecuentes</a></li>
                            </ul>
                        </li>
                        <?php

                        $data = "id,nombre";
                        $tabla = "usuario";
                        $condicion = array('id' => $this->session->userdata(IDUSERCOM));
                        $info = $this->General_Model->SelectUnafila($data, $tabla, $condicion);

                        if ($info !== null) {
                        ?>
                            <!--  Si hay una sesión iniciada, entonces se mostrará el nombre del usuario -->
                            <li class="dropdown">
                                <p hidden id="idUser"><?php echo $info->id ?></p>
                                <a style="font-size: 12px; color:#eb8b00;" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                    $nombreCompleto = $info->nombre;
                                    $partesNombre = explode(' ', $nombreCompleto);

                                    // Verificar si hay al menos una palabra en el nombre
                                    if (count($partesNombre) > 0) {
                                        $primerNombre = $partesNombre[0];
                                        echo $primerNombre;
                                    } else {
                                        echo "Nombre no válido";
                                    }
                                    ?>
                                </a>
                                <!--  Aqui se muestran las acciones que se realizarán dentro del perfil de usuario -->
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>Carrito/">Ver carrito</a></li>
                                    <li><a href="<?php echo base_url('welcome/logout'); ?>" id="logoutLink">Cerrar sesión</a></li>
                                </ul>
                            </li>
                        <?php
                        } else {
                        ?>
                            <!-- Si no hay una sesión iniciada, entonces se muestra la opción de Inicio de sesión -->
                            <li>
                                <a style="font-size: 12px; color:#eb8b00;" href="<?php echo base_url(); ?>Login/">Iniciar sesión</a>
                            </li>

                        <?php
                        }
                        ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>
    </nav>
    <!-- End Navigation -->
</header>
<div id="WABoton">

</div>