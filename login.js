document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Simulação de validação de login (substitua esta parte com sua lógica de autenticação real)
    if (username === 'usuario' && password === 'senha') {
        document.getElementById('message').innerHTML = 'Login bem-sucedido!';
    } else {
        document.getElementById('message').innerHTML = 'Usuário ou senha incorretos.';
    }
});
