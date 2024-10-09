<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../css/style.css'>
    <title>Tela de Login</title>
</head>
<body>
    <form name="login" method="post" action="../php/cadastro.php">
        Nome do usuario:<input class="userName" type="text" name="nome">
        <br><br>
        Email:<input class="email" type="text" name="email">
        <br><br>
        Senha:<input class="senha" type="text" name="senha">
        <br><br>
        Confirmar senha:<input class="confirmSenha" type="text" name="confirmSenha">
        <br><br>
        </div>
        <div class="bota"><input class="botao" type="submit" name="cadastro" value="Criar conta"></div>
    </form>
    
</body>

</html>

<?php
$conexao=mysqli_connect("localhost","root","","casadaasia");
if(isset($_POST["cadastro"])){ 
   
$usuario=$_POST["nome"];   
$email=$_POST["email"];   
$senha=$_POST["senha"];
$confirmSenha=$_POST["confirmSenha"];
  
   if($senha==$confirmSenha){

    $sql = "INSERT INTO cliente (idcliente,nome, email, senha) VALUES ('','$usuario', '$email', '$senha')";

    $resultado = mysqli_query($conexao,$sql);
    if ($resultado){ 
        
        echo "registro cadastro";
    
    }else {
        
        echo "registro não cadastro";
    
    }

   }    
}
?>