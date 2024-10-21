<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>
        Casa da Asia
    </title>
    <script>
        function clicar() {
            const hamburger = document.getElementById('hamburger');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            hamburger.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            });
        }
    </script>
</head>

<body>

   
<header>


    <div class="menu__intensDeCima">
    
        <div class="navbar" onclick="clicar()">
            <div class="hamburger" id="hamburger">
                <img src="../img/menu.png">
            </div>
        </div>
    
        <div class="sidebar" id="sidebar">
            <ul>
                <li><a href="../html/alimentos.html">Alimentos</a></li>
                <li><a href="../html/bebidas.html">Bebidas</a></li>
                <li><a href="../html/utencilios.html">Utensilhos</a></li>
                <li><a href="../html/receitas.html">Receitas</a></li>
            </ul>
        </div>
    
        <div class="overlay" id="overlay"></div>
    
        <a class="inicio" href="../html/index.php"><img src="../img/panda.png" class="menu__panda"></a>
    
        <input type="text" class="menu__caixaText">
    
        <a class="perfil" href="../html/perfil.html"> <img src="../img/perfil.png" class="menu__perfil"> </a>
    
    
    
        <a class="carrinho" href="../html/finallizepedido.php"><img src="../img/carrinho.png"
                class="menu__carrinho"></a>
    
    
    </div>
    <div class="sites">
        <a class="links" href="../html/alimentos.html">Alimentos</a>
        <a class="links" href="../html/bebidas.html">Bebidas</a>
        <a class="links" href="../html/utencilios.html">Utensilios</a>
        <a class="links" href="../html/receitas.html">Receitas</a>
        <input type="text" class="menu__caixaText_cell">
    </div>
    
    
    
    </header>
    
    <main>

   
        
        
    </main>

    <footer>
    <img src="../img/panda.png" alt="Logo do Panda">
    <h4>Integrantes:</h4>
    <div class="footer-content">
        
        <p>Edgar</p>
        <p>Guilherme</p>
        <p>Henryque</p>
        <p>Isabela</p>
    </div>
    </footer>


</body>
</html>
<?php
session_start();
?>



<?php

$conexao=mysqli_connect("localhost","root","","casadaasia");
$sql = "SELECT idproduto, titulo, imagem, preco, descricao FROM produto WHERE status = 'true'"; 


$resultado = mysqli_query($conexao, $sql);


if ($resultado) {
   
    while ($produto = mysqli_fetch_assoc($resultado)) {
        
        echo "<div class='conteudo'>";
        echo "<form method='POST'>"; 
        echo "<div class='container'>";
        echo "<div class=''>Imagem: <img src='" . $produto['imagem'] . "' alt='" . $produto['titulo'] . "'></div>";
        echo "<div class=''>Título: " . $produto['titulo'] . "</div>";
        echo "<div class=''>Preço: " . $produto['preco'] . "</div>";
        echo "<div class=''>Descrição: " . $produto['descricao'] . "</div>";
        
      
        echo "<input type='hidden' name='idproduto' value='" . $produto['idproduto'] . "'>";

     
        echo "<input type='submit' name='menos' value='-'><br><br>";

        echo "</form>"; 
        echo "</div>";
    }
} else {
    echo "Nenhum produto encontrado no carrinho.";
}
if (isset($_POST['menos'])) {
    $idproduto = $_POST['idproduto']; 

    
    $sql2 = "UPDATE produto SET status = 'false' WHERE idproduto = $idproduto";

    
    $resultado2 = mysqli_query($conexao, $sql2);

   
    if ($resultado2) {
        echo "Status do produto alterado com sucesso.";
    } else {
        echo "Erro ao alterar o status do produto: " . mysqli_error($conexao);
    }
}



mysqli_close($conexao);

?>