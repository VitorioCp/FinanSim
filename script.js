var botao = document.getElementById("btn");
var cadastro = document.getElementById("cadastro-valor");
var sair = document.getElementById("sair");

botao.addEventListener("click", function () {
  cadastro.style.display = "block";
});

sair.addEventListener("click", function () {
  cadastro.style.display = "none";
});

