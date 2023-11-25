<?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        //recuperar dados do formulario
        $email = $_POST["email"];
        $senha = $_POST["senha"];

            require_once "conexao.php";

            //verificar se o email já está cadastrado
            $sql = "SELECT * FROM curriculos WHERE email = '$email'";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
                //usuário já está cadastrado
                header("Location: esqueci a senha.php");
                exit();
            }

            // se o email não está cadastrado, preciso cadastrar
            $sql = "insert into curriculos (email,senha) values('$email','$senha')";
            if($mysqli->query($sql) === true){
                //Registro realizado com sucesso
                echo "Registro realizado com sucesso";
                header('Refresh: 1.5; URL=login.php');
                echo "<p> Você será redirecionado para a página de login";
            } else{
                //ocorreu um erro
                echo "Erro ao cadastrar" . $mysqli->error;
            }
            //Fechar a conexão com o banco de dados
            $mysqli->close();
        }else{
            //se o formulário não foi enviado
            header("Location: registrar.php");
            exit();
        }

?>