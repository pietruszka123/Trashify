var btnMenu = document.getElementsByClassName("btn-menu");
var body = document.body
for (var i = 0; i < btnMenu.length; i++) {
    btnMenu[i].addEventListener('click', function () {
        body.classList.toggle('menu-open');
    });
}