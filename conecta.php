<?php // Script de Conexão ao Servidor Banco de Dados

// Parâmetros 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "crud_escola_estadual_gabriel_luna";


try{
// Criando a conexão com o MySQL (API/Driver de Conexão)
$conexao = new PDO("mysql:host=$servidor; dbname=$banco; charset=utf8",
    $usuario, $senha);

// Habilita a verificação de erros 
$conexao -> setAttribute(
    PDO::ATTR_ERRMODE, //Constante de erros em geral
    PDO::ERRMODE_EXCEPTION //Constante de exceções de erro
);
} catch (Exception $erro){
    die ("Erro: " .$erro -> getMessage());
}
// var_dump($conexao); 

?>