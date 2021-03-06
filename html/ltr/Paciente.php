<?php
if (isset($_REQUEST['nameEnviar'])) {
    include_once '../modelos/presamo.php';
    include_once '../modelos/expediente_juridico.php';
    include_once '../repositorios/repositorio_prestamo.php';
    include_once '../repositorios/repositorio_expediente_juridico.php';
    include_once '../app/Conexion.php';

    $prestamo = new presamo();
    $prestamo->setId_asesor('1');
    $prestamo->setPrestamo_original($_REQUEST['monto_per']);
    $prestamo->setTiempo($_REQUEST['mese_per']);
    $prestamo->setTasa($_REQUEST['tasa_per']);
    $devolucion = date("d-m-Y");
    $devolucion = date_format(date_create($devolucion), 'Y-m-d');
    $prestamo->setFecha($devolucion);
    $prestamo->setTipo_credito("JURIDICO");
    Conexion::abrir_conexion();

    if (repositorio_prestamo::insertar_prestamo(Conexion::obtener_conexion(), $prestamo)) {
        $id_prestamo = repositorio_prestamo::obtenerU_ultimo_prestamo(Conexion::obtener_conexion());
        $id_persona = $_REQUEST['codCliente_cpersonal'];
        echo $id_prestamo;
        echo $id_persona;

        $expediente = new expediente_juridico();
        $expediente->setId_persona_juridica($id_persona);
        $expediente->setId_prestamo($id_prestamo);

        if (repositorio_expediente_juridico::insertar_expediente_juridico(Conexion::obtener_conexion(), $expediente)) {
            echo '<script>
                    location.href="credito_juridico.php";
                  </script';
        } else {
            
        }
    }
} else {
    ?>


    <!DOCTYPE html>
    <html dir="ltr" lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- Favicon icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
            <title>Sicamom</title>
            <!-- Custom CSS -->
            <link href="../../assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
            <link href="../../assets/libs/jquery-steps/steps.css" rel="stylesheet">
            <link href="../../dist/css/style.min.css" rel="stylesheet">
            <link href="../../dist/css/style.min.css" rel="stylesheet">
            <link href="../../dist/css/style.css" rel="stylesheet">

            <link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        </head>

        <body>
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Main wrapper - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <div id="main-wrapper">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                <header class="topbar" data-navbarbg="skin5">
                    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                        <div class="navbar-header" data-logobg="skin5">
                            <!-- This is for the sidebar toggle which is visible on mobile only -->
                            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                            <!-- ============================================================== -->
                            <!-- Logo -->
                            <!-- ============================================================== -->
                            <a class="navbar-brand" href="index.html">
                                <!-- Logo icon -->
                                <b class="logo-icon p-l-10">
                                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                    <!-- Dark Logo icon -->
                                    <img src="../../assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                                </b>
                                <!--End Logo icon -->
                                <!-- Logo text -->
                                <span class="logo-text">
                                    <!-- dark Logo text -->
                                    <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />

                                </span>
                                <!-- Logo icon -->
                                <!-- <b class="logo-icon"> -->
                                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                                <!-- </b> -->
                                <!--End Logo icon -->
                            </a>
                            <!-- ============================================================== -->
                            <!-- End Logo -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Toggle which is visible on mobile only -->
                            <!-- ============================================================== -->
                            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-left mr-auto">
                                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                                <!-- ============================================================== -->
                                <!-- create new -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <!-- ============================================================== -->
                                <!-- Search -->
                                <!-- ============================================================== -->

                            </ul>
                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-right">
                                <!-- ============================================================== -->
                                <!-- Comment -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <!-- ============================================================== -->
                                <!-- End Comment -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- Messages -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                        <ul class="list-style-none">
                                            <li>
                                                <div class="">
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="link border-top">
                                                        <div class="d-flex no-block align-items-center p-10">
                                                            <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                            <div class="m-l-10">
                                                                <h5 class="m-b-0">Event today</h5> 
                                                                <span class="mail-desc">Just a reminder that event</span> 
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="link border-top">
                                                        <div class="d-flex no-block align-items-center p-10">
                                                            <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                            <div class="m-l-10">
                                                                <h5 class="m-b-0">Settings</h5> 
                                                                <span class="mail-desc">You can customize this template</span> 
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="link border-top">
                                                        <div class="d-flex no-block align-items-center p-10">
                                                            <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                            <div class="m-l-10">
                                                                <h5 class="m-b-0">Pavan kumar</h5> 
                                                                <span class="mail-desc">Just see the my admin!</span> 
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="link border-top">
                                                        <div class="d-flex no-block align-items-center p-10">
                                                            <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                            <div class="m-l-10">
                                                                <h5 class="m-b-0">Luanch Admin</h5> 
                                                                <span class="mail-desc">Just see the my new admin!</span> 
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- ============================================================== -->
                                <!-- End Messages -->
                                <!-- ============================================================== -->

                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                        <div class="dropdown-divider"></div>
                                        <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                                    </div>
                                </li>
                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar" data-sidebarbg="skin5">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav" class="p-t-30">


                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fas fa-briefcase"></i><span class="hide-menu">Expediente</span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">

                                        <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="fas fa-address-card"></i><span class="hide-menu"> Registrar </span></a></li>

                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-pencil-alt"></i><span class="hide-menu">Modificar</span></a></li>
                                        <li class="sidebar-item"><a href="consult_Expediente.html" class="sidebar-link"><i class="fas fa-search"></i><span class="hide-menu">Buscar</span></a></li>
                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-arrows-alt-v"></i><span class="hide-menu">Dar alta/baja</span></a></li>
                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="far fa-file"></i><span class="hide-menu">Reporte</span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-box-open"></i><span class="hide-menu">Inventario </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item"><a href="form-wizard-inventario.html" class="sidebar-link"><i class="fas fa-address-card"></i><span class="hide-menu">Registrar</span></a></li>
                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-pencil-alt"></i><span class="hide-menu">Modificar</span></a></li>

                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-arrows-alt-v"></i><span class="hide-menu">Dar Alta/Baja</span></a></li>

                                        <li class="sidebar-item"><a href="consult_Insumos.html" class="sidebar-link"><i class="far fa-check-square"></i><span class="hide-menu">Control de insumos</span></a></li>

                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="far fa-file"></i><span class="hide-menu">Reporte</span></a></li>
                                    </ul>
                                </li>

                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">Usuario </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-user-plus"></i><span class="hide-menu">Registrar</span></a></li>
                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-pencil-alt"></i><span class="hide-menu">Modificar</span></a></li>

                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-user-times"></i><span class="hide-menu">Dar Alta/Baja</span></a></li>
                                    </ul>
                                </li>

                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-lock"></i><span class="hide-menu">Seguridad</span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item"><a href="consult_Bitacora.html" class="sidebar-link"><i class="fas fa-book"></i><span class="hide-menu"> Bitácora </span></a></li>

                                    </ul>
                                </li>




                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </aside>
                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Page wrapper  -->
                <!-- ============================================================== -->
                <div class="page-wrapper" style="height: 671px;">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Container fluid  -->
                    <!-- ============================================================== -->
                    <div class="container-fluid">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <div class="card" style="background: rgba(0, 101, 191,0.3)">
                            <div class="card-body wizard-content">
                                <h3 class="card-title">Registro Paciente.</h3>
                                <form id="example-form" action="../../Conexion/conexion.php" class="m-t-40" method="POST">
                                    <div>
                                        <h3>Datos personales</h3>
                                        <section>

                                            <div class="row mb-3">
                                                <div class="col-lg-4">
                                                    <label>Nombre<small class="text-muted"></small></label>
                                                    <div class="input-group">
                                                        <input type="text" name="nombre" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                        </div>
                                                    </div> 

                                                </div>

                                                <div class="col-lg-4">
                                                    <label>Apellido<small class="text-muted"></small></label>
                                                    <div class="input-group">
                                                        <input type="text" name="apellido" class="form-control" id="fnamep" placeholder="Ingrese apellido">  
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                        </div>
                                                    </div>                                    
                                                </div>

                                                <div class="col-lg-4">
                                                    <label>Fecha de nacimiento<small class="text-muted"></small></label>
                                                    <div class="input-group">
                                                        <input type="text" name="fecha" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>                              
                                                </div>


                                                <div class="col-lg-4">
                                                    <label style="padding-top: 12px;">DUI<small class="text-muted"> 99999999-9</small></label>
                                                    <div class="input-group">
                                                        <input type="text" name="dui" class="form-control phone-inputmask" id="phone-maske" placeholder="Ingrese DUI"> 
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                        </div>
                                                    </div> 
                                                    <input id="acceptTerms2" name="acceptTerms" type="checkbox">
                                                    <label for="acceptTerms">Si la paciente no porta el DUI</label>  
                                                </div>

                                                <div class="col-lg-4">
                                                    <label style="padding-top: 12px;">Teléfono<small class="text-muted"> 9999-9999</small></label>
                                                    <div class="input-group">
                                                        <input type="text" name="telefono" class="form-control phone-inputmask2" id="phone-mask2" placeholder="Ingrese número telefónico">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        </div>
                                                    </div> 
                                                    <input id="acceptTerms2" name="acceptTerms" type="checkbox">
                                                    <label for="acceptTerms">Si la paciente no posee número telefónico</label>  
                                                </div>

                                                <div class="col-lg-4">
                                                    <label style="padding-top: 12px;" name="tipo">Tipo de consulta<small class="text-muted"></small></label>
                                                    <select class="custom-select" style="width: 100%; height:36px;">
                                                        <option>Seleccionar</option>
                                                        <option value="CG">Consulta general</option>
                                                        <option value="CE">Control de embarazo</option>
                                                    </select>
                                                </div>


                                        </section>

                                        <h3>Encargado.</h3>
                                        <section> 
                                            <div class="row mb-3">
                                                <div class="col-lg-6">
                                                    <label>Nombre<small class="text-muted"></small></label>
                                                    <div class="input-group">
                                                        <input type="text" name="nombreRes" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                        </div>
                                                    </div> 

                                                </div>

                                                <div class="col-lg-6">
                                                    <label>Apellido<small class="text-muted"></small></label>
                                                    <div class="input-group">
                                                        <input type="text" name="apellidoRes" class="form-control" id="fnamep" placeholder="Ingrese apellido">  
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                        </div>
                                                    </div> 

                                                </div>

                                                <div class="col-lg-6">
                                                    <label style="padding-top: 12px;">DUI<small class="text-muted"> 99999999-9</small></label>
                                                    <div class="input-group">
                                                        <input type="text" name="duiRes" class="form-control phone-inputmask" id="phone-maske" placeholder="Ingrese DUI"> 
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                        </div>
                                                    </div> 
                                                    <input id="acceptTerms2" name="acceptTerms" type="checkbox">
                                                    <label for="acceptTerms">Si el encargado no porta el DUI</label>  
                                                </div>

                                                <div class="col-lg-6">
                                                    <label style="padding-top: 12px;">Teléfono<small class="text-muted"> 9999-9999</small></label>
                                                    <div class="input-group">
                                                        <input type="text" name="telefonoRes" class="form-control phone-inputmask2" id="phone-mask2" placeholder="Ingrese número telefónico">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        </div>
                                                    </div> 
                                                    <input id="acceptTerms2" name="acceptTerms" type="checkbox">
                                                    <label for="acceptTerms">Si el encargado no posee número telefónico</label>  
                                                </div>

                                            </div>

                                        </section>

                                    </div>

                                </form>
                                <div class="row mb-12" style="float: right; margin-right: 190px; margin-top: -34px;">
                                    <button type="submit" class="btn btn-info">Cancelar</button>

                                </div>

                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Right sidebar -->
                        <!-- ============================================================== -->
                        <!-- .right-sidebar -->
                        <!-- ============================================================== -->
                        <!-- End Right sidebar -->
                        <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
            <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
            <!--Wave Effects -->
            <script src="../../dist/js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="../../dist/js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="../../dist/js/custom.min.js"></script>
            <!-- this page js -->
            <script src="../../assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
            <script src="../../assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>


            <!-- This Page JS -->
            <script src="../../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
            <script src="../../dist/js/pages/mask/mask.init.js"></script>
            <script src="../../assets/libs/select2/dist/js/select2.full.min.js"></script>
            <script src="../../assets/libs/select2/dist/js/select2.min.js"></script>
            <script src="../../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
            <script src="../../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
            <script src="../../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
            <script src="../../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
            <script src="../../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <script src="../../assets/libs/quill/dist/quill.min.js"></script>
            <script>
                // Basic Example with form
                var form = $("#example-form");
                form.validate({
                    errorPlacement: function errorPlacement(error, element) {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password"
                        }
                    }
                });
                form.children("div").steps({
                    headerTag: "h3",
                    bodyTag: "section",
                    transitionEffect: "slideLeft",
                    onStepChanging: function (event, currentIndex, newIndex) {
                        form.validate().settings.ignore = ":disabled,:hidden";
                        return form.valid();
                    },
                    onFinishing: function (event, currentIndex) {
                        form.validate().settings.ignore = ":disabled";
                        return form.valid();
                    },
                    onFinished: function (event, currentIndex) {
                        alert("Submitted!");
                    }
                });


            </script>

            <script>
                //***********************************//
                // For select 2
                //***********************************//
                $(".select2").select2();

                /*colorpicker*/
                $('.demo').each(function () {
                    //
                    // Dear reader, it's actually very easy to initialize MiniColors. For example:
                    //
                    //  $(selector).minicolors();
                    //
                    // The way I've done it below is just for the demo, so don't get confused
                    // by it. Also, data- attributes aren't supported at this time...they're
                    // only used for this demo.
                    //
                    $(this).minicolors({
                        control: $(this).attr('data-control') || 'hue',
                        position: $(this).attr('data-position') || 'bottom left',
                        change: function (value, opacity) {
                            if (!value)
                                return;
                            if (opacity)
                                value += ', ' + opacity;
                            if (typeof console === 'object') {
                                console.log(value);
                            }
                        },
                        theme: 'bootstrap'
                    });

                });
                /*datwpicker*/
                jQuery('.mydatepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });
                var quill = new Quill('#editor', {
                    theme: 'snow'
                });

            </script>
        </body>

    </html>

    <?php
}
include_once '../plantilla/pie.php';
?>