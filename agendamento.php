<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cut"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Barbearia High Hills <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->


            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilizades</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Serviços</h6>
                        <a class="collapse-item" href="#">Login</a>
                        <a class="collapse-item" href="">Registrar Colaborador</a>
                        <a class="collapse-item" href="#">Registrar Cliente</a>
                        <a class="collapse-item" href="http://localhost/barbearia/trunk/agedamento.php">Agendamento de corte</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Agendamento de Serviços</h1>
                                </div>
                                <form class="user">

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label><strong> Data desejada :</strong></label>
                                            <input type="date" name="data_agendamento" class="form-control form-control-user" id="exampleRepeatPassword">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php

                                                $horarios = array(
                                                    "10:00:00" => "10:00:00",
                                                    "10:30:00" => "10:30:00",
                                                    "11:00:00" => "11:00:00",
                                                    "11:30:00" => "12:30:00",
                                                    "13:00:00" => "13:00:00",
                                                    "13:30:00" => "13:30:00",
                                                    "14:00:00" => "14:00:00",
                                                    "14:30:00" => "14:30:00",
                                                    "15:00:00" => "15:00:00",
                                                    "15:30:00" => "15:30:00",
                                                    "16:00:00" => "16:00:00",
                                                );
                                                ?>
                                                <label for="inputLastName">Selecione um dos horários:</label>
                                                <select class="form-control form-control-user" aria-placeholder="Selecione" name="horario">


                                                    <?php
                                                    # A logica utilizada nos selects é diferente dos demais blocos de codigo do nosso sistema
                                                    if (isset($_GET["cod_servico"])) {
                                                        $resultadoVerificaHorario = $conexao->query("SELECT * FROM atendimento WHERE cod_servico = " . $_GET["cod_servico"]);
                                                        $dadosverificaHorario = $resultadoVerificaHorario->fetch_assoc();
                                                        foreach ($horarios as $key => $value) {
                                                            if ($dadosverificaHorario["horario"] == $key) {
                                                                echo "<option value=" . $key . " selected>" . $value . "</option>";
                                                            } else {
                                                                echo "<option value=" . $key . ">" . $value . "</option>";
                                                            }
                                                        }
                                                    } else {
                                                        foreach ($horarios as $key => $value) {
                                                            echo "<option value=" . $key . ">" . $value . "</option>";
                                                        }
                                                    }
                                                    ?>




                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><strong> Tipo de serviço :</strong></label>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="email" name="status" class="form-control form-control-user" id="exampleInputEmail" placeholder="Tipo de procedimento agendado">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">


                                            </div class="row">
                                            <div class="col-sm-9"></div>
                                            <div class="col-sm-3"></div>
                                        </div>

                                    </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                        </form>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Data de nascimento</th>
                                            <th>Ações</th>

                                        </tr>
                                    </thead>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Barbearia High Hills 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Botstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>