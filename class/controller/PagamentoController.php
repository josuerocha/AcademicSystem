<?php

require_once 'IControllerGeneral.php';

class PagamentoController implements IControllerGeneral {
    function Save($pagamento) {
        $pagamentoDAO = new PagamentoDAO();
        return $pagamentoDAO->Save($pagamento);
    }
      
    function Delete($pagamento) {
        $pagamentoDAO = new PagamentoDAO();
        return $pagamentoDAO->Delete($pagamento);
    }

    function List(){
        $pagamentoDAO = new PagamentoDAO();
        return $pagamentoDAO->List();
    }
}
?> 
