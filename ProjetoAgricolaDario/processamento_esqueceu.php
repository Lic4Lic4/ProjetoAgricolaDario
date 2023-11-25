<?php

require_once 'conexao.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $email = $_POST['email'];
}

if(!empty($email)){


    $sql = "SELECT * FROM curriculos WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if($result->num_rows > 0){
        $digito6 = random_int(100000,999999);

        $sql = "SELECT * FROM curriculos WHERE email = '$email'";
        $result = $mysqli->query($sql);
        if($mysqli -> query($sql)){

            $msg = "Código enviado";
            $mail = $email;
            $assunto = 'Código de recuperação';
            $message = "
            <html>
            <p>O código para recuração:$digito6<p>            
            ";
        }

            $sender = "From:testesluciano6@gmail.com";
            if(mail($mail,$assunto,$message,$sender)){
                echo"Email enviado";}
            }else{
                echo "Email falhou";
            }

        session_start();
        $_SESSION['recuperaEmail'] = $email;
        $_SESSION['codigoVerificar'] = $digito6;
        header("Location: trocaSenha.php");
        exit();
    }else{
        echo "Email não registrado, você vai ser redirecionado para a pagina de registro";
        header("Location: registrar.php");

    }


?>