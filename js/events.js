// $(function() {
//     $("#signin_btn").on("click", Ajax.loadModal($(this), event, "Вход на сайт", "Войти"));
//     $("#signup_btn").on("click", Ajax.loadModal($(this), event, "Вход на сайт", "Войти"));    
// });

$(document).on("click", "#signin_btn", function(ev) {
	event.preventDefault();
    Ajax.loadModal(this, ev, "Вход на сайт", "Войти");
});
$(document).on("click", "body", bootbox.hideAll);