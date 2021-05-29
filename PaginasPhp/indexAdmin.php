<?php include("/Administrador/clientesVista.php"); 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MELI CONST</title>

        <!-- CSS -->

 <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="./dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="./dist/css/jquery-ui.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <section id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">MELI CONST</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Login</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Cerrar session</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-windows  fa-fw"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ul -o fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:cargar();" id="listaUsuario"><i class="fa fa-angle-right -o fa-fw"></i>Lista</a>
                                </li>
                                <li>
                                    <a href="javascript:cargar();" id="insertarUsuario"><i class="fa fa-angle-right -o fa-fw"></i>insertar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ul -o fa-fw"></i> Productos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:cargar();" id="listaProducto"><i class="fa fa-angle-right -o fa-fw"></i>Lista</a>
                                </li>
                                <li>
                                    <a href="javascript:cargar();" id="insertarProducto"><i class="fa fa-angle-right -o fa-fw"></i>insertar</a>
                                </li>
                                <li>
                                    <a href="javascript:cargar();" id="buscarProducto"><i class="fa fa-angle-right -o fa-fw"></i>busqueda</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ul -o fa-fw"></i> Proveedores<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:cargar();" id="listaProveedor"><i class="fa fa-angle-right -o fa-fw"></i>Lista</a>
                                </li>
                                <li>
                                    <a href="javascript:cargar();" id="insertarProveedor"><i class="fa fa-angle-right -o fa-fw"></i>insertar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ul -o fa-fw"></i> Ventas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:cargar();" id="listaVenta"><i class="fa fa-angle-right -o fa-fw"></i>Lista</a>
                                </li>
                                <li>
                                    <a href="javascript:cargar();" id="insertarVenta"><i class="fa fa-angle-right -o fa-fw"></i>insertar</a>
                                </li>
                                  <li>
                                    <a href="javascript:cargar();" id="buscarVentaFechas"><i class="fa fa-angle-right -o fa-fw"></i>Reporte de ventas por fecha</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ul -o fa-fw"></i> Clientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:cargar();" id="listaCliente"><i class="fa fa-angle-right -o fa-fw"></i>Lista</a>
                                </li>
                                <li>
                                    <a href="javascript:cargar();" id="insertarCliente"><i class="fa fa-angle-right -o fa-fw"></i>insertar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ul -o fa-fw"></i> Categorias<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:cargar();" id="listaCategoria"><i class="fa fa-angle-right -o fa-fw"></i>Lista</a>
                                </li>
                                <li>
                                    <a href="javascript:cargar();" id="insertarCategoria"><i class="fa fa-angle-right -o fa-fw"></i>insertar</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ul -o fa-fw"></i> Unidades<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:cargar();" id="listaUnidad"><i class="fa fa-angle-right -o fa-fw"></i>Lista</a>
                                </li>
                                <li>
                                    <a href="javascript:cargar();" id="insertarUnidad"><i class="fa fa-angle-right -o fa-fw"></i>insertar</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <div class="thumbnail">
                                <a style="width:100%"  href="#"><img src="../bootstrap/imagenes/products/images.jpeg" alt=""/></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            <section id="page-wrapper">
                <div id="mensaje"></div>
                <div id="respuesta">
                </div>
            </section>
    </section>

    <script src="./bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>
    <script src="./dist/js/principal.js"></script>
    <script src="./dist/js/jquery-ui.js"></script>


</body>

</html>
