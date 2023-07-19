document.addEventListener('DOMContentLoaded', function() {
    const loginBtn = document.getElementById('loginBtn');
    loginBtn.addEventListener('click', function() {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        
        login(username, password);
    });
});

function login(username, password) {
    if (username === 'admin' && password === 'admin') {
        showAlert('Success', 'Login berhasil', 'green');
    } else {
        showAlert('Error', 'Login gagal. Periksa kembali username dan password Anda.', 'red');
    }
}

function showAlert(type, message, color) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `absolute top-0 left-0 right-0 flex bg-${color}-100 rounded-lg p-4 mb-4 text-sm text-${color}-700 animate-slide-in`;
    alertDiv.setAttribute('role', 'alert');

    const iconSvg = document.createElement('svg');
    iconSvg.className = 'w-5 h-5 inline mr-3';
    iconSvg.setAttribute('fill', 'currentColor');
    iconSvg.setAttribute('viewBox', '0 0 20 20');
    iconSvg.innerHTML = '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>';

    const contentDiv = document.createElement('div');
    const strongSpan = document.createElement('span');
    strongSpan.className = 'font-medium';
    strongSpan.textContent = `${type} alert!`;

    contentDiv.appendChild(strongSpan);
    contentDiv.innerHTML += ` ${message}`;

    alertDiv.appendChild(iconSvg);
    alertDiv.appendChild(contentDiv);

    const container = document.querySelector('.container');
    container.insertBefore(alertDiv, container.firstChild);

    setTimeout(function() {
        alertDiv.classList.remove('animate-slide-in');
        alertDiv.classList.add('animate-slide-out');
        setTimeout(function() {
            alertDiv.remove();
        }, 500); 
    }, 3000);
}
