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



            <hr class="sidebar-divider">




            <div class="sidebar-heading">
                Addons
            </div>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Sistema</span>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php 
                               include "banco.php"; include 'crud_verifica_login.php';  echo $_SESSION["nome"]; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="crud_logout.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
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
                    <?php if (isset($_GET["sucesso"])) { ?>

                        <div class="alert alert-success">
                            <?php
                            # esse numero 1 refere-se a mensagem de sucesso exibida  no inicio da tela
                            # se o if ficar atrelado ao primeiro laço ele estará no laço de inserir referenciado no 
                            # crud_cliente
                            # logo ele retorna a mensagem de cliente inserido com sucsso
                            if ($_GET["sucesso"] == 1) {
                                echo "Cliente inserido com sucesso!";
                                # esse numero 2 refere-se a mensagem de sucesso exibida  no inicio da tela
                                # se o if ficar atrelado ao segundo laço ele estará no laço de atualizar que esta referenciado no 
                                # crud_cliente
                                # logo ele retorna a mensagem de cliente inserido com sucsso
                            } else if ($_GET["sucesso"] == 2) {
                                echo "Cliente atualizado com sucesso!";
                            } else {
                                echo "Cliente excluído com sucesso!";
                            }
                            ?>
                        </div>

                    <?php } ?>

                    <?php if (isset($_GET["erro"])) { ?>
                        <div class="alert alert-danger">
                            <?php
                            if ($_GET["erro"] == 1) {
                                echo "Erro ao inserir cliente!";
                            } else if ($_GET["erro"] == 2) {
                                echo "Erro ao atualizar cliente!";
                            } else {
                                echo "Erro ao excluir cliente   !";
                            }
                            ?>
                        </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registro Cliente</h1>
                                </div>
                                <form class="user" action="crud_cliente.php" method="post" data-toggle="validator" role="form">
                                    <?php
                                    $dados;
                                    if (isset($_GET["id_cliente"])) {
                                        include "banco.php";
                                        $queryCliente = $conexao->query("SELECT * FROM cliente WHERE id_cliente = " . $_GET["id_cliente"]);
                                        $dados = $queryCliente->fetch_assoc();
                                    ?>
                                        <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"]; ?>" />
                                    <?php } ?>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label><strong>Nome : </strong></label>
                                            <input type="text" name="nome" class="nome form-control form-control-user " id="nome" placeholder="Digite o nome do Cliente " value="<?php if (isset($_GET["id_cliente"])) {
                                                                                                                                                                                        echo $dados["nome"];
                                                                                                                                                                                    } ?>" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label><strong> CPF: </strong></label>
                                                <input type="text" name="cpf" class="cpf form-control form-control-user " id="cpf" placeholder="Digite o CPF do Cliente" value="<?php if (isset($_GET["id_cliente"])) {
                                                                                                                                                                                    echo $dados["cpf"];
                                                                                                                                                                                } ?>" required>
                                                <div class="help-block with-errors"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label><strong> Telefone : </strong></label>
                                            <input type="text" name="telefone" class="telefone form-control form-control-user " id="telefone" placeholder="Digite o Telefone do Cliente" value="<?php if (isset($_GET["id_cliente"])) {
                                                                                                                                                                                                    echo $dados["telefone"];
                                                                                                                                                                                                } ?>" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label><strong> Data de nascimento: </strong></label>
                                            <input type="date" min="1980-01-01" max="2020-11-10" name="data_nascimento" class="form-control form-control-user" id="exampleRepeatPassword" value="<?php if (isset($_GET["id_cliente"])) {
                                                                                                                                                                                                        echo $dados["data_nascimento"];
                                                                                                                                                                                                    } ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><strong> E-mail : </strong></label>
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Digite o Email do Cliente" value="<?php if (isset($_GET["id_cliente"])) {
                                                                                                                                                                                            echo $dados["email"];
                                                                                                                                                                                        } ?>" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-9"> <label style="padding: 6px;;"><strong> Ativo :</strong></label></div>

                                                </div class="row">

                                                <div class="col-sm-3"> <input name="ativo" type="checkbox" value="S" class="form-control form-control-user" style="width: 22px;" <?php if (isset($_GET["id_cliente"])) {
                                                                                                                                                                                        if ($dados["ativo"] == "S") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        }
                                                                                                                                                                                    } ?>></div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">

                                            </div class="row">

                                        </div>
                                    </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                        </form>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clientes Cadastrado</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID do cliente</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Data de nascimento</th>
                                            <th>Telefone</th>
                                            <th>Ativo</th>
                                            <th>Ações</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    include "banco.php";

                                    $consultaTabela = "";

                                    $consultaTabela = "SELECT * FROM cliente";

                                    $queryClietes = $conexao->query($consultaTabela);

                                    while ($dados = $queryClietes->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $dados["id_cliente"]; ?></td>
                                            <td><?php echo $dados["nome"]; ?></td>
                                            <td><?php echo $dados["email"]; ?></td>
                                            <td><?php echo $dados["data_nascimento"]; ?></td>
                                            <td><?php echo $dados["telefone"]; ?></td>
                                            <td><?php echo $dados["ativo"]; ?></td>
                                            <td> <a href="cad_cliente.php?id_cliente=<?php echo $dados["id_cliente"]; ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                &nbsp;&nbsp;



                                                <a href="crud_cliente.php?excluir=1&id_cliente=<?php echo $dados["id_cliente"]; ?>" class="btn btn-danger btn-excluir-cliente"><i class="fas fa-times"></i></a></td>

                                        </tr>
                                    <?php  } ?>
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
    <script>
        jQuery(document).ready(function() {
            $('.nome').mask('A', {
                translation: {
                    A: {
                        pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/g,
                        recursive: true
                    },
                },
            });
            $('.cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('.telefone').mask("(00)00000-0000")
        })
    </script>
</body>

</html>