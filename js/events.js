// $(function() {
//     $("#signin_btn").on("click", Ajax.loadModal($(this), event, "Вход на сайт", "Войти"));
//     $("#signup_btn").on("click", Ajax.loadModal($(this), event, "Вход на сайт", "Войти"));    
// });

$(document).on("click", "#signin_btn", function(ev) {
    ev.preventDefault();
    Ajax.loadModal(this, ev, "Вход на сайт", "Войти");
});
$(document).on("click", "#signup_btn", function(ev) {
    ev.preventDefault();
    Ajax.loadModal(this, ev, "Регистрация на сайте", "Регистрация");
});
$(document).on("click", "#profile_btn", function(ev) {
    ev.preventDefault();
    Ajax.loadModal(this, ev, "Настройки профиля", "Сохранить");
});
$(document).on("click", "body", bootbox.hideAll);
$(document).on("click", ".modal-dialog", function(ev) {
    ev.stopPropagation()
});
