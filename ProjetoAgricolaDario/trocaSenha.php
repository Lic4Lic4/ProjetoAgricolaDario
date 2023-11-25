<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloTrabalheConosco.css">
    <title>Trabalhe conosco</title>
</head>
<body>
    <div class="conteiner">
        <div class="nav">
            <img class="fotoLogo" src="fotoLogo.png" alt="Logotipo">
            <h1 class="nome">Dario</h1>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="servicos.html">Serviços</a></li>
                <li><a href="login.php">Trabalhe<br>Conosco</a></li>
                <li><a href="intitucional.html">Institucional</a></li>
            </ul>
        </div>
        <div class="conteiner2">
        
    
        <form action="" method="POST">

                <label for="email">Código</label>
                <input type="number" id="codigo" name="codigo">
                
                <label for="email">Nova senha</label>
                <input type="password" id="novasenha" name="novasenha">

            
                <div class="botoes">    
                
                    <button type="submit" name="acao" id="Enviar">Enviar</button>
                    <button type="reset"  id="Limpar">Limpar</button>

                <?php

                require_once 'conexao.php';
                
                if($_SERVER["REQUEST_METHOD"] === "POST"){
                    
                    session_start();
                    $email = $_SESSION['recuperaEmail'];
                    $codigoVerificar = $_SESSION['codigoVerificar'];



                    $codigo = $_POST['codigo'];
                    $novaSenha = $_POST['novasenha'];

                }

        if(!empty($codigo) && !empty($novaSenha)){


            $sql = "SELECT * FROM curriculos WHERE email = '$email'";
            $result = $mysqli->query($sql);
            if($result->num_rows === 1){ 

                if($codigoVerificar == $codigo){

                    $sql = "UPDATE curriculos SET senha = '$novaSenha' WHERE email = '$email'";
                    $mysqli->query($sql);
                    echo "Senha atualiza, você sera redirecionado a página de login";
                    header("Location: login.php");
                    exit();

                }else{

                    echo "O código está diferente";

                }
            }



        }



?>

                </div>
                
            </form>
            
        </div>
    </div>
</body>
</html>

