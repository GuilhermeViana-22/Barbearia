<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>High Hill - agendamento</title>


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
                                <?php if (isset($_GET["sucesso"])) { ?>

                                    <div class="alert alert-success">
                                        <?php

                                        if ($_GET["sucesso"] == 1) {
                                            echo "Cliente inserido com sucesso!";
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
                                            echo "Erro ao agendar!";
                                        } else if ($_GET["erro"] == 2) {
                                            echo "Erro ao atualizar agendamento!";
                                        } else {
                                            echo "Erro ao excluir agendamento   !";
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Agendamento de Serviços</h1>
                                </div>
                                <form class="user" action="crud_agendamento.php" method="post" data-toggle="validator" role="form">
                                    <?php
                                    $dados;
                                    if (isset($_GET["cod_servico"])) {

                                        $queryCliente = $conexao->query("SELECT * FROM agendamento WHERE cod_servico = " . $_GET["cod_servico"]);
                                        $dados = $queryCliente->fetch_assoc();
                                    ?>
                                        <input type="hidden" name="cod_servico" value="<?php echo $_GET["cod_servico"]; ?>" />
                                    <?php } ?>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label><strong>Nome : </strong></label>
                                            <input type="text" name="nome_cliente" class="form-control form-control-user nome" id="exampleFirstName" placeholder="Digite o nome do cliente" value="<?php if (isset($_GET["cod_servico"])) {
                                                                                                                                                                                                    echo $dados["nome_cliente"];
                                                                                                                                                                                                } ?>" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label><strong> Telefone: </strong></label>

                                            <input type="text" name="telefone" class="form-control form-control-user telefone" id="exampleLastName" placeholder="Digite o telefone do cliente" value="<?php if (isset($_GET["cod_servico"])) {
                                                                                                                                                                                                    echo $dados["telefone"];
                                                                                                                                                                                                } ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label><strong> Data desejada :</strong></label>
                                            <input type="date" name="data_agendamento" class="form-control form-control-user" id="exampleRepeatPassword" value="<?php if (isset($_GET["cod_servico"])) {
                                                                                                                                                                    echo $dados["data_agendamento"];
                                                                                                                                                                } ?>">
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
                                                <select class="form-control form-control" aria-placeholder="Selecione" name="horario">
                                                    <?php

                                                    if (isset($_GET["cod_servico"])) {
                                                        $resultadoVerificaHorario = $conexao->query("SELECT * FROM agendamento WHERE cod_servico = " . $_GET["cod_servico"]);
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
                                        <?php

                                        $servicos = array(
                                            "Corte de cabelo" => "Corte de cabelo",
                                            "Barba" => "Barba",
                                            "Corte na navalha" => "Corte na navalha",
                                            "Pintura" => "Pintura",
                                            "Corte e Barba" => "Corte e Barba",
                                            "Sobracelha" => "Sobracelha",

                                        );
                                        ?>
                                        <label for="inputLastName">Selecione um Serviço:</label>
                                        <select class="form-control form-control" aria-placeholder="Selecione" name="tipo_atendimento">


                                            <?php

                                            if (isset($_GET["cod_servico"])) {
                                                $resultadoVerificaHorario = $conexao->query("SELECT * FROM agendamento WHERE cod_servico = " . $_GET["cod_servico"]);
                                                $dadosverificaHorario = $resultadoVerificaHorario->fetch_assoc();
                                                foreach ($servicos as $key => $value) {
                                                    if ($dadosverificaHorario["horario"] == $key) {
                                                        echo "<option value=" . $key . " selected>" . $value . "</option>";
                                                    } else {
                                                        echo "<option value=" . $key . ">" . $value . "</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($servicos as $key => $value) {
                                                    echo "<option value=" . $key . ">" . $value . "</option>";
                                                }
                                            }
                                            ?>




                                        </select>

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
                                            <th>ID do Servico</th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>Horario</th>
                                            <th>Data de agendamento</th>
                                            <th>Serviço</th>
                                            <th>Ações</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    # include "banco.php";

                                    $consultaTabela = "";

                                    $consultaTabela = "SELECT * FROM agendamento";

                                    $queryClietes = $conexao->query($consultaTabela);

                                    while ($dados = $queryClietes->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $dados["cod_servico"]; ?></td>
                                            <td><?php echo $dados["nome_cliente"]; ?></td>
                                            <td><?php echo $dados["telefone"]; ?></td>
                                            <td><?php echo $dados["horario"]; ?></td>
                                            <td><?php echo $dados["data_agendamento"]; ?></td>
                                            <td><?php echo $dados["Tipo_atendimento"]; ?></td>

                                            <td> <a href="agendamento.php?cod_servico=<?php echo $dados["cod_servico"]; ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                &nbsp;&nbsp;



                                                <a href="crud_agendamento.php?excluir=1&cod_servico=<?php echo $dados["cod_servico"]; ?>" class="btn btn-danger btn-excluir-cliente"><i class="fas fa-times"></i></a></td>

                                        </tr>
                                    <?php  } ?>

                                    </tbody>
                                </table>
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
                    A: {
                        pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/g,
                        recursive: true
                    },
                },
            });
            
            
            $('.telefone').mask("(00)00000-0000")
         
        })
    </script>
</body>

</html>