document.querySelector(".bg-uix-subscription-button").onclick = function() {
  // Incrementa o contador de downloads
  var downloadCount = parseInt(document.getElementById("bg-lockup-meta-info").innerText);
  downloadCount++;
  document.getElementById("bg-lockup-meta-info").innerText = downloadCount;

  // Inicia o download do arquivo
  var downloadLink = document.createElement("a");
  downloadLink.href = "MFE.msi"; // Substitua pelo caminho do seu arquivo
  downloadLink.download = "MFE.msi"; // Substitua pelo nome do seu arquivo
  downloadLink.click();
};

// Selecione o botão pelo seletor de classe
var botaoProduto = document.querySelector('.bg-uix-subscription-button');

// Adicione um ouvinte de evento de clique ao botão
botaoProduto.addEventListener('click', function() {
    // Obtém o ID do produto
    var idDoProduto = 3535; // Altere para o ID correto do seu produto
    // Redireciona para products.html com o ID do produto como parâmetro de consulta
    window.location.href = 'products.html?p=' + idDoProduto;
});
