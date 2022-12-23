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

// USER CONTENT - DOWNLOADING RECIPE
document.addEventListener("DOMContentLoaded", () => {
	document.querySelector('#downloading-btn-recipe').addEventListener('click', function () {
		html2canvas(document.querySelector('.current-recipe')).then((canvas) => {
			let base64image = canvas.toDataURL('image/jpeg');
			let pdf = new jsPDF('p', 'px', [1600, 1131]);
			pdf.addImage(base64image, 'JPEG', 15, 15, 1110, 800);
			pdf.save('8bit-burger_recette.pdf');
		});
	});
});

// USER CONTENT - DOWNLOADING SHOPPING LIST
document.addEventListener("DOMContentLoaded", () => {
	document.querySelector('#download-btn-shopping-list').addEventListener('click', function () {
		html2canvas(document.querySelector('#writing-shopping-list')).then((canvas) => {
			let base64image = canvas.toDataURL('image/jpeg');
			let pdf = new jsPDF('p', 'px', [1600, 1131]);
			pdf.addImage(base64image, 'JPEG', 15, 15, 1110, 800);
			pdf.save('liste_de_courses.pdf');
		});
	});
});

document.addEventListener("DOMContentLoaded", () => {
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
    })
  })()
});