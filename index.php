<?php include 'layouts/main.php'; ?>
<?php include 'layouts/conexion-cambios.php'; ?>

<?php include 'layouts/constants-cambios.php'; ?>



<?php
$total = 0;
$monto = '';
$a = '';
$de = '';
$tasa = '';
$whatsapp = '';


if ($_POST) {
    $monto = $_POST['monto'];
    $a = $_POST['a'];
    $de = $_POST['de'];

    if ($a == 'DOLAR' && $de == 'BS') {
        $tasa = $valor_BCV;

        $total = number_format($monto / $tasa, 2, ',', '.') . " $";
        $whatsapp = '<a href="https://api.whatsapp.com/send?phone=573138653788&text=Hola%20ServiexpressVE%20me%20gustaría%20Cotizar:📌 💰%0A💵Tasa:%20' . $de . ' a ' . $a . '(' . $tasa . ')' . '%0A💵Cantidad%20a%20enviar:%20' . $monto . $de . '%0A💵Monto:%20' . $total . '" type="button" class="btn btn-success btn-label waves-effect waves-light rounded-pill"><i class="ri-whatsapp-line label-icon align-middle rounded-pill fs-16 me-2"></i> Whatsapp</a>';
    }
    if ($a == 'COP' && $de == 'BS') {
        $tasa = $valor_BSCOP;
        $total = number_format($monto * $tasa, 0, ',', '.') . " COP";
        $whatsapp = '<a href="https://api.whatsapp.com/send?phone=573138653788&text=Hola%20ServiexpressVE%20me%20gustaría%20Cotizar:📌 💰%0A💵Tasa:%20' . $de . ' a ' . $a . '(' . $tasa . ')' . '%0A💵Cantidad%20a%20enviar:%20' . $monto . $de . '%0A💵Monto:%20' . $total . '" type="button" class="btn btn-success btn-label waves-effect waves-light rounded-pill"><i class="ri-whatsapp-line label-icon align-middle rounded-pill fs-16 me-2"></i> Whatsapp</a>';
    }
    if ($a == 'DOLAR' && $de == 'COP') {
        $tasa = $valor_COPDOLAR;
        $total = number_format($monto / $tasa, 2, ',', '.') . " $";
        $whatsapp = '<a href="https://api.whatsapp.com/send?phone=573138653788&text=Hola%20ServiexpressVE%20me%20gustaría%20Cotizar:📌 💰%0A💵Tasa:%20' . $de . ' a ' . $a . '(' . $tasa . ')' . '%0A💵Cantidad%20a%20enviar:%20' . $monto . $de . '%0A💵Monto:%20' . $total . '" type="button" class="btn btn-success btn-label waves-effect waves-light rounded-pill"><i class="ri-whatsapp-line label-icon align-middle rounded-pill fs-16 me-2"></i> Whatsapp</a>';
    }

    if ($a == 'BS' && $de == 'COP') {
        $tasa = $valor_COPBS;
        $total = number_format($monto / $tasa, 0, ',', '.') . " BS";
        $whatsapp = '<a href="https://api.whatsapp.com/send?phone=573138653788&text=Hola%20ServiexpressVE%20me%20gustaría%20Cotizar:📌 💰%0A💵Tasa:%20' . $de . ' a ' . $a . '(' . $tasa . ')' . '%0A💵Cantidad%20a%20enviar:%20' . $monto . $de . '%0A💵Monto:%20' . $total . '" type="button" class="btn btn-success btn-label waves-effect waves-light rounded-pill"><i class="ri-whatsapp-line label-icon align-middle rounded-pill fs-16 me-2"></i> Whatsapp</a>';
    }




}





?>

