<?php
$conexao = mysqli_connect("localhost", "root", "", "casadaasia");

if (isset($_POST["login"])) {    
    
    $sql = "SELECT preco, idproduto, titulo, descricao,imagem FROM produto"; 
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "ID do Produto: " . $row['idproduto'] . "<br>";
            echo "Preço: " . $row['preco'] . "<br>"; 
            echo "Título: " . $row['titulo'] . "<br>";
            echo "Descrição: " . $row['descricao'] . "<br><br>";
            echo "<img src='" . $row['imagem'] . "'>";
        }}else {
        echo "Erro na consulta: " . mysqli_error($conexao); 
    }
}
?>
