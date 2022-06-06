$(document).ready(function(){
$('.btn-novo').click (function(e) {
    e.preventDefault()
    // limpar todas as informações já existente em nossa modal
    $('.modal-title').empty()
    $('.modal-body').empty()
    //Incluir novos textos no cabeçalho de minha janela modal
    $('.modal-title').append('Adicionar novo registro')

    //iremos incluir uma função no  botão salavr para demonstar que é um novo registro
    $('.btn-salvar').attr('data-operation','insert')


    //incluir o nosso formulário dentro do corpo da nossa modal
    ('.modal-body').load('src/tipo/visao/form-tipo.htl')
    
    //abrir a nossa janela modal
    $('.modal-tipo').modal('show')



})

})