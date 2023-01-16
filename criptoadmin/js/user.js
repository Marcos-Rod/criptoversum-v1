$().ready(function () {

    $('.delpost').click(function () {
        if (confirm("¿Estas seguro que deseas eliminar el post?") == true) {
            var url = $(this).attr("data-url");
            $(location).attr('href', url);
        }
        else {
            return false;
        }
    });

    $('.deltag').click(function () {
        if (confirm("¿Estas seguro que deseas eliminar el tag?") == true) {
            var url = $(this).attr("data-url");
            $(location).attr('href', url);
        }
        else {
            return false;
        }
    });

    $('.delreg').click(function () {
        if (confirm("¿Estas seguro que deseas eliminar este registro?") == true) {
            var url = $(this).attr("data-url");
            $(location).attr('href', url);
        }
        else {
            return false;
        }
    });

    $('#titulo').on('keyup keypress blur change', function () {
        slug = $(this).val();
        // Reemplaza los carácteres especiales | simbolos con un espacio 
        slug = slug.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'´"\\|\/,.<>¿?\s]/g, ' ').toLowerCase();

        // Corta los espacios al inicio y al final del sluging 
        slug = slug.replace(/^\s+|\s+$/gm, '');

        // Reemplaza el espacio con guión  
        slug = slug.replace(/\s+/g, '-');

        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to = "aaaaeeeeiiiioooouuuunc------";
        for (var i = 0, l = from.length; i < l; i++) {
            slug = slug.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        // Creo la URL en el campo de texto 'url' 
        var input = document.getElementById('slug');
        input.value = slug;

        // Creo la URL en el elemento span 'texto-url' 
        document.getElementById("slug-span").innerHTML = slug;
    });


    //Cambiar imagen
    document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("picture").setAttribute('src', event.target.result);
        };
        reader.readAsDataURL(file);
    }
});