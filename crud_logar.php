<?php
include 'banco.php';

    $email_barbeiro = $_REQUEST["email"];
    $senha_barbeiro = $_REQUEST["senha"];
    $query = $conexao->query("SELECT * FROM barbeiro WHERE email = '" . $email_barbeiro . "' AND senha = '" . $senha_barbeiro . "'");
    
    if($query->num_rows > 0) {
        
        $_SESSION["email"] = $email_barbeiro;
        while($dados = $query->fetch_assoc()) {
            $_SESSION["nome"] = $dados["nome"];
            $_SESSION["id_barbeiro"] = $dados["id_barbeiro"];
        }
    
        header("Location: index.php");
    
    } else {
    
        header("Location: login.php?erro=1");
    
    }