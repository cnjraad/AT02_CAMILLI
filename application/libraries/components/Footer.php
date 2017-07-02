<?php

class Footer{
	
	/**
	*Contem o código HTML gerado pela classe Footer.
	*@var string
	*/
	private $html = '';

	/**
	*Título que irá aparecer no footer.
	*@var string
	*/
	private $title;
	
	/**
	*Quantidade de links que irao aparecer no footer.
	*@var number
	*/
	private $qt_links;

	/**
	*Contador de links.
	*@var number
	*/
	private $cont_link;

	function __construct($title, $text){
		$this->title = $title;
		$this->text = $text;
	}

	private function showLinks(){
		$this->html .='<div class="container-fluid">
                       		<div class="row">

                       			<!--First column-->
            					<div class="col-md-3 offset-md-1">
                                    <h5 class="title">'.$this->title.'</h5>
                                    <p>'.$this->text.'</p>
                                </div>

                                <hr class="hidden-md-up">

                                <div class="col-md-2 offset-md-1">
                                    <h5 class="title">Links</h5>
					                <ul>
					                    <li><a href="'.base_url('Camilli/Modal_Image').'">Modal Image</a></li>
					                </ul>
                                </div>

					            <hr class="hidden-md-up">

					            <div class="col-md-2">
					                <h5 class="title">Links</h5>
					                <ul>
					                    <li><a href="'.base_url('Camilli/Footer').'">Footer</a></li>
					                </ul>
					            </div>

					            <hr class="hidden-md-up">

					            <div class="col-md-2">
					                <h5 class="title">Links</h5>
					                <ul>
					                    <li><a href="'.base_url('/Camilli/Carousel').'">Carousel</a></li>
					                </ul>
					            </div>

        					</div>
    					</div>
    					<hr>';
	}

	private function openFooter(){
		$this->html .='<footer class="page-footer center-on-small-only fixed-bottom">';
		$this->html .= $this->showLinks();
		$this->html .='</footer>';
	}
	
	public function getFooterHTML(){
		$this->openFooter();
		return $this->html;
	}

}

?>