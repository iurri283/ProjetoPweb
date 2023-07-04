document.addEventListener('DOMContentLoaded', function() {
  // Obtém os elementos necessários
  const eyeIcon = document.querySelector('.saldoCantoSuperior .bi-eye');
  const eyeSlashIcon = document.querySelector('.saldoCantoSuperior .bi-eye-slash');
  const saldoInput = document.getElementById('saldoInput');

  // Define a variável para controlar a visibilidade do valor
  let isHidden = false;

  // Função para alternar a visibilidade do valor
  function toggleVisibility() {
      isHidden = !isHidden;

      if (isHidden) {
          saldoInput.setAttribute('type', 'password');
          eyeIcon.style.display = 'none';
          eyeSlashIcon.style.display = 'inline-block';
      } else {
          saldoInput.setAttribute('type', 'text');
          eyeIcon.style.display = 'inline-block';
          eyeSlashIcon.style.display = 'none';
      }
  }

  // Adiciona o evento de clique aos ícones do olho
  eyeIcon.addEventListener('click', toggleVisibility);
  eyeSlashIcon.addEventListener('click', toggleVisibility);
});