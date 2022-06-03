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
<link rel="stylesheet" href="style.css">
<link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid btn btn-light">
    <h1>Lista de alunos</h1>
    <hr>
    
    <p><a class="btn btn-dark" href="inserir.php">Inserir novo aluno</a></p>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso') { ?>
            <p>Fabricante atualizado com sucesso!</p>
        <?php } ?>

        <!-- <caption>Lista de Alunos</caption> -->

        <table class="table">
            <caption>Lista de Alunos</caption>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Primeira nota</th>
                    <th scope="col">Segunda nota</th>
                    <th scope="col">Média</th>
                    <th scope="col">Situação</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    foreach ($listaAlunos as $aluno) {
    ?>

                    <tr class="<?= $aluno['situacao'] ?>">
                        <td><?= $aluno['id'] ?></td>
                        <td><?= $aluno['nome'] ?></td>
                        <td><?= $aluno['primeira'] ?></td>
                        <td><?= $aluno['segunda'] ?></td>
                        <td><?= $aluno['media'] ?></td>
                        <td><?= $aluno['situacao'] ?></td>
                        <td><a class="btn btn-primary" href="atualizar.php?id=<?= $aluno['id'] ?>&aluno<?= $aluno['nome'] ?>">Atualizar</a></td>
                        <td><a class="excluir btn btn-danger" href="excluir.php?id=<?= $aluno['id'] ?>&aluno<?= $aluno['nome'] ?>">Excluir</a></td>
                    </tr>
                <?php
                }
                ?>



            </tbody>
        </table>


    <p><a class="btn btn-dark" href="index.php">Voltar ao início</a></p>
</div>
    <script>
        const excluir = document.querySelectorAll('.excluir');
        // console.log(excluir);
        for (let i = 0; i < excluir.length; i++) {
            excluir[i].addEventListener('click', function(event) {
                event.preventDefault();
                let resultado = confirm("Você realmente quer excluir o aluno?");
                if (resultado) location.href = excluir[i].getAttribute('href');

            });
        }
    </script>
</body>

<script src="js/bootstrap.bundle.js"></script>

</html>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.
Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->