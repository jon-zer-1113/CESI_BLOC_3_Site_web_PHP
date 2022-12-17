// HEADER - Changing border-image on scroll (js)
document.addEventListener("DOMContentLoaded", () => {
    let navigationBar = document.querySelector(".navbar");
    window.addEventListener("scroll", () => {
        if(window.scrollY > 30){
        navigationBar.classList.add("changing-header");
        } else {
        navigationBar.classList.remove("changing-header");}
    })
});

// Javascript validation form using Bootstrap
// Example starter JavaScript for disabling form submissions if there are invalid fields
document.addEventListener("DOMContentLoaded", () => {
  (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to/
  let forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', (e) => {
          if (!form.checkValidity()) {
            e.preventDefault()
            e.stopPropagation()
          }

            form.classList.add('was-validated')
        }, false)
      })
  })();
});

