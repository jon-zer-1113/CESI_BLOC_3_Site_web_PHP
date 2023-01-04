// HEADER - Changing border-image on scroll (js)
document.addEventListener("DOMContentLoaded", () => {
    let navigationBar = document.querySelector(".navbar");
    window.addEventListener("scroll", () => {
        if(window.scrollY > 30){
        navigationBar.classList.add("changing-header");
        } else {
        navigationBar.classList.remove("changing-header")};
    })
});

// VALIDATION FORM USING BOOTSTRAP
document.addEventListener("DOMContentLoaded", () => {
(() => {
  'use strict'

  let forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form?.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
    })
  })()
});


