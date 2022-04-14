$(function() {
    let editar = false;
    $('#tarea-resultado').hide();
    fetchTarea();
    $('#search').keyup(function(e) {

        if ($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: 'search.php',
                type: 'POST',
                data: { search },
                success: function(response) {
                    let tareas = JSON.parse(response);
                    let template = '';

                    tareas.forEach(tarea => {
                        template += `<li>
                        ${tarea.materia}
                        </li>`
                    });

                    $('#container').html(template);
                    $('#tarea-resultado').show();
                }

            });
        }
        $('#tarea-resultado').hide();


    });

    // Selecciona el elemento con id form-tarea y captura su evento en submit  
    $('#form-tarea').submit(function(e) {
        const postData = {
            materia: $('#materia').val(),
            descripcion: $('#descripcion').val(),
            id: $('#tareaId').val()
        }

        let url = editar === false ? 'tarea-add.php' : 'tarea-edit.php';
        console.log(url);

        // metodo POST con JQ para enviar
        $.post(url, postData, function(response) {
            console.log(response);
            fetchTarea();

            $('#form-tarea').trigger('reset');
        });
        e.preventDefault();
    });

    // Funcion Consultar
    function fetchTarea() {
        $.ajax({
            url: 'tarea-list.php',
            type: 'GET',
            success: function(response) {
                let tareas = JSON.parse(response);
                let template = '';
                tareas.forEach(tarea => {
                    template += `
                    <tr tareaId="${tarea.id}">
                        <td>${tarea.id}</td>
                        <td>
                        <a href="#" class="tarea-item">${tarea.materia}</a>
                        </td>
                        <td>${tarea.descripcion}</td>
                        <td>
                        <button class="tarea-eliminar btn btn-danger"> Eliminar </button>

                        </td>
                    </tr>`
                });

                $('#tareas').html(template);
            }
        });
    }

    // Escuchar un Elemento
    $(document).on('click', '.tarea-eliminar', function() {
        // Sale una alerta preguntando si quiere borrar o no 
        if (confirm('Estas seguro de eliminar?')) {
            // obtener el boton clicleado
            let element = $(this)[0].parentElement.parentElement;
            // Seleccionar Atributo
            let id = $(element).attr('tareaId');
            // Enviar los datos al PHP
            $.post('tarea-delete.php', { id }, function(response) {
                fetchTarea();
            });
        }
    });

    $(document).on('click', '.tarea-item', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('tareaId');
        $.post("tarea-simple.php", { id }, function(response) {
            let tareas = JSON.parse(response);
            $('#materia').val(tareas.materia);
            $('#descripcion').val(tareas.descripcion);
            $('#tareaId').val(tareas.id);
            editar = true;
        });


    });

});