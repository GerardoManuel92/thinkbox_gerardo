    <style>
        @media (max-width: 767px) {
            .fixed-width-column {
                min-width: 150px;
                max-width: 150px;
                width: 150px;
            }

            #tabla_costos{
                margin-right: 400px;
            }
        }
    </style>

    <br><br><br><br><br>


    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 info ">
                <div id="content" class="col-sm-12">
                    <h2 class="title">Carrito de Compras</h2>
                    <div class="table-responsive form-group" id="carritoTable">

                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8 col-lg-12">
                            <div class="col-sm-4 col-sm-offset-8 col-lg-12">
                                <table class="table table-bordered" id="carritoTable">
                                    <thead style="background-color: #666666; color:white;">
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Descripcion</th>
                                            <th>Precio</th>
                                            <!-- <th>IVA (%)</th>
                                            <th>Total</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Filas del carrito se agregarán aquí -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 col-lg-6 order-lg-2 ml-auto">
                                <table class="table table-bordered" id="tabla-costos">
                                    <tr>
                                        <td style="width: 190px; background-color: #666666; color:white; font-weight: bold;">Subtotal</td>
                                        <th id="th-subtotal"></th>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #666666; color:white; font-weight: bold;">Iva (%)</td>
                                        <th id="th-iva"></th>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #666666; color:white; font-weight: bold;">Total</td>
                                        <th id="th-total"></th>
                                    </tr>
                                </table>
                            </div>

                        </div>
                        <!-- <div class="col-sm-4 col-sm-offset-8 col-lg-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-right">
                                            <strong>Sub-Total:</strong>
                                        </td>
                                        <td class="text-right" id="subtotal"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <strong>IVA (16%):</strong>
                                        </td>
                                        <td class="text-right" id="IVA"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <strong>Total:</strong>
                                        </td>
                                        <td class="text-right" id="total"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                    <div class="buttons">
                        <!-- <div class="pull-left"><a href="<?php echo base_url(); ?>" class="btn btn-primary">Continuar Comprando</a></div> -->
                        <div class="pull-right"><a href="<?php echo (isset($iduser)) ?  base_url('Pago') : base_url('Login'); ?>" class="btn btn-primary">Pagar</a></div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>