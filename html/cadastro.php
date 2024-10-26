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
     <script>
        function calcularIdade() {
            const nascimento = document.getElementById('nascimento').value;
            const idadeField = document.getElementById('idade');

            if (nascimento) {
                const nascimentoDate = new Date(nascimento);
                const hoje = new Date();

                // Verifica se a data de nascimento está no futuro
                if (nascimentoDate > hoje) {
                    document.getElementById('nascimento').value = '';
                    idadeField.value = '';
                    alert("A data de nascimento não pode ser no futuro.");
                    return;
                }

                let idade = hoje.getFullYear() - nascimentoDate.getFullYear();

                // Ajusta a idade se o aniversário ainda não tiver ocorrido este ano
                if (
                    hoje.getMonth() < nascimentoDate.getMonth() ||
                    (hoje.getMonth() === nascimentoDate.getMonth() && hoje.getDate() < nascimentoDate.getDate())
                ) {
                    idade--;
                }

                idadeField.value = idade;
            }
        }

        function validarCPF() {
            const cpf = document.getElementById('cpf').value.replace(/\D/g, '');
            const mensagem = document.getElementById('mensagem');
            if (cpf.length !== 11 || !validarCPFFormatado(cpf)) {
                mensagem.innerText = 'CPF inválido.';
                document.getElementById('cpf').value = '';
            } else {
                mensagem.innerText = '';
            }
        }

        function validarCPFFormatado(cpf) {
            let soma = 0;
            let resto;

            // Verifica se todos os dígitos são iguais
            if (/^(\d)\1{10}$/.test(cpf)) return false;

            // Cálculo do primeiro dígito verificador
            for (let i = 1; i <= 9; i++) {
                soma += parseInt(cpf.charAt(i - 1)) * (11 - i);
            }
            resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.charAt(9))) return false;

            // Cálculo do segundo dígito verificador
            soma = 0;
            for (let i = 1; i <= 10; i++) {
                soma += parseInt(cpf.charAt(i - 1)) * (12 - i);
            }
            resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.charAt(10))) return false;

            return true; // CPF válido
        }

        function validarFormulario() {
            const senha = document.getElementById('senha').value;
            const confirmaSenha = document.getElementById('confirmaSenha').value;
            const mensagem = document.getElementById('mensagem');

            if (senha !== confirmaSenha) {
                mensagem.innerText = 'As senhas não coincidem.';
                return false;
            }

            mensagem.innerText = '';
            return true; // O formulário pode ser enviado
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

    <a class="inicio" href="../html/index.html"><img src="../img/panda.png" class="menu__panda"></a>

    <input type="text" class="menu__caixaText">

    <a class="perfil" href="../html/perfil.html"> <img src="../img/perfil.png" class="menu__perfil"> </a>



    <a class="carrinho" href="../html/finallizepedido.html"><img src="../img/carrinho.png"
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
<form id="formulario" onsubmit="return validarFormulario()">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" required><br>
    
            <label for="nascimento">Data de Nascimento:</label>
            <input type="date" id="nascimento" required onchange="calcularIdade()" min="1900-01-01"><br>
    
            <label for="idade">Idade:</label>
            <input type="text" id="idade" disabled><br>
    
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" required maxlength="14" onblur="validarCPF()"><br>
    
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" required><br>
    
            <label for="senha">Senha:</label>
            <input type="password" id="senha" required><br>
    
            <label for="confirmaSenha">Confirmação de Senha:</label>
            <input type="password" id="confirmaSenha" required><br>
    
            <button type="submit">Enviar</button>
        </form>
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