<?php
include "banco.php";
# verifica se o campo ativo possui algum valor , senão ele atribui o N e salva no banco
if(isset($_REQUEST["ativo"])) {
    $ativo = $_REQUEST["ativo"];
}  else {
    $ativo = "N";
}
if(isset($_REQUEST["id_cliente"])) {
    if(isset($_REQUEST["excluir"])) {
          
        $consulta = "DELETE FROM cliente WHERE id_cliente = " . $_REQUEST["id_cliente"];
        # a variavel operacao está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 3;
    } else {
        $consulta = "UPDATE cliente SET nome = '".$_REQUEST["nome"]."',data_nascimento = '".$_REQUEST["data_nascimento"]."', cpf = '".$_REQUEST["cpf"]."', email = '".$_REQUEST["email"]."', telefone = '".$_REQUEST["telefone"]."', ativo = '".$_REQUEST["ativo"]."' WHERE id_cliente = ".$_REQUEST["id_cliente"]."";
                # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
                # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 2;
    }
} else {
    $consulta = "INSERT INTO cliente (nome,cpf,data_nascimento,email,telefone,ativo) VALUES ('".$_REQUEST["nome"]."','".$_REQUEST["cpf"]."','".$_REQUEST["data_nascimento"]."','".$_REQUEST["email"]."','".$_REQUEST["telefone"]."','".$ativo."')";
            # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
            # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
    $operacao = 1;
    
}
var_dump($consulta);
$query = $conexao->query($consulta);



#verifica se houve algum erro  do crud e concatena com a variavel local operação
if(!$query) {
    header("Location: cad_cliente.php?erro=" . $operacao); 
   
} else {
    header("Location: cad_cliente.php?sucesso=" . $operacao);
    

    
}

?>