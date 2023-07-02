<?php

echo '<pre>';
print_r($_POST);
echo '<pre>';

//Montagem do texto, substuindo o # por -, caso o  usuario acabe utilizando

$tipo = str_replace('#', '-', $_POST['tipo']);

$valor = str_replace('#', '-', $_POST['valor']);

$descricao = str_replace('#', '-', $_POST['descricao']);

$data = str_replace('#','-', $_POST['data']);

//Montando como irar a aparecer as informacoes na tela
$texto = $tipo. '#' . $valor . '#' . $descricao . '#' . $data . PHP_EOL;

//Abrindo o texto
$arquivo = fopen('arquivo.hd', 'a');

//Escrevendo o texto
fwrite($arquivo,$texto);
//Fechando o texto
fclose($arquivo);


header('Location: index.php ');

?>