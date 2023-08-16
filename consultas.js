// Obtém referências para os elementos do formulário
// Obtém referências para os elementos do formulário
let nome = document.querySelector('#nome');
let email = document.querySelector('#email');
let telefone = document.querySelector('#telefone');
let mensagem = document.querySelector('#mensagem');

// Adiciona um ouvinte de evento para o evento de envio do formulário
document.querySelector('form').addEventListener('submit', function(event) {
  // Verifica se o nome contém apenas letras
  if (!/^[a-zA-Z\s]+$/.test(nome.value)) {
    alert('Por favor, insira apenas letras no campo Nome.');
    event.preventDefault();
    return;
  }

  // Verifica se o e-mail é válido
  if (!/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email.value)) {
    alert('Por favor, insira um endereço de e-mail válido no campo Email.');
    event.preventDefault();
    return;
  }

  // Verifica se o telefone contém apenas números
  if (!/^\d+$/.test(telefone.value)) {
    alert('Por favor, insira apenas números no campo Telefone.');
    event.preventDefault();
    return;
  }

  // Verifica se a mensagem tem menos de 100 caracteres
  if (mensagem.value.length > 100) {
    alert('Por favor, insira uma mensagem com menos de 100 caracteres.');
    event.preventDefault();
    return;
  }
});