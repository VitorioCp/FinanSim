<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $indice = $_POST['indice'];

    // Lê todos os registros do arquivo
    $arquivo = file('arquivo.hd');

    // Remove o registro específico com base no índice
    if (isset($arquivo[$indice])) {
        unset($arquivo[$indice]);
    }

    // Reescreve o arquivo sem o registro excluído
    file_put_contents('arquivo.hd', implode('', $arquivo));

    // Retorna uma resposta de sucesso
    echo 'success';
}
?>
