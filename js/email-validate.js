(function () {
    $(function () {
        var validate, validateEmail;
        validateEmail = function (email) {
            var emailReg;
            emailReg = /^(([^<>()\[\]\\.,;:\s@\"]+(\.[^<>()\[\]\\.,;:\s@\"]+)*)|(\"\.+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return emailReg.test(email);
        };
        validate = function () {
            var email = $('#v_email').val();
            if (validateEmail(email)) {
                
            } else {
                alert('The provided email is not valid');
            }
            return false;
        };
        $('form').bind('submit', validate);
        return validateEmail();
    });
}.call(this));