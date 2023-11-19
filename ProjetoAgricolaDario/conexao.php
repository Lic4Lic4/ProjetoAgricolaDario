<?php
    $host = 'localhost'; //ou o endereço do servidor de banco de dados
    $username = 'root';
    $password = '';
    $database = 'agricoladario';

    //estebelecer a conexão com o banco de dados

    $mysqli = new mysqli($host, $username, $password, $database);

    //verificar se houve a conexão
    if($mysqli->connect_errno){
        echo "Falha na conexão: (". $mysqli ->connect_errno.")" .$mysqli->connect_error;
    }

    ?>