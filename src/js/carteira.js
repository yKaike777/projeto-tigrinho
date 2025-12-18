const closeBtn = document.getElementById('close-btn');
const container = document.getElementById('container');
const overlay = document.getElementById('overlay');
const confirmBtn = document.getElementById('confirm-btn');

function add_saldo() {
    container.style.display = 'flex';
    overlay.style.display = 'block';

    confirmBtn.value = 'add';
    confirmBtn.textContent = 'Confirmar Depósito';

    confirmBtn.classList.remove('saque-btn');
    confirmBtn.classList.add('add-btn');
}

function sacar() {
    container.style.display = 'flex';
    overlay.style.display = 'block';

    confirmBtn.value = 'saque';
    confirmBtn.textContent = 'Confirmar Saque';

    confirmBtn.classList.remove('add-btn');
    confirmBtn.classList.add('saque-btn');
}

closeBtn.onclick = () => {
    container.style.display = 'none';
    overlay.style.display = 'none';
};

overlay.onclick = () => {
    container.style.display = 'none';
    overlay.style.display = 'none';
};
