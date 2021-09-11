$(function() {
  $(".gridImoveis").sortable({
    start: function(){
      var el = $(this);
      el.find('.boxShop').css('box-shadow','0 3px 9px 0 rgb(0 0 0 / 68%)');
      el.find('.boxShop').css('cursor','grab');
    },
    update:function(event,ui){
      var data = $(this).sortable('serialize');
      console.log(data);
      var el = $(this);
      data+='&tipo_acao=ordenar_empreendimentos';
      el.find('.boxShop').css('box-shadow','0 3px 9px 0 rgb(28 28 51 / 15%)');
      $.ajax({
        url: include_path+'ajax/form.php',
        method: 'post',
        data: data
      }).done(function(data){
        console.log(data);
      })
    }
  });
})

