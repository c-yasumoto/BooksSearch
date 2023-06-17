
window.onload = function() {
    // ナビバー開閉
    const burder = document.getElementById('burger');
    const menu = document.getElementById('navbarMenu');
    burder.addEventListener('click', function() {
        burder.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });

};



