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