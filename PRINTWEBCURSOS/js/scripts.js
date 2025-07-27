function login() {
  const usuario = document.getElementById('usuario').value;
  const senha = document.getElementById('senha').value;

  if (senha === '123456') {
    window.location.href = 'painel/aluno.html';
  } else if (senha === '654321') {
    window.location.href = 'painel/educador.html';
  } else {
    alert('Senha incorreta!');
  }
}
