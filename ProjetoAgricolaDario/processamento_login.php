<?php

require_once 'conexao.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(!empty($email) && !empty($senha)){


        $sql = "SELECT * FROM curriculos WHERE email = '$email'";
        $result = $mysqli->query($sql);
        if($result->num_rows === 1){ 

            $row = $result->fetch_assoc();
            $password = $row['senha'];

            if($senha === $password){
                
                session_start();
                $_SESSION['username'] = $email;
                $_SESSION['logged_in'] = true;

                
                header('location: restrita.php');
                exit();
            } else{

                $error = 'senha inválida';
            
        }
        
    }else{

        $error = 'Email não encontrado';

    }


}else{

    $error = 'Por favor, preencha todos os campos';

}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
</head>
<body>
    <h1>LOGIN INVÁLIDO</h1>    
    <?php if(isset($error)): ?>
        <p>
            <?php
                if($error === 'Senha invalida'){
                    echo '<h2>' . $error . '</h2>';
                } elseif($error === 'Email nao encontrado'){
                    echo '<h2>' . $error . '</h2>';
                }else{
                    echo $error;
                }
            ?>
        </p>
    <?php endif; ?>

    <?php
    //se a variavel error estiver definida, vou redirecionar para a página de login novamente

    if(isset($error)){
        header('Refresh: 3; URL=login.php');//vai abrir o login.php
        echo"<p> Você será redirecionado para a página de login";
        exit();
    }
    ?>

</body>
</html>