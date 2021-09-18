$(function(){
	$('a.button').click(function(e){
		e.preventDefault();
		$.ajax({
			url:include_path+'ajax/finalizarPagamento.php',
		}).done(function(data){
			console.log(data);
			var inOpenLightBox = PagSeguroLightbox({
				code:data
			},{
				sucess: function(transactionCode){
					location.href=include_path;
				},
				abort: function(){
					location.href=include_path;
				}
			});
		})
	})	
});
