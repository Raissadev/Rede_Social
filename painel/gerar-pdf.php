<?php
	ob_start();
	include('templateFinanceiro.php');
	$conteudo = ob_get_contents();
	ob_end_clean();

	$mpdf = new mPDF();
	$mpdf->WriteHTML($conteudo);
	$mdpf->Output();
?>