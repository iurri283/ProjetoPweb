function habilitarInputs() {
    var inputs = document.getElementsByClassName('card-input');
    
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].removeAttribute('readonly');
    }
}

// function recarregarPagina() {
//   window.location.reload();
// }

// function exibirMensagem() {
//   alert('Os dados foram alterados.');
//   recarregarPagina();
// }