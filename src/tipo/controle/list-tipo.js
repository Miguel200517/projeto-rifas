$(document).ready(function(){
    $('#table-tipo').dataTable({
        "processing": true,
        "ajax": {
            "url": "src/tipo/modelo/list-tipo.php",
            "taype": "POST"

        },
        "columns": [{
            "data": 'ID',
            "className": 'text-center'

        },
        {
            "data": 'NOME',
            "className": 'text-center'

        },
        {
            "data": 'ID',
            "className":'text-center',
            "orderable":false,
            "searchable":false,
            "render": function(data, taype, row, meta){
                return`
                <button id="${data}" class="btn btn-info btn-view">Vizualizar</button>
                <button id="${data}" class="btn btn-info btn-edit">Editar</button>
                <button id="${data}" class="btn btn-info btn-delete">Excluir</button>
                `
            


           }
        }
    ]
    })


})