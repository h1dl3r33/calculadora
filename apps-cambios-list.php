<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>
<?php include 'layouts/conexion-cambios.php'; ?>
<?php include 'layouts/constants-cambios.php'; ?>


<?php

// Eliminar datos con foto


if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET)) ? $_GET['txtID'] : "";

    $sentencia = $pdo->prepare('SELECT wfoto FROM welcome WHERE id_welcome=:id_welcome');
    $sentencia->bindParam(':id_welcome', $txtID);


    $sentencia->execute();
    $foto_recuperada = $sentencia->fetch(PDO::FETCH_LAZY);

    if (isset($foto_recuperada['wfoto']) && $foto_recuperada["wfoto"] != "") {
        if (file_exists("storage/" . $foto_recuperada["wfoto"])) {
            unlink("storage/" . $foto_recuperada["wfoto"]);
        }
    }


    $sentencia = $pdo->prepare('DELETE FROM welcome WHERE id_welcome=:id_welcome');
    $sentencia->bindParam(':id_welcome', $txtID);
    $sentencia->execute();
    $mensaje = "Registro eliminado";
    header('Location:apps-projects-list.php?mensaje=' . $mensaje);
}








?>






<head>

    <?php includeFileWithVariables('layouts/title-meta-cambios.php', array('title' => 'Administrador Serviexpressve')); ?>

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

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Paginas', 'title' => 'Editables')); ?>



                    <div class="row">

                        <?php foreach ($listado_cambios as $cambios) { ?>
                            <div class="col-xxl-3 col-sm-6 project-card">
                                <div class="card card-height-100">
                                    <div class="card-body">
                                        <div class="d-flex flex-column h-100">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-4">Bienvenida</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-1 align-items-center">
                                                        <button type="button" class="btn avatar-xs mt-n1 p-0 favourite-btn">
                                                            <span class="avatar-title bg-transparent fs-15">
                                                                <i class="ri-star-fill"></i>
                                                            </span>
                                                        </button>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="true">
                                                                <i data-feather="more-horizontal" class="icon-sm"></i>
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-end">

                                                                <a class="dropdown-item"
                                                                    href="apps-cambios-edit.php?txtID=<?php echo $cambios['id_cambio'] ?>"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    Edit</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item"
                                                                    href="javascript:borrar(<?php echo $cambios['id_cambio'] ?>);"
                                                                    data-bs-toggle="" data-bs-target=""> <i
                                                                        class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                    Borrar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-warning-subtle rounded p-2">
                                                            <img src="storage/<?php echo $cambios['id_cambio'] ?>" alt=""
                                                                class="img-fluid ">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="mb-1 fs-15"><a href="apps-projects-overview.php"
                                                            class="text-body"><?php echo $cambios['nombre_cambio'] ?></a>
                                                    </h5>
                                                    <p class="text-muted text-truncate-two-lines mb-3">
                                                        <?php echo $cambios['valor_cambio'] ?>
                                                    </p>
                                                </div>


                                            </div>



                                        </div>


                                    </div>
                                    <!-- end card body -->

                                    <!-- end card footer -->
                                </div>
                                <!-- end card -->
                            </div>

                        <?php } ?>
                        <!-- end col -->



                        <!-- end col -->


                        <!-- end col -->


                        <!-- end col -->
                    </div>
                    <!-- end row -->






                    <!-- 

                    <div class="row g-0 text-center text-sm-start align-items-center mb-4">
                        <div class="col-sm-6">
                            <div>
                                <p class="mb-sm-0 text-muted">Showing <span class="fw-semibold">1</span> to <span
                                        class="fw-semibold">10</span> of <span
                                        class="fw-semibold text-decoration-underline">12</span> entries</p>
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <ul
                                class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                <li class="page-item disabled">
                                    <a href="#" class="page-link">Previous</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item ">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">4</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">5</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>

            </div>


            <?php include 'layouts/footer.php'; ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- removeProjectModal -->
    <div id="removeProjectModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Project ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="remove-project">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- project list init -->
    <script src="assets/js/pages/project-list.init.js"></script>



    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script>
        function borrar(id_welcome) {
            // apps-projects-list.php?txtID=
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                confirmButtonText: "¡Sí, elimínalo!",
                buttonsStyling: false,
                showCloseButton: true
            }).then(function (result) {
                if (result.value) {

                    window.location = "apps-projects-list.php?txtID=" + id_welcome


                }

            });

        }
    </script>


</body>

</html>