<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new TipoContaController();
			$tipoConta = new TipoConta();
			
			$tipoConta->setTipo($_POST["tipoconta"]);

            if($control->Save($tipoConta)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../Principal/cadastroTipoConta.php';</script>"; 			
			
		break;	

		case 'delete':
			$control = new TipoContaController();	
            $tipoConta = new Sala();
            $tipoConta->setCode($_GET["code"]);
			if($control->Delete($tipoConta)){
				echo "<script>alert('Registro excluído com sucesso!');location.href='../Principal/cadastroTipoConta.php';</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');location.href='../Principal/cadastroTipoConta.php';</script>"; 
			}						
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../Principal/paginaInicial.html';</script>";
		break;
	}	
?>