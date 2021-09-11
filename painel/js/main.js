$(function(){

	$('[formato=data]').mask('99/99/9999');

	$('[actionBtn=delete]').click(function(){
			var txt;
			var r = confirm("Deseja excluir o registro?");
			if (r == true) {
			    return true;
			} else {
			    return false;
			}
	})


})