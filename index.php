<?php
//Chamadas
$chamadas = array();
//abrir o arquivo.hd
$arquivo = fopen('arquivo.hd', 'r');

//Enquantoo houver registros (linhas) a serem recuperados
while (!feof($arquivo)) { //testa pelo fim do arquivo
  //linhas
  $registro = fgets($arquivo);
  $chamados[] = $registro;
  '<br>';
}
//Fechar o arquivo aberto
fclose($arquivo);
//...
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <meta name="description" content="Um site para gestao financeira do povo" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>FinanSim</title>
</head>

<body>
<?php
  // Realizando a soma dos valores do id 'valor'
  $arquivo = fopen('arquivo.hd', 'r');
  $somaFaturamento = 0;
  $somaDespesa = 0;

  while (!feof($arquivo)) {
      $linha = fgets($arquivo);
      $valores = explode('#', $linha);
      if (isset($valores[0]) && isset($valores[1])) {
          $tipo = $valores[0];
          $valor = (float) $valores[1];

          if ($tipo === 'Faturamento') {
              $somaFaturamento += $valor;
          } elseif ($tipo === 'Despesa') {
              $somaDespesa += $valor;
          }
      }
  }

  // Fechando o arquivo novamente
  fclose($arquivo);

  // Calculando o resultado total
  $resultadoTotal = $somaFaturamento - $somaDespesa;
  ?>
  <!--Inicio Area de Faturamento e Despesa-->
  <div style="display: flex; justify-content: center; width: 100%">
    <div id="cadastro-valor">
    <div class="btn-sair">
        <button id="sair">
        <p>Sair</p>
        </button>
        </div>
      <div class="cadastro-alinhamento">
      <div>
      
        <form method="post" action="registrar_faturamento_despesa.php" class="faturamentoDespesa">
        
          <fieldset class="grupo">
            <div id="check">
              <label class="h5" for="">Faturamento ou Despesa</label> <br>


              <div class="alinhamento-centro-row">
              <label for="">
                <input type="radio" name="tipo" value="Faturamento" id="tipo" checked required />Faturamento
              </label>

              <label for="">
                <input type="radio" name="tipo" value="Despesa" id="tipo" required />Despesa
              </label>
              </div>

            </div>
          </fieldset>
          <div class="alinhamento-centro">
            <label for="valor">Valor:</label>
            <input id="valor" name="valor" type="text" placeholder="Valor:" required/>
          </div>

          <div class="alinhamento-centro" >
            <label for="descricao">Descrição:</label>
            <input id="descricao" name="descricao" type="text" placeholder="Descrição:" required />
          </div>
          <div  class="alinhamento-centro">
            <label for="data">Data:</label> 
            <input id="data" name="data" type="date" required/>
          </div>
          <div class="alinhamento-centro mt-2"><button class="btn-enviar btn" type="submit">Enviar</button></div>
          
        </form>
      </div>
    </div>
      </div>
      
  </div>
  <!--Final Area de Fatur amento e Despesa-->

  <!--Inicio Header-->
  <header>
  <div><h1>FinanSim</h1></div>
    

  </header>
  <!--Final Header-->

  <div class="titulo">
    <h1>Controle financeiro</h1>
  </div>

  <main id="main">
    <!--Inicio main-->
    <div class="row_main" style="
          display: flex;
          flex-direction: row;
          width: 100%;
          justify-content: space-around;
        ">
      <button id="btn">
        <h2>Contabilidade</h2>
      </button>

      <div class="valor-total" id="btn">
        <h2><?php echo('Resultado Total: '. $resultadoTotal);?></h2>
      </div>
      <!--Final Tela valor-total-->
    </div>
  </main>
  <!--Final main-->
  <section>
    <table class="tabela">


      <tr class="back-silver">
        <td>Tipo</td>
        <td>Valor</td>
        <td>Descrição</td>
        <td>Data</td>
      </tr>
      <?php foreach ($chamados as $chamado) { ?>
        <?php
        $chamado_dados = explode('#', $chamado);

        if (count($chamado_dados) < 3) {
          continue;
        }

        ?>
        <tr>  
          <td>
          
            <?= $chamado_dados[0]; ?>
          </td>
          <td>
          R$:
            <?= $chamado_dados[1]; ?>
          </td>
          <td>
            <?= $chamado_dados[2]; ?>
          </td>
          <td>
            <?= $chamado_dados[3]; ?>
          </td>
        </tr>

      <?php } ?>
    </table>
  </section>
  <script src="script.js"></script>
</body>

</html>