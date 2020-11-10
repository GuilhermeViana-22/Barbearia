<?php
include "banco.php";
# verifica se o campo ativo possui algum valor , senão ele atribui o N e salva no banco
if(isset($_REQUEST["ativo"])) {
    $ativo = $_REQUEST["ativo"];
}  else {
    $ativo = "N";
}
if(isset($_REQUEST["id_barbeiro"])) {
    if(isset($_REQUEST["excluir"])) {
          
        $consulta = " DELETE FROM barbeiro WHERE id_barbeiro = ".$_REQUEST["id_barbeiro"];
        # a variavel operacao está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 3;
    } else {
        $consulta = "UPDATE barbeiro SET nome = '".$_REQUEST["nome"]."', rg = '".$_REQUEST["rg"]."', cpf = '".$_REQUEST["cpf"]."', data_nascimento = '".$_REQUEST["data_nascimento"]."', email = '".$_REQUEST["email"]."', salario = '".$_REQUEST["salario"]."', data_contrato = '".$_REQUEST["data_contrato"]."', senha = '".$_REQUEST["senha"]."', ativo = '".$_REQUEST["ativo"]."' WHERE id_barbeiro = '".$_REQUEST["id_barbeiro"]."'";
                # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
                # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 2;
    }
} else {
    $consulta = "INSERT INTO barbeiro (nome,cpf,rg,data_nascimento,email,salario,data_contrato,ativo,senha) VALUES ('".$_REQUEST["nome"]."','".$_REQUEST["cpf"]."','".$_REQUEST["rg"]."','".$_REQUEST["data_nascimento"]."','".$_REQUEST["email"]."','".$_REQUEST["salario"]."','".$_REQUEST["data_contrato"]."','".$_REQUEST["ativo"]."','".$_REQUEST["senha"]."')";
            # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
            # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
    $operacao = 1;
}
#var_dump($consulta);
$query = $conexao->query($consulta);

#verifica se houve algum erro  do crud e concatena com a variavel local operação
if(!$query) {
   header("Location: cad_colaborador.php?erro=" . $operacao);
} else {
   header("Location: cad_colaborador.php?sucesso=" . $operacao);
}