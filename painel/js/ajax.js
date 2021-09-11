/*
$(function(){
    $('.ajax').ajaxForm({
        dataType:'json',
        beforeSend: function(){
            $('.ajax').animate({'opacity':'0.6'});
            $('.ajax').find('input[type=submit]').attr('disabled','true');
        },
        success: function(data){
            $('.ajax').animate({'opacity':'1'});
            $('.ajax').find('input[type=submit]').removeAttr('disabled');
            $('.box-alert').remove();
            if(data.sucesso){
                $('.ajax').prepend('<div class="box-alert sucesso"><i data-feather="check-circle"></i> O cliente foi inserido com sucesso!</div>');
            }else{
                $('.ajax').prepend('<div class="box-alert erro"><i data-feather="check-circle"></i> '+data.mensagem+'</div>');
            }
        }
    })
    $(function(){
    $('.btn.delete').click(function(e){
        e.preventDefault();
        let item_id = $(this).attr('item_id');
        let boxClient = $(this).parent().parent().parent();
        $.ajax({
            url:include_path+'/ajax/form.php',
            data:{id:item_id,tipo_acao:'deletar_cliente'},
            method:'post'
        }).done(function(){
            boxClient.fadeOut();
        })
    })
})
})
*/
