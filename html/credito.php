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
    <form action="../html/credito.php" method="POST">
        Nome do titular do cartão: <input class="userName" type="text" name="nomeDoCartao">
        <br><br>
        Número: <input type="text" name="idDoCartao">
        <br><br>
        Data de vencimento: <input type="date" name="dataDeVencimento">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
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
    

</html>
<?php

$conexao = mysqli_connect("localhost", "root", "", "casadaasia");

if ($conexao) {
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cardName = mysqli_real_escape_string($conexao, $_POST["nomeDoCartao"]);
        $idCard = mysqli_real_escape_string($conexao, $_POST["idDoCartao"]);
        $dtvenci = mysqli_real_escape_string($conexao, $_POST["dataDeVencimento"]);

        
        $sql = "INSERT INTO credito (nomecartao, idcartao, datavencimento) 
                VALUES ('$cardName', '$idCard', '$dtvenci')";

        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            echo "Cartão de crédito registrado com sucesso!";
        } else {
            echo "Erro ao registrar cartão: " . mysqli_error($conexao);
        }
    }
} else {
    echo "Falha na conexão com o banco de dados.";
}
?>