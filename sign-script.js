const container = document.getElementById('container');
const botaoCadastrar = document.getElementById('botaoCadastrar');
const botaoEntrar = document.getElementById('botaoEntrar');

botaoCadastrar.addEventListener('click', () => {
    container.classList.add('ativo');
});

botaoEntrar.addEventListener('click', () => {
    container.classList.remove('ativo');
});