document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault();
  
    const fileInput = document.getElementById('csvFile');
    const file = fileInput.files[0];
    
    if (file) {
      const reader = new FileReader();
      
      reader.onload = function(e) {
        const content = e.target.result;
        document.getElementById('result').innerHTML = `
          <div class="alert alert-success" role="alert">
            Arquivo <strong>${file.name}</strong> foi carregado com sucesso!
          </div>`;
        
        // Aqui você pode processar o conteúdo CSV para uso no seu backend ou exibição de dados.
        console.log(content); // Isso mostra o conteúdo do CSV no console do navegador.
      };
      
      reader.readAsText(file);
    } else {
      document.getElementById('result').innerHTML = `
        <div class="alert alert-danger" role="alert">
          Por favor, selecione um arquivo CSV!
        </div>`;
    }
  });
  