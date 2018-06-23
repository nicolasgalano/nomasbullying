(function(){
    var form = $('#login-form');
    var submitLoader = form.find('button i');
    var response = form.find('#form-response');

    form.on('submit', (e) => e.preventDefault());

    form.validate({
        onfocusout: false,
        rules: {
            dni: {
                required: true
            },
            password: 'required'
        },
        messages: {
            dni: 'Falta completar el campo de DNI',
            password: {
                required: 'Falta completar la contraseña'
            }
        }
        , highlight: function(element, errorClass, validClass) {
            let el = $(element);
            el.addClass('error');
            el.parent().addClass('has-error');
        }
        , unhighlight: function(element, errorClass, validClass) {
            let el = $(element);
            el.removeClass('error');
            el.parent().removeClass('has-error');
        }
        , errorPlacement: function(error, element) {
            // console.log(error);
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoader.removeClass('hide');
            var params = $(form).serializeArray();

            if(params[0].value == '1234'){
                window.location.href = "panel-institucion.html";
            }else{
                window.location.href = "panel.html";
            }
            /*
            $.ajax({
                method: 'POST',
                url: 'php/contact.php',
                data: params,
                success: function(data) {
                    // console.log(data);
                    if(data) {
                        submitLoader.parent().hide();
                        response.addClass('success').fadeIn();
                    }
                },
                complete: function() {
                    submitLoader.addClass('hide');
                }
            });
            */
        }
        , showErrors: function (errorMap, errorList) {

            if (typeof errorList[0] != "undefined") {
                var position = $(errorList[0].element).offset().top;
                $('html, body').animate({
                    scrollTop: position-80
                }, 300);
            }
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });


})();
