
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=../css/login.css>
    <title>Tela de Login</title>
</head>
<body>
    
    <form name="login" method="post" action="../php/login.php">
    Email:<input class="email" type="text" name="email">
    Senha:<input class="senha" type="text" name="senha">
    </div>

    <div class="bota"><input class="botao" type="submit" name="login" value="Entrar" ></div> 
    
    
    </form>

    <div> </div>
</body>
</html>

<?php
$conexao=mysqli_connect("localhost","root","","casadaasia");
if(isset($_POST["login"])){      
$email=$_POST["email"];   
   $senha=$_POST["senha"];
   $sql="SELECT * FROM `cliente` WHERE email='$email' and  senha='$senha'";
    $resultado = mysqli_query($conexao,$sql);
    while($linha=mysqli_fetch_array($resultado)){
        if ($linha){ echo "email registrado";
        echo "<br>";}
                else {echo "Email não encontrado";}      
    };
}
?>
