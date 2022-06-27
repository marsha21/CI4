<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title;?></title>

    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script>
    $(document).ready(function() {
        // Sembunyikan alert validasi kosong
        $("#kosong").hide();
    });
    </script>


</head>

<body id="page-top">
<?php $session = session()?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Web Dev</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?=($page == 'dashboard') ? 'active':''; ?>">
                <a class="nav-link" href="/user">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?=($page == 'product_data') ? 'active':''; ?>">
                <a class="nav-link <?=($page == 'product_data') ? '':'collapsed'; ?>" href="#" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse <?=($page == 'product_data') ? 'show':''; ?>"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item <?=($page == 'product_data') ? 'active':''; ?>" href="/user/product_data">Lihat Data</a>
                        <a class="collapse-item <?=($page == 'product_import') ? 'active':''; ?>" href="/user/product_import">Import Data</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo,
                                    <?=$session->get('user_name')?> </span>
                                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- BODY -->
                <?= $this->renderSection('bodycontent');?>


            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; UMMI <?=date('Y');?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika ingin mengakhiri sesi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-success" href="/auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

    <!-- <script src="../assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script> -->
    <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/demo/datatables-demo.js"></script>


    <script type="text/javascript">
    $(".viewID").click(function() {
        var pid = $(this).data('pid');
        $("#pid").val(pid);

        var pname = $(this).data('pname');
        $("#pname").val(pname);

        var pcategory = $(this).data('pcategory');
        $("#pcategory").val(pcategory);

        var pdescription = $(this).data('pdescription');
        $("#pdescription").val(pdescription);

        var pprice = $(this).data('pprice');
        $("#pprice").val(pprice);

        var pimg = $(this).data('pimg');
        $("#pimgs").attr("src", pimg);

        $('#viewmodal').modal('show');
    });
    </script>

    <script type="text/javascript">
    $(".editID").click(function() {
        var eid = $(this).data('eid');
        $("#eid").val(eid);

        var ename = $(this).data('ename');
        $("#ename").val(ename);

        var ecategory = $(this).data('ecategory');
        $("#ecategory").val(ecategory);

        var edescription = $(this).data('edescription');
        $("#edescription").val(edescription);

        var eprice = $(this).data('eprice');
        $("#eprice").val(eprice);

        var eimg = $(this).data('eimg');
        $("#eimgs").attr("src", eimg);

        $('#editmodal').modal('show');
    });
    </script>


    <script type="text/javascript">
    $(".deleteID").click(function() {
        var did = $(this).data('did');
        $("#did").val(did);

        $('#deletemodal').modal('show');
    });
    </script>


    <!-- Alert auto close -->
    <script type="text/javascript">
    window.setTimeout(function() {
        $(".alertnotif").fadeTo(300, 0).slideUp(300, function() {
            $(this).remove();
        });
    }, 3000);
    </script>
</body>

</html>