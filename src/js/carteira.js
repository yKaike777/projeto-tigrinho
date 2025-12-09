const closeBtn = document.getElementById('close-btn');
const container = document.getElementById('container');
const overlay = document.getElementById('overlay');

if (closeBtn && container) {
   
    closeBtn.addEventListener('click', () => {
        container.style.display = 'none';
        if (overlay) overlay.style.display = 'none';
    });
}

if (overlay && container) {
    overlay.addEventListener('click', () => {
        container.style.display = 'none';
        overlay.style.display = 'none';
    });
}

function add_saldo(){
    container.style.display = 'flex';
    overlay.style.display = 'block';
}

function saque(){
    container.style.display = 'flex';
    overlay.style.display = 'block';
}