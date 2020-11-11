<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>High Hill - Cadastro colaborador</title>


    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
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
                            <a class="nav-link dropdown-toggle"  id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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


                    <div class="container-fluid">
                        <?php if (isset($_GET["sucesso"])) { ?>

                            <div class="alert alert-success">
                                <?php

                                if ($_GET["sucesso"] == 1) {
                                    echo "Colaborador inserido com sucesso!";
                                } else if ($_GET["sucesso"] == 2) {
                                    echo "Colaborador atualizado com sucesso!";
                                } else {
                                    echo "Colaborador excluído com sucesso!";
                                }
                                ?>
                            </div>

                        <?php } ?>

                        <?php if (isset($_GET["erro"])) { ?>
                            <div class="alert alert-danger">
                                <?php
                                if ($_GET["erro"] == 1) {
                                    echo "Erro ao inserir Colaborador!";
                                } else if ($_GET["erro"] == 2) {
                                    echo "Erro ao atualizar Colaborador!";
                                } else {
                                    echo "Erro ao excluir Colaborador !";
                                }
                                ?>
                            </div>
                        <?php } ?>


                        <div class="row">
                            <div class="col-12">
                                <div class="container">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registro Colaborador</h1>
                                    </div>
                                    <form class="user" action="crud_colaborador.php" method="post" data-toggle="validator" role="form">
                                        <?php
                                        $dados;
                                        if (isset($_GET["id_barbeiro"])) {
                                            #include "banco.php";
                                            $queryColaborador = $conexao->query("SELECT * FROM barbeiro WHERE id_barbeiro = " . $_GET["id_barbeiro"]);
                                            $dados = $queryColaborador->fetch_assoc();
                                        ?>
                                            <input type="hidden" name="id_barbeiro" value="<?php echo $_GET["id_barbeiro"]; ?>" />
                                        <?php } ?>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label><strong>Nome : </strong></label>
                                                <input type="text" name="nome" class="form-control form-control-user nome " id="exampleFirstName" placeholder="Digite o nome do Colaborador" value="<?php if (isset($_GET["id_barbeiro"])) {
                                                                                                                                                                                                        echo $dados["nome"];
                                                                                                                                                                                                    } ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><strong> RG: </strong></label>

                                                <input type="text" name="rg" class="form-control form-control-user rg" id="exampleLastName" placeholder="Digite o RG do Colaborador" value="<?php if (isset($_GET["id_barbeiro"])) {
                                                                                                                                                                                                echo $dados["rg"];
                                                                                                                                                                                            } ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label><strong> CPF: </strong></label>
                                                <input type="text" name="cpf" class="form-control form-control-user cpf" id="exampleInputPassword" placeholder="Digite o CPF do Colaborador" value="<?php if (isset($_GET["id_barbeiro"])) {
                                                                                                                                                                                                    echo $dados["cpf"];
                                                                                                                                                                                                } ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><strong> Data de nascimento: </strong></label>
                                                <input type="date" name="data_nascimento" class="form-control form-control-user" id="exampleRepeatPassword" value="<?php if (isset($_GET["id_barbeiro"])) {
                                                                                                                                                                        echo $dados["data_nascimento"];
                                                                                                                                                                    } ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label><strong> Telefone: </strong></label>
                                                <input type="text" name="telefone" class="form-control form-control-user telefone" id="exampleInputPassword" placeholder="Digite o CPF do Colaborador" value="<?php if (isset($_GET["id_barbeiro"])) {
                                                                                                                                                                                                    echo $dados["telefone"];
                                                                                                                                                                                                } ?>" required>
                                            </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label><strong> Salário: </strong></label>
                                                <input type="text" name="salario" class="form-control form-control-user money2" id="exampleInputPassword" placeholder="Digite o Salário Colaborador" value="<?php if (isset($_GET["id_barbeiro"])) {
                                                                                                                                                                                                            echo $dados["salario"];
                                                                                                                                                                                                        } ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><strong>Data de contratação: </strong></label>
                                                <input type="date" name="data_contrato" class="form-control form-control-user" id="exampleRepeatPassword" value="<?php if (isset($_GET["id_barbeiro"])) {
                                                                                                                                                                        echo $dados["data_contrato"];
                                                                                                                                                                    } ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong> E-mail: </strong></label>
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" value="<?php if (isset($_GET["id_barbeiro"])) {
                                                                                                                                                                                    echo $dados["email"];
                                                                                                                                                                                } ?>" required>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label><strong> Senha :</strong></label>
                                                <input type="password" name="senha" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" value="<?php if (isset($_GET["id_barbeiro"])) {
                                                                                                                                                                                        echo $dados["senha"];
                                                                                                                                                                                    } ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-9"> <label style="padding: 6px;;"><strong> Ativo :</strong></label></div>

                                                </div class="row">

                                                <div class="col-sm-3"> <input name="ativo" type="checkbox" value="S"  class="form-control form-control-user" style="width: 22px;" placeholder=""></div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                            </form>

                            <div class="card shadow mb-4 " style="margin-top: 30px; padding: 30px; margin-left:30px;  margin-right:30px;">

                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Barbeiros Cadastrado</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">Cód colab</th>
                                                    <th>Nome</th>
                                                    <th>E-mail</th>
                                                    <th>Data de nascimento</th>
                                                    <th>Telefone </th>
                                                    <th>data de contratação </th>
                                                    <th>Ativo</th>
                                                    <th>Ações</th>

                                                </tr>
                                            </thead>
                                            <?php
                                            # include "banco.php";

                                            $consultaTabela = "";

                                            $consultaTabela = "SELECT * FROM barbeiro";

                                            $queryColaborador = $conexao->query($consultaTabela);

                                            while ($dados = $queryColaborador->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $dados["id_barbeiro"]; ?></td>
                                                    <td><?php echo $dados["nome"]; ?></td>
                                                    <td><?php echo $dados["email"]; ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($dados["data_nascimento"])); ?></td>
                                                    <td><?php echo $dados["telefone"]; ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($dados["data_contrato"])); ?></td>
                                                    <td><?php echo $dados["ativo"]; ?></td>
                                                    <td> <a href="cad_colaborador.php?id_barbeiro=<?php echo $dados["id_barbeiro"]; ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                        &nbsp;&nbsp;
                                                        <a href="crud_colaborador.php?excluir=1&id_barbeiro=<?php echo $dados["id_barbeiro"]; ?>" class="btn btn-danger btn-excluir-barbeiro"><i class="fas fa-times"></i></a></td>
                                                </tr>
                                            <?php  } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
    </div>



    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/jquery.mask.js"></script>

    <script>
     jQuery(document).ready(function() {
        $('.nome').mask('A', {
  translation: {
    A: { pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/g, recursive: true },
  },
});
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.money2').mask("00000", {reverse: true});
        $('.telefone').mask("(00)00000-0000")
        $('.rg').mask("00.000.000-0")
    })
    </script>
</body>

</html>