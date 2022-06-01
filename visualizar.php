<?php

require_once "conecta.php";
require_once "funcoes.php";

$listaAlunos = lerAlunos($conexao);


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    
    <p><a href="inserir.php">Inserir novo aluno</a></p>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso') { ?>
            <p>Fabricante atualizado com sucesso!</p>
        <?php } ?>

        <table>
            <caption>Lista de Alunos</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Primeira nota</th>
                    <th>Segunda nota</th>
                    <th>Média</th>
                    <th>Situação</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    foreach ($listaAlunos as $aluno) {
    ?>

                    <tr>
                        <td><?= $aluno['id'] ?></td>
                        <td><?= $aluno['nome'] ?></td>
                        <td><?= $aluno['primeira'] ?></td>
                        <td><?= $aluno['segunda'] ?></td>
                        <td><?= $aluno['media'] ?></td>
                        <td><?= $aluno['situacao'] ?></td>
                        <td><a href="atualizar.php?id=<?= $aluno['id'] ?>&aluno<?= $aluno['nome'] ?>">Atualizar</a></td>
                        <td><a href="excluir.php?id=<?= $aluno['id'] ?>&aluno<?= $aluno['nome'] ?>">Excluir</a></td>
                    </tr>
                <?php
                }
                ?>



            </tbody>
        </table>


    <p><a href="index.php">Voltar ao início</a></p>
</div>
</body>
</html>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.
Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->