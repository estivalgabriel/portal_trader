<?php
	ob_start();
	include('templateRelatorio.php');
	$conteudo = ob_get_contents();
	ob_end_clean();

	$mpdf = new mPDF();
	$mpdf->WriteHTML($conteudo);
	$mpdf->Output();
?>
