var Ajax = (function() {
    var _submitForm = function(t, e) {
            var that = $(t),
                d = that.serialize();
            var jqxhr = $.ajax({
                url: that.attr("action") || e,
                dataType: "json",
                type: that.attr("method") || "POST",
                data: d + (d == "" ? "" : "&") + "json=1",
                beforeSend: function() {
                    _beforeSubmit.call(that);
                }
            });
            jqxhr.done(_encodeSubmitResponse);
            jqxhr.fail(_removeLoading.call(that));
            return false;
        },
        _loadModal = function(t, ev, title, btn_ok_lbl, btn_cancel) {
            //ev.preventDefault();
            //ev.stopPropagation();
            var url = $(t).attr("href") + '?ajaxLoad=1';
            $.get(url, function(data) {
                bootbox.dialog({
                    message: data,
                    title: title,
                    buttons: {
                        //     success: {
                        //         label: btn_ok_lbl,
                        //         className: "btn-success",
                        //         callback: function() {
                        //             Example.show("great success");
                        //         }
                        //     }
                        //     // danger: {
                        //     //     label: "Danger!",
                        //     //     className: "btn-danger",
                        //     //     callback: function() {
                        //     //         Example.show("uh oh, look out!");
                        //     //     }
                        //     // },
                        //     // main: {
                        //     //     label: "Click ME!",
                        //     //     className: "btn-primary",
                        //     //     callback: function() {
                        //     //         Example.show("Primary button");
                        //     //     }
                        //     // }
                    }
                });
            });
        },
        _encodeSubmitResponse = function(data) {
            _removeLoading();
            if (data.alert) alert(data.alert);
            if (data.msg) snackbar.show(data.msg);
            if (data.eval) eval(data.eval);
            if (data.url) window.location.href = data.url;
            if (data.setCookie) {
                $.cookie('SECURITY_ID', data.setCookie.security_id, {
                    expires: 30,
                    path: '/'
                });
                $.cookie('SESSION_ID', data.setCookie.session_id, {
                    expires: 30,
                    path: '/'
                });
            }
        },
        _removeLoading = function() {
            NProgress.done();
            try {
                $('input[type="submit"], input[type="button"]', this.form).attr('disabled', false).removeClass('loading');
            } catch (e) {}
        };
    _beforeSubmit = function() {
        NProgress.start();
        //$('.error', this.form).text('').hide();
        //$('input[type="submit"], input[type="button"]', this.form).attr('disabled', true)
    }
    return {
        submitForm: function(t, ev) {
            return _submitForm(t, ev);
        },
        loadModal: function(t, ev, title, btn_ok_lbl) {
            console.log(t);
            return _loadModal(t, ev, title, btn_ok_lbl);
        }
    }
}());
