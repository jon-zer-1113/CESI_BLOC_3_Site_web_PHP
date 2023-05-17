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

// SERVICE WORKER REGISTRATION
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/service-worker.js')
    .then(registration => {
      console.log('Service Worker registered');
    })
    .catch(error => {
      console.error('Service Worker registration failed:', error);
    });
};



