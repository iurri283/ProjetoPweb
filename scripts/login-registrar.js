const wrapper = document.querySelector('.wrapper');
const linkLogin = document.querySelector('.link-login');
const linkRegistrar = document.querySelector('.link-registrar');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconeFechar = document.querySelector('.icone-fechar');

linkRegistrar.addEventListener('click', ()=> {
    wrapper.classList.add('ativado');
});

linkLogin.addEventListener('click', ()=> {
    wrapper.classList.remove('ativado');
});

btnPopup.addEventListener('click', ()=> {
    wrapper.classList.add('popup-ativado');
});

iconeFechar.addEventListener('click', ()=> {
    wrapper.classList.remove('popup-ativado');
});
