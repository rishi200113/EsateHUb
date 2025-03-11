let menu = document.querySelector('.header .menu');

document.querySelector('#menu-btn').onclick = () =>{
   menu.classList.toggle('active');
}

window.onscroll = () =>{
   menu.classList.remove('active');
}



document.querySelectorAll('.faq .box-container .box h3').forEach(headings =>{
   headings.onclick = () =>{
      headings.parentElement.classList.toggle('active');
   }
});

document.addEventListener("DOMContentLoaded", function() {
   document.querySelector("form").addEventListener("submit", function(e) {
       let valid = true;

       document.querySelectorAll("input[required], select[required], textarea[required]").forEach(function(field) {
           if (!field.value) {
               valid = false;
               field.style.borderColor = "red"; 
           } else {
               field.style.borderColor = "";
           }
       });

       if (!valid) {
           e.preventDefault();
           alert("Please fill in all required fields.");
       }
   });
});