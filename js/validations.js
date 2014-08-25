$(document).ready(function() {
    // $.validator.setDefaults({
    //     // highlight: function(el) {
    //     //     var form_group = el.parents(".form-group")            
    //     //     form_group.removeClass("has-success").addClass("has-error").find("i").removeClass("glyphicon-ok").addClass("glyphicon-remove");
    //     //     el.closest('.control-group').removeClass('success').addClass('error');
    //     // },
    //     // success: function(el) {
    //     //     var form_group = el.parents(".form-group")
    //     //     form_group.removeClass("has-error").addClass("has-success").find("i").removeClass("glyphicon-remove").addClass("glyphicon-ok");
    //     //     el.closest('.control-group').removeClass('error').addClass('success');
    //     //     form_group.find("label.error").hide();            
    //     // }
    //     // highlight: function(element) {
    //     //     $(element).addClass(errorClass).removeClass(validClass);
    //     // }
    //     // },
    //     // success: function(element) {
    //     //     element
    //     //         .text('OK!').addClass('valid')
    //     //         .closest('.control-group').removeClass('error').addClass('success');
    //     // }
    // });
    $("form").submit(function() {
        Ajax.submitForm(this);
        return false;
    });

    $.validator.setDefaults({
        focusCleanup: true,
        highlight: function(element) {
            var form_group = $(element).parents(".form-group")
            form_group.removeClass("has-success").addClass("has-error");
            form_group.find(".glyphicon").removeClass("glyphicon-ok").addClass("glyphicon-remove");
            form_group.find(".error").show();
        },
        success: function(element) {
            var form_group = $(element).parents(".form-group");
            form_group.removeClass("has-error").addClass("has-success");
            form_group.find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-ok");
            form_group.find(".error").hide();
            element.hideErrors();
        }
    });

    $("#signin_form").validate({
        rules: {
            p_email: {
                required: true,
                email: true
            },
            p_password: {
                required: true,
            }
        }

    });

    $("#signup_form").validate({
        rules: {
            p_name: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            p_password: {
                required: true,
                minlength: 5
            },
            p_email: {
                required: true,
                email: true
            }
        }

    });

});
