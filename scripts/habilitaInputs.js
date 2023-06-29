function habilitarInputs() {
    var inputs = document.getElementsByClassName('card-input');
    
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].removeAttribute('readonly');
    }
}