<head>

    <?php includeFileWithVariables('layouts/title-meta-cambios.php', array('title' => 'Cambios Serviexpressve')); ?>

    <?php include 'layouts/head-css.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include 'layouts/menu-cambios.php'; ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <?php includeFileWithVariables('layouts/page-title-cambios.php', array('pagetitle' => 'Cambios', 'title' => 'Serviexpressve')); ?>



                    <div class="row">

                        <!--end col-->
                        <div class="col-xxl-3">
                            <div class="card card-height-100">
                                <div class="card-header">
                                    <ul class="nav nav-tabs-custom rounded card-header-tabs nav-justified border-bottom-0 mx-n3"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#cryptoBuy"
                                                role="tab">
                                                Calculadora de cambios
                                            </a>
                                        </li>
                                        <!--                                    <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#cryptoSell" role="tab">
                                                Sell
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="card-body p-0">
                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="cryptoBuy" role="tabpanel">

                                            <div class="p-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <form action="" method="post">
                                                                <!-- <label>De :</label>
                                                                <select id="Mostrar" name="de" style=""
                                                                    class="form-select">
                                                                    <option id="MostrarParaBS" selected value="BS">
                                                                        Bolivares</option>
                                                                    <option id="MostrarParaCOP" value="COP">COP</option>
                                                                    <option id="MostrarParaDOLAR" value="DOLAR">Dolar
                                                                    </option>
                                                                </select> -->
                                                                <label for="select-principal">De:</label>
                                                                <select name="de" id="select-principal"
                                                                    class="form-select" required
                                                                    style="background-color:black;">
                                                                    <option value="">-- Elige una opción --</option>
                                                                    <option style="color:white;" value="BS">Bolivares
                                                                    </option>
                                                                    <option style="color:white;" value="COP">COP
                                                                    </option>
                                                                    <!-- <option style="color:white;" value="DOLAR">DOLAR</option> -->
                                                                </select>
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <!-- <select name="a" class="form-select">
                                                                <option id="COP" value="COP">COP</option>
                                                                <option id="DOLAR" value="DOLAR">Dolar</option>
                                                                <option id="BS" value="BS">Bolivares</option>

                                                            </select> -->

                                                            <label for="select-dependiente">A:</label>
                                                            <select name="a" id="select-dependiente" disabled
                                                                class="form-select" required
                                                                style="background-color:black;">
                                                                <option value="" style="color:white;">-- Selecciona una
                                                                    divisa primero --
                                                                </option>
                                                            </select>

                                                        </div>
                                                    </div><!-- end col -->
                                                </div><!-- end row -->
                                                <div>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text">Monto</label>
                                                        <input type="number" class="form-control" placeholder="0"
                                                            name="monto" Required>
                                                    </div>




                                                </div>
                                                <div class="mt-3 pt-2">
                                                    <div class="d-flex mb-2">
                                                        <div class="flex-grow-1">
                                                            <p class="fs-13 mb-0">Conversion:</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0">
                                                                <?php
                                                                echo ($de ? $de : '') . ' - ' . ($a ? $a : '') . ' ' . ($tasa) ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <div class="flex-grow-1">
                                                            <p class="fs-13 mb-0">Cantidad a calcular:</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0"><?php
                                                            echo ($monto ? $monto : ' - ') . ' ' . $de; ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <div class="flex-grow-1">
                                                            <p class="fs-13 mb-0">Tu resultado es:</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0"><?php
                                                            echo ($total ? $total : ' - '); ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <div class="flex-grow-1">
                                                            <p class="fs-13 mb-0">Enviar:</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0"><?php
                                                            echo $whatsapp; ?></h6>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="mt-3 pt-2">
                                                    <button type="submit"
                                                        class="btn btn-soft-success w-100">Calcular</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        <!--end tab-pane-->
                                        <div class="tab-pane" id="cryptoSell" role="tabpanel">
                                            <div class="p-3 bg-primary-subtle">
                                                <div class="float-end ms-2">
                                                    <h6 class="text-primary mb-0">USD Balance : <span
                                                            class="text-body">$12,426.07</span></h6>
                                                </div>
                                                <h6 class="mb-0 text-danger">Sell Coin</h6>
                                            </div>
                                            <div class="p-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="currencySelect">Currency :</label>
                                                            <select class="form-select" id="currencySelect">
                                                                <option value="BTC" selected>BTC</option>
                                                                <option value="ETH">ETH</option>
                                                                <option value="EUR">EUR</option>
                                                                <option value="JPY">JPY</option>
                                                                <option value="LTC">LTC</option>
                                                            </select>
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <div class="mb-3">
                                                                <label for="paymentMethod">Payment Method :</label>
                                                                <select class="form-select" id="paymentMethod">
                                                                    <option>Wallet Balance</option>
                                                                    <option>Credit / Debit Card</option>
                                                                    <option>PayPal</option>
                                                                    <option>Payoneer</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->
                                                </div><!-- end row -->
                                                <div>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text">Amount</label>
                                                        <input type="text" class="form-control" placeholder="0">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text">Price</label>
                                                        <input type="text" class="form-control" placeholder="2.045585">
                                                        <label class="input-group-text">$</label>
                                                    </div>
                                                    <div class="input-group mb-0">
                                                        <label class="input-group-text">Total</label>
                                                        <input type="text" class="form-control" placeholder="2700.16">
                                                    </div>
                                                </div>
                                                <div class="mt-3 pt-2">
                                                    <div class="d-flex mb-2">
                                                        <div class="flex-grow-1">
                                                            <p class="fs-13 mb-0">Transaction Fees<span
                                                                    class="text-muted ms-1 fs-11">(0.05%)</span></p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0">$1.08</h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <div class="flex-grow-1">
                                                            <p class="fs-13 mb-0">Minimum Received<span
                                                                    class="text-muted ms-1 fs-11">(2%)</span></p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0">$7.85</h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="fs-13 mb-0">Estimated Rate</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0">1 BTC ~ $46982.70</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 pt-2">
                                                    <button type="button" class="btn btn-danger w-100">Sell
                                                        Coin</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end tab-pane-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->



                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include 'layouts/footer.php'; ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->




    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- list.js min js -->
    <script src="assets/libs/list.js/list.min.js"></script>
    <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!--crypto-buy-sell init-->
    <script src="assets/js/pages/crypto-buy-sell.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>


    <script>
        $(document).ready(function () {
            // 1. Objeto con los datos de las opciones dependientes
            const opciones = {
                BS: [
                    { value: "COP", text: "COP" },
                    { value: "DOLAR", text: "DOLAR" },
                ],
                COP: [
                    { value: "BS", text: "BS" },
                    { value: "DOLAR", text: "DOLAR" },
                ],
                DOLAR: [
                    { value: "BS", text: "BS" },
                    { value: "COP", text: "COP" },
                ]
            };

            // 2. Manejador de eventos para el SELECT principal
            $('#select-principal').on('change', function () {
                const categoriaSeleccionada = $(this).val();
                const $selectDependiente = $('#select-dependiente');

                // Limpiar opciones anteriores
                $selectDependiente.empty();

                if (categoriaSeleccionada === "") {
                    // Si no se ha seleccionado nada, deshabilitar y poner mensaje inicial
                    $selectDependiente.append('<option value="">-- Selecciona una divisa primero --</option>');
                    $selectDependiente.prop('disabled', true);
                } else {
                    // Habilitar el select dependiente
                    $selectDependiente.prop('disabled', false);

                    // Agregar la opción por defecto (placeholder)
                    $selectDependiente.append('<option value="">-- Selecciona el cambio --</option>');

                    // Obtener el array de opciones para la categoría
                    const productos = opciones[categoriaSeleccionada];

                    // 3. Iterar sobre los productos y añadir las opciones al select dependiente
                    if (productos) {
                        $.each(productos, function (index, producto) {
                            $selectDependiente.append(
                                $('<option>', {
                                    value: producto.value,
                                    text: producto.text
                                })
                            );
                        });
                    }
                }
            });

            // Inicializar el select dependiente con el estado deshabilitado
            // (Esto ya está en el HTML, pero es una buena práctica reiterarlo)
            $('#select-dependiente').prop('disabled', true);
        });
    </script>
</body>

</html>