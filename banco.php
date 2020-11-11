<?php
  # $conexao = new PConnect('ec2-54-165-164-38.compute-1.amazonaws.com','grjjfrrijsicop','d465e94f23d0a9c6c33815ef44664a192154a4303b5e12b6c8545be98a1b0c4f','dff7u01usmdcg1');   
    session_start();
    $conexao = pg_connect("host=ec2-54-165-164-38.compute-1.amazonaws.com port=5432 dbname=dff7u01usmdcg1 user=grjjfrrijsicop password=d465e94f23d0a9c6c33815ef44664a192154a4303b5e12b6c8545be98a1b0c4f");
?>