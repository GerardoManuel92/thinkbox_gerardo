<style>
        @media (max-width: 767px) {
            .fixed-width-column {
                min-width: 150px; 
                max-width: 150px; 
                width: 150px; 
            }
        }
    </style>
    <body>
	<!-- preloader Start -->
	<!-- <div id="preloader">
		<div id="status">
			<img src="images/header/loder.gif" id="preloader_image" alt="loader">
		</div>
	</div> -->
	<!-- Top Scroll Start -->	<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
	<!-- Top Scroll End -->
	<div id="inicio" class="width_calc">
		<!--try top banner main wrapper Start-->
		<div class="try_top_banner_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="try_logo_wrapper try_logo_wrapper_top">
                            <a href="<?php echo base_url();?>Inicio">
							<img src="<?php echo base_url();?>landing/images/header/comanorsa_logo.svg" alt="logo" style="width: 180px; height: 70px; margin-bottom: 30px;" >
							</a>
						</div>
					</div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="main-container container">
                        <div class="row">
                            <!--Middle Part Start-->
                            <div id="content" class="col-sm-12">
                            <h2 class="title">Pagar</h2>
                            <br>
                            <div class="so-onepagecheckout row">
                                <div class="col-left col-sm-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-book"></i>Tu dirección</h4>
                                    </div>
                                    <div class="panel-body">
                                            <fieldset id="address" class="required">
                                            <div class="form-group">
                                                <label for="input-payment-company" class="control-label">Company</label>
                                                <input type="text" class="form-control" id="input-payment-company" placeholder="Company" value="" name="company">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-address-1" class="control-label">Address 1</label>
                                                <input type="text" class="form-control" id="input-payment-address-1" placeholder="Address 1" value="" name="address_1">
                                            </div>
                                            <div class="form-group">
                                                <label for="input-payment-address-2" class="control-label">Address 2</label>
                                                <input type="text" class="form-control" id="input-payment-address-2" placeholder="Address 2" value="" name="address_2">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-city" class="control-label">City</label>
                                                <input type="text" class="form-control" id="input-payment-city" placeholder="City" value="" name="city">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-postcode" class="control-label">Post Code</label>
                                                <input type="text" class="form-control" id="input-payment-postcode" placeholder="Post Code" value="" name="postcode">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-country" class="control-label">Country</label>
                                                <select class="form-control" id="input-payment-country" name="country_id">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="244">Aaland Islands</option>
                                                <option value="1">Afghanistan</option>
                                                <option value="2">Albania</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">American Samoa</option>
                                                <option value="5">Andorra</option>
                                                <option value="6">Angola</option>
                                                <option value="7">Anguilla</option>
                                                <option value="8">Antarctica</option>
                                                <option value="9">Antigua and Barbuda</option>
                                                <option value="10">Argentina</option>
                                                <option value="11">Armenia</option>
                                                <option value="12">Aruba</option>
                                                <option value="252">Ascension Island (British)</option>
                                                <option value="13">Australia</option>
                                                <option value="14">Austria</option>
                                                <option value="15">Azerbaijan</option>
                                                <option value="16">Bahamas</option>
                                                <option value="17">Bahrain</option>
                                                
                                                </select>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-zone" class="control-label">Region / State</label>
                                                <select class="form-control" id="input-payment-zone" name="zone_id">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="3513">Aberdeen</option>
                                                <option value="3514">Aberdeenshire</option>
                                                <option value="3515">Anglesey</option>
                                                <option value="3516">Angus</option>
                                                <option value="3517">Argyll and Bute</option>
                                                <option value="3518">Bedfordshire</option>
                                                <option value="3519">Berkshire</option>
                                                <option value="3520">Blaenau Gwent</option>
                                                <option value="3521">Bridgend</option>
                                                <option value="3522">Bristol</option>
                                                
                                                </select>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" checked="checked" value="1" name="shipping_address">
                                                My delivery and billing addresses are the same.</label>
                                            </div>
                                            </fieldset>
                                        </div>
                                </div>
                                </div>
                                <div class="col-right col-sm-9">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-truck"></i>  Método de Entrega</h4>
                                            </div>
                                            <div class="panel-body ">
                                                <p>Please select the preferred shipping method to use on this order.</p>
                                                <div class="radio">
                                                <label>
                                                    <input type="radio" checked="checked" name="shippingOption" id="freeShipping">
                                                        Free Shipping - $0.00
                                                </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="shippingOption" id="flatRateShipping">
                                                            Flat Shipping Rate - $7.50
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i>  Carrito de compras</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive" id="carritoTable">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-pencil"></i> Añada comentarios sobre su pedido</h4>
                                        </div>
                                        <div class="panel-body">
                                            <textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
                                            <br>
                                            <label class="control-label" for="confirm_agree">
                                            <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                                            <span>He leído y acepto los <a class="agree" href="#"><b>Términos &amp; Condiciones</b></a></span> </label>
                                            <div class="buttons">
                                            <div class="pull-right">
                                                <div>      
                                                    <a href="javascript:realizarPago()" title="Paga con Clip">
                                                        <img src="https://prod-ses-email-templates-assets.s3.amazonaws.com/payment/pay-with-clip/button-logos/es/medios-de-pagos/svg/naranja_hover_con_sombra.svg" alt="Logo Paga con Clip" />
                                                    </a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!--Middle Part End -->
                        </div>
                    </div>
				</div>
			</div>
		</div>