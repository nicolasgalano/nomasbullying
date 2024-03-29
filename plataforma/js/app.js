/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 *
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );

//////////////   POPUPS    ///////////////
(function(){

    //TABLAS
    $("table").tablesorter({
        headers: {
            // disable sorting of the first & second column - before we would have to had made two entries
            // note that "first-name" is a class on the span INSIDE the first column th cell
            '.first-name, .last-name' : {
                // disable it by setting the property sorter to false
                sorter: false
            }
        }
    });

    //UPDATE COMMENTS
    function updateComentarios(usuarioID,typeID, popupName, typeOfComment){

        var llamada = '';

        if(typeOfComment == 1){
            llamada = '/acciones/get-comentarios.php?idsituacion='+typeID;
        }

        if(typeOfComment == 2){
            llamada = '/acciones/get-comentarios-notificacion.php?idnotificacion='+typeID;
        }

        var $popupComentario = $(popupName);

        $.ajax({
            method: 'GET',
            url: llamada,
            data: '',
            success: function(data) {
                data = JSON.parse(' '+data+' ');
                if(data) {
                    var formatted = '';
                    //FORMATEAR COMENTARIOS
                    data.forEach(function(item,index){
                        formatted += '<li class="clearfix '+(item.creador==usuarioID?'mio':'')+'">';
                        formatted += '<p>'+item.contenido+'</p><span>'+item.fecha+'</span>';
                        formatted += '</li>';
                    });
                    $popupComentario.find('.comentarios ul').html(formatted);
                }
            },
            complete: function() {}
        });
    }

    $('.open-popup-button').click(function(){
        $('.full-opacity').show();
        var popupClass = $(this).attr('aria-popup');
        $(popupClass).show();


        //MENSAJES SITUACION
        if(popupClass == '.popup-comentarios'){

            var situacionID = $(this).attr('aria-id');
            var usuarioID = $(this).attr('aria-id-usuario');

            updateComentarios(usuarioID,situacionID,popupClass,1);

            //AGREGAR COMENTARIO
            $formAgregarComentario = $('#form-agregar-comentario');
            $btnEnviarComentario = $('#enviar-comentario');
            $formAgregarComentario.on('submit', (e) => e.preventDefault());

            $btnEnviarComentario.off("click").click(function(){

                $.ajax({
                    method: 'GET',
                    url: '/acciones/agregar-comentario.php?creador='+usuarioID+'&contenido='+$('#mensaje-comentario').val()+'&id-situacion='+situacionID,
                    success: function(data) {
                        if(data) {
                            console.log(data);
                            $('#mensaje-comentario').val('');
                            updateComentarios(usuarioID,situacionID,popupClass,1);
                        }
                    },
                    complete: function() {}
                });

            });

        }

        //MENSAJES NOTIFICACION
        if(popupClass == '.popup-comentarios-notificacion'){

            var notificacionID = $(this).attr('aria-id');
            var usuarioID = $(this).attr('aria-id-usuario');

            updateComentarios(usuarioID,notificacionID,popupClass,2);

            //AGREGAR COMENTARIO
            $formAgregarComentarioNot = $('#form-agregar-comentario-not');
            $btnEnviarComentarioNot = $('#enviar-comentario-not');
            $formAgregarComentarioNot.on('submit', (e) => e.preventDefault());

            $btnEnviarComentarioNot.off("click").click(function(){

                $.ajax({
                    method: 'GET',
                    url: '/acciones/agregar-comentario-notificacion.php?creador='+usuarioID+'&contenido='+$('#mensaje-comentario-not').val()+'&id-notificacion='+notificacionID,
                    success: function(data) {
                        if(data) {
                            console.log(data);
                            $('#mensaje-comentario-not').val('');
                            updateComentarios(usuarioID,notificacionID,popupClass,2);
                        }
                    },
                    complete: function() {}
                });

            });

        }

        //IF VER SITUACION
        if(popupClass == '.popup-ver-situacion'){
            var situacionID = $(this).attr('aria-id');
            var usuarioID = $(this).attr('aria-id-usuario');
            var usuarioActivoID = $(this).attr('aria-id-usuario-activo');
            var $popupVerSituacion = $('.popup-ver-situacion');

            if(usuarioActivoID == 1){

                $.ajax({
                    method: 'GET',
                    url: '/acciones/set-estatus.php?idsituacion='+situacionID,
                    data: '',
                    success: function(data) {
                    },
                    complete: function() {}
                });

            }

            $.ajax({
                method: 'GET',
                url: '/acciones/get-situacion.php?idsituacion='+situacionID,
                data: '',
                success: function(data) {
                    data = JSON.parse(' '+data+' ');
                    console.log(data[0]);
                    if(data) {
                        $popupVerSituacion.find('.titulo b').html(data[0].titulo);
                        $popupVerSituacion.find('.descripcion b').html(data[0].descripcion);
                        $popupVerSituacion.find('.gravedad b').html(data[0].nivel_situacion);
                        $popupVerSituacion.find('.gravedad').removeClass('alto medio bajo');
                        $popupVerSituacion.find('.gravedad').addClass(data[0].nivel_situacion);
                    }
                },
                complete: function() {}
            });

            //CREADOR
            $.ajax({
                method: 'GET',
                url: '/acciones/get-usuario.php?idusuario='+usuarioID,
                data: '',
                success: function(data) {
                    data = JSON.parse(' '+data+' ');
                    console.log(data);
                    if(data) {
                        $popupVerSituacion.find('.creador b').html(''+data.nombre+' '+data.apellido+'');
                    }
                },
                complete: function() {}
            });

            //TRAER IMPLICADOS
            //VICTIMA
            $.ajax({
                method: 'GET',
                url: '/acciones/get-implicado.php?idsituacion='+situacionID+'&rol='+'1',
                data: '',
                success: function(data) {
                    data = JSON.parse(' '+data+' ');
                    console.log(data);
                    if(data) {
                        $.ajax({
                            method: 'GET',
                            url: '/acciones/get-usuario.php?idusuario='+data['idUsuario'],
                            data: '',
                            success: function(data) {
                                data = JSON.parse(' '+data+' ');
                                console.log(data);
                                if(data) {
                                    $popupVerSituacion.find('.victima b i').html(''+data.nombre+' '+data.apellido+' ['+data.grado+']');
                                }
                            },
                            complete: function() {}
                        });
                    }
                },
                complete: function() {}
            });
            //VICTIMARIO
            $.ajax({
                method: 'GET',
                url: '/acciones/get-implicado.php?idsituacion='+situacionID+'&rol='+'2',
                data: '',
                success: function(data) {
                    data = JSON.parse(' '+data+' ');
                    console.log(data);
                    if(data) {
                        $.ajax({
                            method: 'GET',
                            url: '/acciones/get-usuario.php?idusuario='+data['idUsuario'],
                            data: '',
                            success: function(data) {
                                data = JSON.parse(' '+data+' ');
                                console.log(data);
                                if(data) {
                                    $popupVerSituacion.find('.agresor b i').html(''+data.nombre+' '+data.apellido+' ['+data.grado+']');
                                }
                            },
                            complete: function() {}
                        });
                    }
                },
                complete: function() {}
            });

        }

        //IF BORRAR USUARIO
        if(popupClass == '.popup-borrar-usuario'){
            $('#borrar-usuario').attr('aria-id-usuario',$(this).attr('aria-id'));//SET ID
        }

        //IF BORRAR NOTIFICACION
        if(popupClass == '.popup-borrar-notificacion'){
            $('#borrar-notificacion').attr('aria-id-notificacion',$(this).attr('aria-id-notificacion'));//SET ID
        }

        function pubType(tipo){
            switch (tipo) {
                case '1':
                    return 'articulo';
                    break;
                case '2':
                    return 'taller';
                    break;
                case '3':
                    return 'link';
                    break;
                case '4':
                    return 'teléfono de ayuda';
                    break;
                case '5':
                    return 'teléfono de institución';
                    break;
                default:
                    return 'publicación';
            }
        }
        //IF BORRAR PUBLICACION
        if(popupClass == '.popup-borrar-publicacion'){
            $(popupClass).find('.popup-top h5').html( 'Borrar ' + pubType( $(this).attr('aria-tipo') ) );
            $('#borrar-publicacion').attr('aria-id-publicacion',$(this).attr('aria-id'));//SET ID
        }
        //IF AGREGAR PUBLICACION
        if(popupClass == '.popup-agregar-publicacion'){
            $(popupClass).find('.popup-top h5').html( 'Agregar ' + pubType( $(this).attr('aria-tipo') ) );
            $('#agregar-publicacion-form').find('input[name="tipo"]').attr('value',$(this).attr('aria-tipo'));
        }
        //IF EDITAR PUBLICACION
        if(popupClass == '.popup-editar-publicacion'){

            $(popupClass).find('.popup-top h5').html('Editar ' + pubType( $(this).attr('aria-tipo') ) );

            var pubID = $(this).attr('aria-id');
            var $formEditarPub = $('#editar-publicacion-form');
            $.ajax({
                method: 'GET',
                url: '/acciones/get-publicacion.php?idpublicacion='+pubID,
                data: '',
                success: function(data) {
                    data = JSON.parse(' '+data+' ');
                    console.log(data);
                    if(data) {
                        $formEditarPub.find('input[name="id"]').attr('value',data.ID);
                        $formEditarPub.find('input[name="tipo"]').attr('value',data.idtipos);
                        $formEditarPub.find('input[name="creador"]').attr('value',data.creador);
                        $formEditarPub.find('input[name="titulo"]').attr('value',data.titulo);
                        $formEditarPub.find('textarea').html(data.contenido);
                    }
                },
                complete: function() {}
            });
        }

        //EDITAR USUARIO
        if(popupClass == '.popup-editar-usuarios'){
            var usuarioID = $(this).attr('aria-id');
            var $formEditarUsuario = $('#editar-usuario-form');
            $.ajax({
                method: 'GET',
                url: '/acciones/get-usuario.php?idusuario='+usuarioID,
                data: '',
                success: function(data) {
                    data = JSON.parse(' '+data+' ');
                    console.log(data);
                    if(data) {
                        $formEditarUsuario.find('input[name="id"]').attr('value',data.ID);
                        $formEditarUsuario.find("input[name='nombre']").attr('value',data.nombre);
                        $formEditarUsuario.find('input[name="apellido"]').attr('value',data.apellido);
                        $formEditarUsuario.find('input[name="idnacionalidad"]').attr('value',data.idnacionalidad);
                        $formEditarUsuario.find('input[name="mail"]').attr('value',data.mail);
                        $formEditarUsuario.find('input[name="tipo"]').attr('value',data.tipo);
                        $formEditarUsuario.find('input[name="identificacion"]').attr('value',data.identificacion);
                        $formEditarUsuario.find('#grado-dummie').text(' '+data.grado);
                        $formEditarUsuario.find('select[name="grado"] option').attr('value',data.grado);
                        $formEditarUsuario.find('#sexo-dummie').text(' '+data.sexo);
                        $formEditarUsuario.find('select[name="sexo"] option').attr('value',data.sexo);
                        $formEditarUsuario.find('input[name="edad"]').attr('value',data.edad);
                        $formEditarUsuario.find('input[name="password-old"]').attr('value',data.password);
                    }
                },
                complete: function() {}
            });
        }

        //AGREGAR NOTIFICACION
        if(popupClass == '.popup-agregar-notificacion'){

            var alumno = $(this).attr('aria-id-usuario');
            var rol = $(this).attr('aria-rol');
            var cantidad = $(this).attr('aria-cantidad');

            var $formAgregarNotificacion = $('#agregar-notificacion-form');

            $formAgregarNotificacion.find('input[name="alumno"]').attr('value',alumno);
            $formAgregarNotificacion.find('input[name="rol"]').attr('value',rol);
            $formAgregarNotificacion.find('input[name="cantidad"]').attr('value',cantidad);

        }

        //AGREGAR USUARIOS
        if(popupClass == '.popup-agregar-usuarios'){
            var tipo = $(this).attr('aria-tipo');
            var $formAgregarU = $('#agregar-usuario-form');
            $formAgregarU.find('input[name="tipo"]').attr('value',tipo);
        }

    });
    $('.full-opacity').click(function(){
        $('.full-opacity').hide();
        $('.popup').hide();
        if($('.popup').hasClass('popup-ver-situacion') || $('.popup').hasClass('popup-comentarios') ){
            location.reload();
        }
    });
    $('.popup-close').click(function(){
        if( $(this).parent().hasClass('popup-ver-situacion') || $(this).parent().hasClass('popup-comentarios') ){
            location.reload();
        }
        $('.full-opacity').hide();
        $(this).parent().hide();
    });

})();

