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

function toggleLanguages() {
  if ($(".idiomas-desplegar").is(":visible")) {
      closeLanguages()
  } else {
      openLanguages()
  }
}
function openLanguages() {
  $(".languages-detach").slideDown();
  $(".languages-detach-triangle").slideDown()
}
function closeLanguages() {
  $(".languages-detach").slideUp(1);
  $(".languages-detach-triangle").slideUp(1)
}

function startProgress() {
  var progressBar = document.getElementById('ngProgress');
  var width = 0;

  // Aumenta a largura da barra de progresso a cada 100ms
  var interval = setInterval(function() {
      if (width >= 100) {
          clearInterval(interval); // Para quando chegar a 100%
      } else {
          width++;
          progressBar.style.width = width + '%'; // Atualiza a largura
      }
  }, 100); // Intervalo de tempo para aumentar a barra
}

// Chame a função quando necessário, por exemplo, ao carregar uma página
window.onload = function() {
  startProgress();
};
