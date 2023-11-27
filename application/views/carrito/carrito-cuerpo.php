    <style>
        @media (max-width: 767px) {
            .fixed-width-column {
                min-width: 150px;
                max-width: 150px;
                width: 150px;
            }
        }
    </style>

    <br><br><br><br><br>


    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 info ">
                <div id="content" class="col-sm-12">
                    <h2 class="title">Carrito de Compras</h2>
                    <div class="table-responsive form-group" id="carritoTable">

                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
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
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="pull-left"><a href="<?php echo base_url(); ?>" class="btn btn-primary">Continuar Comprando</a></div>
                        <div class="pull-right"><a href="<?php echo (isset($iduser)) ?  base_url('Pago') : base_url('Login'); ?>" class="btn btn-primary">Pagar</a></div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>