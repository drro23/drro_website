document.addEventListener('DOMContentLoaded', function() {

    menuBtn = document.getElementById('menuIcon');

    menuBtn.addEventListener('click', toggleMenu);

    function toggleMenu() {
        let navBar = document.getElementById('nav-bar');

        if (navBar.className === 'responsiveActive') {
            navBar.classList.remove('responsiveActive');
            window.onscroll = function () {};
        } else if (navBar.className === '')
        {
            navBar.className = 'responsiveActive';
            window.onscroll = function () {
                window.scrollTo(0,0);
            }
        }
    }
});
