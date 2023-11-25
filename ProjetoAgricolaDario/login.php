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
        
    
        <form action="processamento_login.php" method="POST">
    
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email">
                
                <label for="email">Senha</label>
                <input type="password" id="senha" name="senha">

                <a href="esqueceusenha.php">Esqueceu a senha</a>
            
                <div class="botoes">    
                
                    <button type="submit" name="acao" id="Enviar">Enviar</button>
                    <button type="reset"  id="Limpar">Limpar</button>
                    <button class="bregistrar"><a class="registrar" href="registrar.php">Registrar</a></button>

                </div>
                
            </form>
            
        </div>
    </div>
</body>
</html>