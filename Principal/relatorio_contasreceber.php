<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">

</head>

<body>
<table id="tabela" class="display nowrap" cellspacing="0" width="100%">


<?PHP
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$contasControl = new ContaReceberController();
$contas = $contasControl->ListAll();

$tipoControl = new TipoContaController();
?>


<thead>
<tr> 
            <th data-column-id="Código" data-type="numeric">Tipo</th>
            <th data-column-id="Nome da turma"> Valor</th>
            <th data-column-id="Horario" data-order="desc">Data de vencimento</th>
			<th data-column-id="Nível" data-order="desc">Data de pagamento</th>
			<th data-column-id="Descricao" data-order="desc">Situação</th>
			
        </tr>
</thead>


        
    
    <tbody>
		
        <?PHP
		 while ($contaReceber = array_pop($contas)) { 
            $tipoConta = $tipoControl->ListByCode($contaReceber->getTipo());
        echo "
		    <tr align=\"center\">
					<td >{$tipoConta->getTipo()}</th>
					<td >R\$ {$contaReceber->getValor()}</th>
					<td >{$contaReceber->getDtVencimento()}</th>
					<td >{$contaReceber->getDtPagamento()}</th>
					<td >{$contaReceber->getSituacao()}</th>                   
 
		    </tr>
			";
      }
	?>
	</tr>
    </tbody>
</table>



</body>

<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="assets/js/datatables/dataTables.js"></script>
<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.print.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.flash.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/jszip.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/js/relatorio_contasreceber.js"></script>
</script>


</html>