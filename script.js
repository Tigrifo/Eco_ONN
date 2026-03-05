// alterna pro modo dark
function darkMode() {
  document.body.classList.toggle('dark');
  
  // salva no localStorage
  const isDark = document.body.classList.contains('dark');
  localStorage.setItem('darkMode', isDark ? 'ativo' : 'inativo');
}

// ve no localStorage e aplica o salvo
document.addEventListener('DOMContentLoaded', function() {
  const darkModeSalvo = localStorage.getItem('darkMode');
  
  if (darkModeSalvo === 'ativo') {
      document.body.classList.add('dark');
  }
});
function mostrarSenha() {
  var senhaInput = document.getElementById('senha');
  
  if (senhaInput.type === 'password') {
      senhaInput.type = 'text';
  } else {
      senhaInput.type = 'password';
  }
}


let tempo = 2500; 
let imagemAtual = 0; 
let images = document.querySelectorAll(".carrossel img"); 
let maximo = images.length; 

function passarImagem() {
    images[imagemAtual].classList.remove('selected');
    imagemAtual = (imagemAtual + 1) % maximo; 
    images[imagemAtual].classList.add('selected');
}

function start() {
    setInterval(passarImagem, tempo);
}

document.addEventListener("DOMContentLoaded", start);