//////////////   FORMS    ///////////////
(function(){

    //CONTACTO
    var form = $('#contact-form');
    var submitLoader = form.find('button i');
    var response = form.find('.form-response');
    form.on('submit', (e) => e.preventDefault());
    form.validate({
        onfocusout: false,
        rules: {
            full_name: {
                required: true
            },
            email: 'required',
            message: 'required'
        },
        messages: {
            full_name: 'Dinos tu nombre.',
            email: {
                required: '¿Cual es tu e-mail?'
            },
            message: 'Contanos el porque de tu contacto.'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoader.removeClass('hide');
            var params = $(form).serializeArray();
            $.ajax({
                method: 'POST',
                url: '/acciones/contacto.php',
                data: params,
                success: function(data) {
                    if(data) {
                        submitLoader.parent().hide();
                        response.addClass('success').fadeIn();
                    }
                },
                complete: function() {
                    submitLoader.addClass('hide');
                }
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });

    //TALLER CONTACTO
    var formTC = $('#taller-contact-form');
    var submitLoaderTC = formTC.find('button i');
    var responseTC = formTC.find('.form-response');
    formTC.on('submit', (e) => e.preventDefault());
    formTC.validate({
        onfocusout: false,
        rules: {
            email: 'required',
            message: 'required'
        },
        messages: {
            email: {
                required: '¿Cual es tu e-mail?'
            },
            message: 'Contanos el porque de tu inscripción.'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderTC.removeClass('hide');
            var params = $(form).serializeArray();
            $.ajax({
                method: 'POST',
                url: '/acciones/contacto-taller.php',
                data: params,
                success: function(data) {
                    console.log(data);
                    if(data) {
                        submitLoaderTC.parent().hide();
                        responseTC.addClass('success').fadeIn();
                    }
                },
                complete: function() {
                    submitLoaderTC.addClass('hide');
                }
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });

    //LOGIN
    var formLogin = $('#login-form');
    var submitLoaderLogin = formLogin.find('button i');
    var responseLogin = formLogin.find('.form-response');
    formLogin.on('submit', (e) => e.preventDefault());
    formLogin.validate({
        onfocusout: false,
        rules: {
            usuario: 'required',
            password: 'required'
        },
        messages: {
            usuario: {
                required: 'Falta completar el campo de DNI'
            },
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderLogin.removeClass('hide');
            var params = $(form).serializeArray();
            $.ajax({
                method: 'POST',
                url: '/acciones/do-login.php',
                data: params,
                success: function(data) {
                    if(data == 'true') {
                        window.location.href = "/panel";
                        //submitLoaderLogin.parent().hide();
                    }else if(data == 'temp') {
                        window.location.href = "/actualizar-contrasena";
                    }else{
                        responseLogin.find('p').text(data);
                        responseLogin.addClass('success').fadeIn();
                        submitLoaderLogin.addClass('hide');
                    }
                },
                complete: function() {
                    //submitLoaderLogin.addClass('hide');
                }
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });


    //LOGIN
    var formRecuperar = $('#recuperar-form');
    var submitLoaderRecuperar = formRecuperar.find('button i');
    var responseRecuperar = formRecuperar.find('.form-response');
    formRecuperar.on('submit', (e) => e.preventDefault());
    formRecuperar.validate({
        onfocusout: false,
        rules: {
            usuario: 'required'
        },
        messages: {
            usuario: {
                required: 'Debe completar el campo de DNI'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderRecuperar.removeClass('hide');
            var params = $(form).serializeArray();
            $.ajax({
                method: 'POST',
                url: '/acciones/recuperar.php',
                data: params,
                success: function(data) {
                    if(data == 'true') {
                        window.location.href = "/panel";
                        //submitLoaderLogin.parent().hide();
                    }else{
                        responseRecuperar.find('p').text(data);
                        responseRecuperar.addClass('success').fadeIn();
                        submitLoaderRecuperar.addClass('hide');
                    }
                },
                complete: function() {
                    //submitLoaderLogin.addClass('hide');
                }
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });


    //CAMBIAR CONTRASEÑA
    var formPass= $('#password-form');
    var submitLoaderPass = formPass.find('button i');
    var responsePass = formPass.find('.form-response');
    formPass.on('submit', (e) => e.preventDefault());
    formPass.validate({
        onfocusout: false,
        rules: {
            password_old: 'required',
            password_new: 'required',
            password_new2: 'required'
        },
        messages: {
            password_old: {
                required: 'Falta completar la contraseña'
            },
            password_new: {
                required: 'Falta completar este campo'
            },
            password_new2: {
                required: 'Falta completar este campo'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderPass.removeClass('hide');
            var params = $(form).serializeArray();
            $.ajax({
                method: 'POST',
                url: '/acciones/cambiar-password.php',
                data: params,
                success: function(data) {

                    console.log(data);

                    if(data == 'true') {
                        window.location.href = "/panel";
                        //submitLoaderLogin.parent().hide();
                    }else{
                        responsePass.find('p').text(data);
                        responsePass.addClass('success').fadeIn();
                        submitLoaderPass.addClass('hide');
                    }
                },
                complete: function() {
                    //submitLoaderLogin.addClass('hide');
                }
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });

    //ACTUALIZAR CONTRASEÑA
    var formPassAct= $('#actualizar-form');
    var submitLoaderPassAct = formPassAct.find('button i');
    var responsePassAct = formPassAct.find('.form-response');
    formPassAct.on('submit', (e) => e.preventDefault());
    formPassAct.validate({
        onfocusout: false,
        rules: {
            password_new: 'required',
            password_new2: 'required'
        },
        messages: {
            password_new: {
                required: 'Falta completar este campo'
            },
            password_new2: {
                required: 'Falta completar este campo'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderPassAct.removeClass('hide');
            var params = $(form).serializeArray();
            $.ajax({
                method: 'POST',
                url: '/acciones/actualizar-password.php',
                data: params,
                success: function(data) {

                    console.log(data);

                    if(data == 'true') {
                        window.location.href = "/panel";
                    }else{
                        responsePassAct.find('p').text(data);
                        responsePassAct.addClass('success').fadeIn();
                        submitLoaderPassAct.addClass('hide');
                    }
                },
                complete: function() {
                    //submitLoaderLogin.addClass('hide');
                }
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });

    //AGREGAR PUBLICACION
    var formAP = $('#agregar-publicacion-form');
    var submitLoaderAP = formAP.find('button i');
    var responseAP = formAP.find('.form-response');
    formAP.on('submit', (e) => e.preventDefault());
    formAP.validate({
        onfocusout: false,
        rules: {
            titulo: 'required',
            contenido: 'required'
        },
        messages: {
            titulo: {
                required: 'Falta completar el título'
            },
            contenido: {
                required: 'Falta completar el contenido'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderAP.removeClass('hide');
            var params = $(form).serializeArray();
            console.log(params);
            $.ajax({
                method: 'POST',
                url: '/acciones/agregar-publicacion.php',
                data: params,
                success: function(data) {
                    console.log(data);
                    if(data == 'true') {
                        window.location.href = "/panel-institucion/contenido";
                    }else{
                        responseAP.find('p').text(data);
                        responseAP.addClass('success').fadeIn();
                        submitLoaderAP.addClass('hide');
                    }
                },
                complete: function() {}
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });

    //EDITAR PUBLICACION
    var formEP = $('#editar-publicacion-form');
    var submitLoaderEP = formEP.find('button i');
    var responseEP = formEP.find('.form-response');
    formEP.on('submit', (e) => e.preventDefault());
    formEP.validate({
        onfocusout: false,
        rules: {
            titulo: 'required',
            contenido: 'required'
        },
        messages: {
            titulo: {
                required: 'Falta completar el título'
            },
            contenido: {
                required: 'Falta completar el contenido'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderAP.removeClass('hide');
            var params = $(form).serializeArray();
            console.log(params);
            $.ajax({
                method: 'POST',
                url: '/acciones/editar-publicacion.php',
                data: params,
                success: function(data) {
                    console.log(data);
                    if(data == 'true') {
                        window.location.href = "/panel-institucion/contenido";
                    }else{
                        responseEP.find('p').text(data);
                        responseEP.addClass('success').fadeIn();
                        submitLoaderEP.addClass('hide');
                    }
                },
                complete: function() {}
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });

    //AGREGAR SITUACIÓN
    var formAS = $('#agregar-situacion-form');
    var submitLoaderAS = formAS.find('button i');
    var responseAS = formAS.find('.form-response');
    formAS.on('submit', (e) => e.preventDefault());
    formAS.validate({
        onfocusout: false,
        rules: {
            titulo: 'required',
            gravedad: 'required',
            descripcion: 'required'
        },
        messages: {
            titulo: {
                required: 'Falta completar el título'
            },
            gravedad: {
                required: 'Falta completar la gravedad'
            },
            descripcion: {
                required: 'Falta completar la descripción'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderAS.removeClass('hide');
            var params = $(form).serializeArray();
            console.log(params);
            $.ajax({
                method: 'POST',
                url: '/acciones/agregar-situacion.php',
                data: params,
                success: function(data) {
                    console.log(data);
                    if(data == 'true') {
                        window.location.href = "/panel-institucion/situaciones";
                    }else{
                        responseAS.find('p').text(data);
                        responseAS.addClass('success').fadeIn();
                        submitLoaderAS.addClass('hide');
                    }
                },
                complete: function() {}
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });

    //AGREGAR NOTIFICACION
    var formAN = $('#agregar-notificacion-form');
    var submitLoaderAN = formAN.find('button i');
    var responseAN = formAN.find('.form-response');
    formAN.on('submit', (e) => e.preventDefault());
    formAN.validate({
        onfocusout: false
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderAN.removeClass('hide');
            var params = $(form).serializeArray();

            $.ajax({
                method: 'POST',
                url: '/acciones/agregar-notificacion.php',
                data: params,
                success: function(data) {
                    if(data == 'true') {
                        window.location.href = "/panel-institucion/notificaciones";
                    }else{
                        responseAN.find('p').text(data);
                        responseAN.addClass('success').fadeIn();
                        submitLoaderAN.addClass('hide');
                    }
                },
                complete: function() {
                }
            });

        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });

    //AGREGAR USUARIO
    var formAU = $('#agregar-usuario-form');
    var submitLoaderAU = formAU.find('button i');
    var responseAU = formAU.find('.form-response');
    formAU.on('submit', (e) => e.preventDefault());
    formAU.validate({
        onfocusout: false,
        rules: {
            nombre: 'required',
            apellido: 'required',
            identificacion: 'required'
        },
        messages: {
            nombre: {
                required: 'Falta completar el nombre'
            },
            apellido: {
                required: 'Falta completar el apellido'
            },
            identificacion: {
                required: 'Falta completar el DNI'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderAU.removeClass('hide');
            var params = $(form).serializeArray();
            $.ajax({
                method: 'POST',
                url: '/acciones/agregar-usuario.php',
                data: params,
                success: function(data) {
                    if(data == 'true') {
                        window.location.href = "/panel-institucion/usuarios";
                    }else{
                        responseAU.find('p').text(data);
                        responseAU.addClass('success').fadeIn();
                        submitLoaderAU.addClass('hide');
                    }
                },
                complete: function() {
                }
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });

    //EDITAR USUARIO
    var formEU = $('#editar-usuario-form');
    var submitLoaderEU = formEU.find('button i');
    //var usuarioID = submitLoaderEU.parent().attr('aria-id-usuario');
    var responseEU = formEU.find('.form-response');
    formEU.on('submit', (e) => e.preventDefault());
    formEU.validate({
        onfocusout: false,
        rules: {
            nombre: 'required',
            apellido: 'required',
            identificacion: 'required'
        },
        messages: {
            nombre: {
                required: 'Falta completar el nombre'
            },
            apellido: {
                required: 'Falta completar el apellido'
            },
            identificacion: {
                required: 'Falta completar el DNI'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderEU.removeClass('hide');
            var params = $(form).serializeArray();
            console.log(params);
            $.ajax({
                method: 'POST',
                url: '/acciones/editar-usuario.php',
                data: params,
                success: function(data) {
                    if(data == 'true') {
                        window.location.href = "/panel-institucion/usuarios";
                    }else{
                        responseEU.find('p').text(data);
                        responseEU.addClass('success').fadeIn();
                        submitLoaderEU.addClass('hide');
                    }
                },
                complete: function() {
                }
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });


    //EDITAR USUARIO
    var formEA = $('#editar-alertas-form');
    console.log(formEA);
    var submitLoaderEA = formEA.find('button i');
    var responseEA = formEA.find('.form-response');
    formEA.on('submit', (e) => e.preventDefault());
    formEA.validate({
        onfocusout: false,
        rules: {
            n_victima: 'required',
            n_agresor: 'required'
        },
        messages: {
            n_victima: {
                required: 'El campo no puede quedar vacio'
            },
            n_agresor: {
                required: 'El campo no puede quedar vacio'
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
            error.addClass('control-label animated fadeIn');
            element.after(error);
        }
        , submitHandler: function (form) {
            submitLoaderEA.removeClass('hide');
            var params = $(form).serializeArray();
            console.log(params);
            $.ajax({
                method: 'POST',
                url: '/acciones/editar-alertas.php',
                data: params,
                success: function(data) {
                    if(data == 'true') {
                        window.location.href = "/panel-institucion/config-alertas";
                    }else{
                        responseEA.find('p').text(data);
                        responseEA.addClass('success').fadeIn();
                        submitLoaderEA.addClass('hide');
                    }
                },
                complete: function() {
                }
            });
        }
        , showErrors: function (errorMap, errorList) {
            if (typeof errorList[0] != "undefined") {}
            this.defaultShowErrors(); // keep error messages next to each input element
        }
    });


    //BORRAR USUARIO
    var btnBorrarUsuario = $('#borrar-usuario');
    var btnLoader = btnBorrarUsuario.find('i');
    var responseBU = btnBorrarUsuario.parent().find('.form-response');
    btnBorrarUsuario.click(function(e){
        e.preventDefault();
        var idUsuario = [{"name":"id","value":parseInt($(this).attr('aria-id-usuario'))}];
        btnLoader.removeClass('hide');
        $.ajax({
            method: 'POST',
            url: '/acciones/borrar-usuario.php',
            data: idUsuario,
            success: function(data) {
                if(data == 'true') {
                    window.location.href = "/panel-institucion/usuarios";
                }else{
                    responseBU.find('p').text(data);
                    responseBU.addClass('success').fadeIn();
                    btnLoader.addClass('hide');
                }
            },
            complete: function() {
                btnLoader.addClass('hide');
            }
        });
    });

    //BORRAR PUBLICACION
    var btnBorrarPub = $('#borrar-publicacion');
    var btnLoader = btnBorrarPub.find('i');
    var responseBP = btnBorrarPub.parent().find('.form-response');
    btnBorrarPub.click(function(e){
        e.preventDefault();
        var idPub = [{"name":"id","value":parseInt($(this).attr('aria-id-publicacion'))}];
        btnLoader.removeClass('hide');
        $.ajax({
            method: 'POST',
            url: '/acciones/borrar-publicacion.php',
            data: idPub,
            success: function(data) {
                if(data == 'true') {
                    window.location.href = "/panel-institucion/contenido";
                }else{
                    responseBP.find('p').text(data);
                    responseBP.addClass('success').fadeIn();
                    btnLoader.addClass('hide');
                }
            },
            complete: function() {
                btnLoader.addClass('hide');
            }
        });
    });

    //BORRAR NOTIFICACION
    var btnBorrarNot = $('#borrar-notificacion');
    var btnLoaderBN = btnBorrarNot.find('i');
    var responseBN = btnBorrarNot.parent().find('.form-response');
    btnBorrarNot.click(function(e){
        e.preventDefault();
        var idNotificacion = [{"name":"id","value":parseInt($(this).attr('aria-id-notificacion'))}];
        btnLoaderBN.removeClass('hide');
        $.ajax({
            method: 'POST',
            url: '/acciones/borrar-notificacion.php',
            data: idNotificacion,
            success: function(data) {
                if(data == 'true') {
                    window.location.href = "/panel-institucion/notificaciones";
                }else{
                    responseBN.find('p').text(data);
                    responseBN.addClass('success').fadeIn();
                    btnLoaderBN.addClass('hide');
                }
            },
            complete: function() {
                btnLoaderBN.addClass('hide');
            }
        });
    });

})();

//////////////////////////// END FORMS ////////////////////////////////

(function($) {

    new WOW().init();

    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };
    var $body = $('body');
    var $document = $(document);
    var $navBar = $('#top-nav');
    var changeNavbar = debounce(function() {

        if( !$navBar.hasClass('navbar-bg') && $document.scrollTop() >= 10 ) {
            $navBar.addClass('navbar-bg');
        }
        else if($document.scrollTop() < 10) {
            $navBar.removeClass('navbar-bg');
        }

    }, 250);
    window.addEventListener('scroll', changeNavbar);
    changeNavbar();

    $('#navbarMenu').on('show.bs.collapse', function (e) {
        e.preventDefault();

    });

    $('#navbarMenu').on('hide.bs.collapse', function (e) {
        e.preventDefault();

    });
})(jQuery);

/**
 * svganimations.js v1.0.0
 * http://www.codrops.com
 *
 * the svg path animation is based on http://24ways.org/2013/animating-vectors-with-svg/ by Brian Suda (@briansuda)
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
(function($) {

	'use strict';

	var docElem = window.document.documentElement;

	window.requestAnimFrame = function(){
		return (
			window.requestAnimationFrame       ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame    ||
			window.oRequestAnimationFrame      ||
			window.msRequestAnimationFrame     ||
			function(/* function */ callback){
				window.setTimeout(callback, 1000 / 60);
			}
		);
	}();

	window.cancelAnimFrame = function(){
		return (
			window.cancelAnimationFrame       ||
			window.webkitCancelAnimationFrame ||
			window.mozCancelAnimationFrame    ||
			window.oCancelAnimationFrame      ||
			window.msCancelAnimationFrame     ||
			function(id){
				window.clearTimeout(id);
			}
		);
	}();

	function SVGEl( el ) {
		this.el = el;
		this.image = $(this.el).parent().prev()[0];
		this.current_frame = 0;
		this.total_frames = 60;
		this.path = new Array();
		this.length = new Array();
		this.handle = 0;
		this.init();
	}

	SVGEl.prototype.init = function() {
		var self = this;
		[].slice.call( this.el.querySelectorAll( 'path' ) ).forEach( function( path, i ) {
			self.path[i] = path;
			var l = self.path[i].getTotalLength();
			self.length[i] = l;
			self.path[i].style.strokeDasharray = l + ' ' + l;
			self.path[i].style.strokeDashoffset = l;
		} );
	};

	SVGEl.prototype.render = function() {
		if( this.rendered ) return;
		this.rendered = true;
		classie.remove(this.el, 'hide');
		this.draw();
	};

	SVGEl.prototype.draw = function() {
		var self = this,
			progress = this.current_frame/this.total_frames;
		if (progress > 1) {
			window.cancelAnimFrame(this.handle);
			this.showImage();
		} else {
			this.current_frame++;
			for(var j=0, len = this.path.length; j<len;j++){
				this.path[j].style.strokeDashoffset = Math.floor(this.length[j] * (1 - progress));
			}
			this.handle = window.requestAnimFrame(function() { self.draw(); });
		}
	};

	SVGEl.prototype.showImage = function() {
		classie.add( this.image, 'show' );
		// classie.add( this.el, 'hide' );
	};

	function getViewportH() {
		var client = docElem['clientHeight'],
			inner = window['innerHeight'];

		if( client < inner )
			return inner;
		else
			return client;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	// http://stackoverflow.com/a/5598797/989439
	function getOffset( el ) {
		var offsetTop = 0, offsetLeft = 0;
		do {
			if ( !isNaN( el.offsetTop ) ) {
				offsetTop += el.offsetTop;
			}
			if ( !isNaN( el.offsetLeft ) ) {
				offsetLeft += el.offsetLeft;
			}
		} while( el = el.offsetParent )

		return {
			top : offsetTop,
			left : offsetLeft
		};
	}

	function inViewport( el, h ) {
		var elH = el.offsetHeight,
			scrolled = scrollY(),
			viewed = scrolled + getViewportH(),
			elTop = getOffset(el).top,
			elBottom = elTop + elH,
			// if 0, the element is considered in the viewport as soon as it enters.
			// if 1, the element is considered in the viewport only when it's fully inside
			// value in percentage (1 >= h >= 0)
			h = h || 0;

		return (elTop + elH * h) <= viewed && (elBottom) >= scrolled;
	}

	function init() {
		var svgs = Array.prototype.slice.call( document.querySelectorAll( '#main svg' ) ),
			svgArr = new Array(),
			didScroll = false,
			resizeTimeout;

		// the svgs already shown...
		svgs.forEach( function( el, i ) {
			var svg = new SVGEl( el );
			svgArr[i] = svg;
			setTimeout(function( el ) {
				return function() {
					if( inViewport( el.parentNode ) ) {
						svg.render();
					}
				};
			}( el ), 250 );
		} );

		var scrollHandler = function() {
				if( !didScroll ) {
					didScroll = true;
					setTimeout( function() { scrollPage(); }, 60 );
				}
			},
			scrollPage = function() {
				svgs.forEach( function( el, i ) {
					if( inViewport( el.parentNode, 0.5 ) ) {
						svgArr[i].render();
					}
				});
				didScroll = false;
			},
			resizeHandler = function() {
				function delayed() {
					scrollPage();
					resizeTimeout = null;
				}
				if ( resizeTimeout ) {
					clearTimeout( resizeTimeout );
				}
				resizeTimeout = setTimeout( delayed, 200 );
			};

		window.addEventListener( 'scroll', scrollHandler, false );
		window.addEventListener( 'resize', resizeHandler, false );
	}

	init();

})(jQuery);
