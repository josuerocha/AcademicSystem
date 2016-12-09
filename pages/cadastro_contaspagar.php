<?PHP 
		require_once("../util/checkSession.php");
		require_once (__DIR__."/../util/autoload.php");
		spl_autoload_register("LoadClass");
		$contaPagar = new ContaPagar();
		$control = new ContaPagarController();
		if(isset($_POST["codeEdit"])){
			$contaPagar = $control->ListById($_POST["codeEdit"]);
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>CCAA-- Cadastro Contas a Pagar</title>
	<link rel="icon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img src="assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="inicio.html">Home</a></li>
					<li><a href="sobre.html">Sobre</a></li>
					<li><a href="cursos.html">Cursos</a></li>
          			<li><a href="estude.html">Estude no CCAA</a></li>
          			<li><a href="unidades.html">Unidades</a></li>
					<li><a href="precos.html">Preços</a></li>
          			<li><a href="convenios.html">Convênios</a></li>
          			<li><a href="contato.html">Contato</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary_login">
            <div class="container">
                    <h1>Cadastro Contas a Pagar</h1>
                </div>
    </header>

    
    <div class="container">
			<div id="coluna_esquerda">&nbsp;
				
<form action="../helper/ContaPagarHelper.php?action=save" method="POST">
				<input type="hidden" id="codeHidden" name="codeHidden"/>
				<h3>Tipo: &nbsp <select id="tipo_conta" name="tipo_conta">
								<?php
								$tipoContaControl = new TipoContaController();
								$tipos = $tipoContaControl->ListAll();
								while($tipo=array_pop($tipos)){                                                 
								echo "<option value='{$tipo->getCode()}'>{$tipo->getTipo()}</option>";
								}
					?>
								</select>
				</h3>
		
				<h3>Valor: &nbsp <input type="number" id="valor" name="valor" size="10" min="1" max="500"><h3>
					
				<h3>Data de Vencimento: &nbsp <input type="date" id="Dt_venc" name="Dt_venc"></h3>
				<h3>Data de Pagamento: &nbsp <input type="date" id="Dt_pag" name="Dt_pag"></h3>
				<h3>Situação: &nbsp 
					<input type="radio" id="Situacao1" name="Situacao" value="quitado"> Quitado &nbsp 
					<input type="radio" id="Situacao2" name="Situacao" value="pendente"> Pendente
				</h3>

				<input type="submit" class="btn-primario" name="Salvar" value="Salvar">
				<input type="button" class="btn-danger" name="Cancelar" value="Cancelar" onclick="Novo();">
			</form>
			</div>

			<br/>
			<br/>

			<div id="coluna_esquerda">&nbsp;


				
				<br/>

				<table id="listaContas" border="2">
					
					<tr>
						<th id="gridtipo">Tipo</th>&nbsp
						<th id="gridVl">Valor</th>&nbsp
						<th id="gridDt_venc">Data de vencimento</th>&nbsp
						<th id="gridDt_Pg">Data de Pagamento</th>&nbsp
						<th id="gridSituacao">Situacao</th>&nbsp
						<th id="gridAção">Ação</th>
					</tr>
				<?PHP
					$controller = new ContaPagarController();
					$contasPagar = $controller->ListAll();
					while($contaPagar = array_pop($contasPagar)){
					echo "
					<tr>
					<th id='gridtipo'>{$contaPagar->getTipo()}</th>
					<th id='gridVl'>{$contaPagar->getValor()}</th>
					<th id='gridDt_venc'>{$contaPagar->getDtVencimento()}</th>
					<th id='gridDt_Pg'>{$contaPagar->getDtPagamento()}</th>
					<th id='gridSituacao'>{$contaPagar->getSituacao()}</th>
					<th>
					<form action=\"../helper/ContaPagarHelper.php?action=delete&code={$contaPagar->getCode()}\" method=\"post\">
					<input type=\"submit\" value=\"Excluir\">
						</form>
					</th>

					<th>
					<form class=\"form_edit\" action=\"../helper/ContaPagarHelper.php?action=edit\"  method=\"post\">
					<input type=\"hidden\" name=\"codeEdit\" id=\"codeEdit\" value={$contaPagar->getCode()}>
					<input type=\"submit\" value=\"Editar\">
						</form>
					</th>
					</tr>
					";
					}
					?>
					</table>

		</div>
	</div>
<div>
			<br/>
			<br/>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2_login">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="inicio.html">Home</a>
								<a href="sobre.html">Sobre</a>
								<a href="cursos.html">Cursos</a>
          						<a href="estude.html">Estude no CCAA</a>
          						<a href="unidades.html">Unidades</a>
								<a href="precos.html">Preços</a>
          						<a href="convenios.html">Convênios</a>
          						<a href="contato.html">Contato</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2016. 
								<br/>
								Site by <a href="http://Jess&Josh&Nick.com/" rel="develop">Jess&Josh&Nick.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/specific/contas_pagar.js"></script>
</body>
</html>