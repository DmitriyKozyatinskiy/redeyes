var Ajax = (function() {
    var _submitForm = function(t, e) {
            var that = $(t),
                d = that.serialize();
            var jqxhr = $.ajax({
                url: that.attr("action") || e,
                dataType: "json",
                type: that.attr("method") || "POST",
                data: d + (d == "" ? "" : "&") + "json=1"
                // beforeSend: function() {
                //     _beforeSubmit.call(that)
                // }
            });
            jqxhr.done(_encodeSubmitResponse);
            // jqxhr.fail(function() {
            //     _submitError.call(that)
            // });
            return false;
        },
        _encodeSubmitResponse = function(data) {
            //_removeLoading();
            if (data.alert) alert(data.alert);
            if (data.msg) snackbar.show(data.msg);
            if (data.eval) eval(data.eval);
            if (data.url) window.location.href = data.url;
        },
        _submitError = function() {
            try {
                NProgress.done();
            } catch (e) {}
            _removeLoading();
        },
        _removeLoading = function() {
            try {
                $('input[type="submit"], input[type="button"]', this.form).attr('disabled', false).removeClass('loading');
            } catch (e) {}
        };
        // function _beforeSubmit(formData, jqForm, options) {
        //     $('.error', this.form).text('').hide();
        //     $('input[type="submit"], input[type="button"]', this.form).attr('disabled', true)
        // }
    return {
        submitForm: function(t, ev) {
            return _submitForm(t, ev);
        },
    }
}());
