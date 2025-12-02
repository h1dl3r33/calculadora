<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>
<?php include 'layouts/conexion-cambios.php'; ?>


<?php
// SELECCIONAR INFORMATION A UNA BASE DE
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET)) ? $_GET['txtID'] : "";


    $sentencia = $pdo->prepare('SELECT * FROM cambios WHERE id_cambio=:id_cambio');
    $sentencia->bindParam(':id_cambio', $txtID);
    $sentencia->execute();

    $cambios = $sentencia->fetch(PDO::FETCH_LAZY);
    $id_cambio = $cambios['id_cambio'];
    $nombre_cambio = $cambios['nombre_cambio'];
    $valor_cambio = $cambios['valor_cambio'];


}


if ($_POST) {

    $txtID = (isset($_POST["txtID"]) ? $_POST["txtID"] : "");
    $nombre_cambio = (isset($_POST["nombre_cambio"]) ? $_POST["nombre_cambio"] : "");
    $valor_cambio = (isset($_POST["valor_cambio"]) ? $_POST["valor_cambio"] : "");

    $sentencia = $pdo->prepare('UPDATE cambios SET nombre_cambio=:nombre_cambio, valor_cambio=:valor_cambio WHERE id_cambio=:id_cambio');
    $sentencia->bindParam(':id_cambio', $txtID);

    $sentencia->bindParam(':nombre_cambio', $nombre_cambio);
    $sentencia->bindParam(':valor_cambio', $valor_cambio);
    $sentencia->execute();



    header('Location:apps-cambios-list.php');

}






?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Crear Editable')); ?>

    <!-- Plugins css -->
    <link href="assets/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-css.php'; ?>

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

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Projects', 'title' => 'Crear editable')); ?>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="txtID" name="txtID"
                                                placeholder="" value="<?php echo $id_cambio ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="project-title-input">Titulo</label>
                                            <input type="text" class="form-control" id="nombre_cambio"
                                                name="nombre_cambio" placeholder=""
                                                value="<?php echo $nombre_cambio ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="project-title-input">Valor o precio</label>
                                            <input type="text" class="form-control" id="valor_cambio"
                                                name="valor_cambio" value="<?php echo $valor_cambio ?>">
                                        </div>






                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->


                                <!-- end card -->
                                <div class="text-end mb-4">
                                    <a class="btn btn-secondary w-sm" href="apps-projects-list.php">Cancelar</a>
                                    <button type="submit" class="btn btn-success w-sm">Actualizar</button>
                                </div>
                            </div>
                            <!-- end col -->

                            <!-- end col -->
                        </div>
                        <!-- end row -->

                </div>
                </form>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include 'layouts/footer.php'; ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Modal -->
    <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3 ps-4 bg-success-subtle">
                    <h5 class="modal-title" id="inviteMembersModalLabel">Members</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="search-box mb-3">
                        <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                        <i class="ri-search-line search-icon"></i>
                    </div>

                    <div class="mb-4 d-flex align-items-center">
                        <div class="me-2">
                            <h5 class="mb-0 fs-13">Members :</h5>
                        </div>
                        <div class="avatar-group justify-content-center">
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                <div class="avatar-xs">
                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle bg-secondary">
                                        S
                                    </div>
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                <div class="avatar-xs">
                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                        <div class="vstack gap-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Nancy Martino</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-danger-subtle text-danger rounded-circle">
                                        HB
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Henry Baird</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Frank Hook</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Jennifer Carter</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                        AC
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Alexis Clarke</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Joseph Parker</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                        </div>
                        <!-- end list -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success w-xs">Invite</button>
                </div>
            </div>
            <!-- end modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- end modal -->



    <?php include 'layouts/customizer.php'; ?>

    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- ckeditor -->
    <script src="assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

    <!-- dropzone js -->
    <script src="assets/libs/dropzone/dropzone-min.js"></script>
    <!-- project-create init -->
    <script src="assets/js/pages/project-create.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>