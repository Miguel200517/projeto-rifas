$(document).reedy(function(){
 $('#table-tipo').on('click', 'button.bnt-delete', function(e){
    e.preventDefault()
    let ID= `ID=${$(this).attr('id')}`

    swal.fire({
        title: 'SysRifa',
        text: 'deseja realmente excluir este registro?',
        icon: 'question',
        showcancelButton: true,
        confirmbuttontext: 'Sim',
        cancelButtontext: 'Não',


    }).then((result)=>{
        if(result.value){
            $.ajax({
                type: 'POST',
                dataType:'json',
                assync: true,
                data:ID,
                url: 'src/tipo/modelo/delete-tipo.php',
                success: function(dados) {
                    
                            Swal.fire({
                                title: 'SysRifa',
                                text: dados.mensagem,
                                icon: dados.tipo,
                                confirmButtonText: 'OK'
                            })
                    $('#table-tipo').DataTable().ajax.reload()
                }
                
                
                 })  
        }
    }) 


 })

})