const cpf = document.querySelector("#cpf");

cpf.addEventListener('keydown', function(e) {
    // Verifica se a tecla pressionada é um número ou tecla de controle (backspace, delete, etc.)
    if (e.key.match(/[0-9]|Backspace|Delete|ArrowLeft|ArrowRight|Tab/)) {
        // Nada acontece, permitindo a entrada
    } else {
        // Previne a ação padrão se a tecla não for um número ou tecla de controle
        e.preventDefault();
    }
});

const CEP = document.querySelector("#cep");

CEP.addEventListener('keydown', function(e) {
    // Verifica se a tecla pressionada é um número ou tecla de controle (backspace, delete, etc.)
    if (e.key.match(/[0-9]|Backspace|Delete|ArrowLeft|ArrowRight|Tab/)) {
        // Nada acontece, permitindo a entrada
    } else {
        // Previne a ação padrão se a tecla não for um número ou tecla de controle
        e.preventDefault();
    }
});