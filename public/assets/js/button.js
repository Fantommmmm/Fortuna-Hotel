// window.addEventListener('scroll', function() {
//     var button = document.querySelector('.scroll-button');
//     if (button) {
//       button.style.display = window.pageYOffset > 0 ? 'block' : 'none';
//     }
//   });

//   function scrollToTop() {
//     window.scrollTo({ top: 0, behavior: 'smooth' });
//   }


const btn = document.querySelector('.button');

btn.addEventListener('click', () => {

    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    })

})