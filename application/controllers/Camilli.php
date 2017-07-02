<?php

class Camilli extends CI_Controller{

    function Index(){
		//model para obter dados
		$this->load->model('CompModel', 'comp');
		$data['index_list'] = $this->comp->getIndexList();
		
		//view para exibir os dados
		
		$html = $this->load->view('mdbcomponent/Index', $data, true);
		$this->show($html);
	}

	function TVDB(){
		//model para obter dados
		$this->load->model('CompModel', 'comp');
		$data['TVDB_list'] = $this->comp->getTVDBList();
		
		//view para exibir os dados
		
		$html = $this->load->view('mdbcomponent/TheTVDB', $data, true);
		$this->show($html);
	}

	function TVDB_resultado() {
		//model para obter dados
		$this->load->model('CompModel', 'comp');
		$data['TVDB_list'] = $this->comp->getTVDBResult($_POST['name']);
		
		//view para exibir os dados
		
		$html = $this->load->view('mdbcomponent/TheTVDB', $data, true);
		$this->show($html);	
	}

	function Relatorio(){
		//model para obter dados
		$this->load->model('CompModel', 'comp');
		$data['Rel_list'] = $this->comp->getRelatorioList();
		
		//view para exibir os dados
		
		$html = $this->load->view('mdbcomponent/Relatorio', $data, true);
		$this->show($html);
	}


	function show($content, $s = '') {
		$html  = $this->load->view('common/header', null, true);
		$html .= $this->load->view('common/navbar', null, true);
		$html .= $content;

		if ($s != 'S'){
			$html .= $this->load->view('mdbcomponent/basicfooter', null, true);
			$html .= $this->load->view('common/footer', null, true);
		}
		
		echo $html;
	}	
}

?>