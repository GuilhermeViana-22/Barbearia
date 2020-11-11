<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>High Hill - Home</title>

   
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/fontawesome-free/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">


    <div id="wrapper">

      
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

          
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cut"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Barbearia High Hills <sup>2</sup></div>
            </a>

        
            <hr class="sidebar-divider my-0">

          


            <hr class="sidebar-divider">



            
            <div class="sidebar-heading">
                Addons
            </div>

          
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilizades</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Serviços</h6>
                        <a class="collapse-item" href="cad_colaborador.php">Registrar Colaborador</a>
                        <a class="collapse-item" href="cad_cliente.php">Registrar Cliente</a>
                        <a class="collapse-item" href="agendamento.php">Agendamento de corte</a>
                    </div>
                </div>
            </li>
            
            <hr class="sidebar-divider d-none d-md-block">

          
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          


        </ul>
       

        
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">


                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                                                                                            include "banco.php";
                                                                                            include 'crud_verifica_login.php';
                                                                                            echo $_SESSION["nome"]; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="crud_logout.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>

                <div class="container-fluid">


                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Barbearia High Hills</h1>
                                    <img src="img/undraw_barber_3uel.svg" style="width: 90%;">
                                </div>

                            </div>

                            </form>
                        </div>
                    </div>

                </div>
                

               
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Barbearia High Hills 2020</span>
                        </div>
                    </div>
                </footer>


            </div>


        </div>



        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>