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