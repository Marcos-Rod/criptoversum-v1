$().ready(function () {

    $('#login').validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                maxlength: 40
            },
            mail: {
                required: true,
                email: true
            }
        },
        messages: {
            password: {
                required: "Escriba una contrase&ntilde;a",
                minlength: "Debes escribir correctamente tu contraseña (m&iacute;nimo 8 car&aacute;cteres)",
                maxlength: "Debes escribir correctamente tu contraseña (m&iacute;nimo 8 car&aacute;cteres)"
            },
            mail: {
                required: "Escriba su correo",
                email: "Escriba un correo v&aacute;lido"
            }
        }
    });
    
    $('#form-post').validate({
        rules: {
            titulo: {
                required: true,
                minlength: 4
            },
            extracto: {
                required: true,
                minlength: 10
            },
            file: {
                accept: "image/jpeg, image/png, image/jpg, image/gif",
                maxsize: '614400'
            }
        },
        messages: {
            titulo: {
                required: "Escriba el titulo del post",
                minlength: "Escriba un titulo m&aacute;s descriptivo"
            },
            extracto: {
                required: "La descripci&oacute;n es obligatioria",
                minlength: "Debe ser m&aacute;s espec&iacute;fico"
            },
            file: {
                accept: "Solo se aceptan archivos gif, jpeg, jpg, png",
                maxsize: "El archivo no puede pesar m&aacute;s de 600 KB"
            }
        }
    });
    $('#form-podcast').validate({
        rules: {
            titulo: {
                required: true,
                minlength: 4
            },
            file: {
                accept: "image/jpeg, image/png, image/jpg, image/gif",
                maxsize: '614400'
            },
            url_video: {
                required: true,
            },
        },
        messages: {
            titulo: {
                required: "Escriba el titulo del post",
                minlength: "Escriba un titulo m&aacute;s descriptivo"
            },
            file: {
                accept: "Solo se aceptan archivos gif, jpeg, jpg, png",
                maxsize: "El archivo no puede pesar m&aacute;s de 600 KB"
            },
            url_video: {
                required: "El id del Video es obligatorio",
            }
        }
    });

});