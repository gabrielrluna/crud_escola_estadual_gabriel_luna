<?php
require_once "funcoes.php";
$id = $_GET['id'];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$aluno = lerUmAluno($conexao, $id);
// var_dump($aluno);


if(isset($_POST['atualizar-dados'])){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $primeira = filter_input(INPUT_POST, 'primeira', FILTER_SANITIZE_NUMBER_FLOAT);
    $segunda = filter_input(INPUT_POST, 'segunda', FILTER_SANITIZE_NUMBER_FLOAT);
    
    $media = ($primeira + $segunda)/2;

    if ($media >= 7){
        $situacao = "Aprovado";

    } else {
        $situacao = "Reprovado";
    }


    atualizarAluno($conexao, $id, $nome, $primeira, $segunda, $media, $situacao);

    echo "<p>Aluno atualizado com sucesso!</p>";
    
    // COm nome de parâmetro e valor 
    header("location:visualizar.php?status=sucesso");
    
    // header("Refresh:3; url=listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body >
<div class="container-fluid btn btn-dark ">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>
    <form action="#" method="post">
        
	    <p><label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome" required></p>
        
        <p><label for="primeira">Primeira nota:</label>
	    <input name="primeira" type="number" id="primeira" step="0.1" min="0.0" max="10" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input name="segunda" type="number" id="segunda" step="0.1" min="0.0" max="10" required></p>
        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media">Média:</label>
            <input value="<?= $aluno ['media'] ?>" name="media" type="number" id="media" step="0.1" min="0.0" max="10" readonly disabled>
        </p>
        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input value="<?= $aluno ['situacao'] ?>"type="text" name="situacao" id="situacao" readonly disabled>
        </p>
	    
        <button class="btn btn-success" name="atualizar-dados">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a class="btn btn-primary" href="visualizar.php">Voltar à lista de alunos</a></p>
    
    <script src="js/bootstrap.bundle.js"></script>

</div>
</body>
</html>