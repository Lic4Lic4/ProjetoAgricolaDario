<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloTrabalheConosco.css">
    <title>Trabalhe conosco</title>
</head>
<body>
    <div class="conteudo">
        <div class="menu">
            <img class="fotoLogo" src="fotoLogo.png" alt="Logotipo">
            <h1 class="marca">Dario</h1>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="servicos.html">Serviços</a></li>
                <li><a href="trabalheConosco.php">Trabalhe<br>Conosco</a></li>
                <li><a href="intitucional.html">Institucional</a></li>
            </ul>
        </div>
        <div class="conteiner">
        
    
        <form enctype="multipart/form-data" action="" method="post">
    
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
    
                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome" name="sobrenome" required>
    
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
    
                <label for="telefone">Telefone</label>
                <input type="number" id="telefone" name="telefone" required>
            
                <div class="botoes">

                <label type="curriculo"for="curriculo">Selecionar Currículo</label>
                <input type="file" id="curriculo" name="curriculo" required>
    
                
                    <button type="submit" name="acao" id="Enviar">Enviar</button>
                    <button type="reset"  id="Limpar">Limpar</button>

                    <?php

    include("conexao.php");

    $msg = false;

    if(isset($_FILES['curriculo'])){
        $arquivo = $_FILES['curriculo'];
        if($arquivo['size']>2097152){
            die("Arquivo muito grande!! MAX:2MB");
        }
        $extensao = strtolower(substr($_FILES['curriculo']['name'], -4));
        if($extensao != ".pdf"){
            die("Tipo de arquivo não aceito. Apenas arquivos PDF");            
        }

        $novo_nome = md5(time()).$extensao;
        $diretorio = "arquivos/";
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];


        move_uploaded_file($_FILES['curriculo']['tmp_name'], $diretorio.$novo_nome);

        $sql_code = "INSERT INTO curriculos(id, nome, sobrenome, email, telefone, arquivo) VALUES(NULL, '$nome', '$sobrenome', '$email', '$telefone', '$novo_nome')";

        if($mysqli -> query($sql_code)){

            $msg = "Arquivo enviado com sucesso!";
            $mail = "agricolasdario@gmail.com";
            $assunto = 'Curriculos';
            $message = "
            <html>
            <p><b>Nome: <b>$nome<p>
            <p><b>Sobrenome: <b>$sobrenome<p>
            <p><b>Telefone: <b>$telefone<p>
            <p><b>E-mail: <b>$email<p>
            
            ";

            $sender = "From:testesluciano6@gmail.com";
            if(mail($mail,$assunto,$message,$sender)){
                echo"Email enviado";

            }else{
                echo "Email falhou";
            }

        }else{

            $msg = "Falha ao enviar arquivo.";

        }
    }



?>

                <?php if($msg != false) echo "<p> $msg </p?>;"?>
                </div>
                
            </form>

        </div>
    </div>
</body>
</html>

<?php




?>