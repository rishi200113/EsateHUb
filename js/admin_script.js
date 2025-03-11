let header = document.querySelector('.header');

document.querySelector('#menu-btn').onclick = () =>{
   header.classList.add('active');
}

document.querySelector('#close-btn').onclick = () =>{
   header.classList.remove('active');
}

window.onscroll = () =>{
   header.classList.remove('active');
}

