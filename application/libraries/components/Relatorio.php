<?php

class Relatorio{
	/**
	 * Título do texto
	 * @var string
	 */
	private $title;

	/**
	 * Subtítulo do texto
	 * @var string
	 */
	private $subtitle1;

	/**
	 * Subtítulo do texto
	 * @var string
	 */
	private $subtitle2;
	
	/**
	 * Texto sobre o projeto
	 * @var string
	 */
	private $text;

	/**
	 * Texto 2 sobre o projeto
	 * @var string
	 */
	private $text2;
	
	/**
	 * Nome do aluno
	 * @var string
	 */
	private $Nome_aluno;
	
	/**
	 * Número de RA do aluno
	 * @var string
	 */
	private $RA_aluno;
	
	/**
	 * Contém o código HTML gerado pela classe Index
	 * @var string
	 */
	private $html = '';
	
	function __construct($title,$subtitle1,$text,$subtitle2,$text2) {
		$this->text = $text;
		$this->title = $title;
		$this->subtitle1 = $subtitle1;
		$this->subtitle2 = $subtitle2;
		$this->text2 = $text2;
	}

	private function showAbout(){
		$this->html .='<div class="card">

        <div class="card-block">
            <h3 class="card-title">'.$this->title.'</h3>
            <ul>
                <li><h4 class="card-title">'.$this->subtitle1.'</h4></li>
                <li><p class="card-text">'.$this->text.'</p></li>
                <li><h4 class="card-title">'.$this->subtitle2.'</h4></li>
                <li><p class="card-text">'.$this->text2.'</p></li>
            </ul>
        </div>

    </div>';
	}
	
	public function getRelatorioHTML(){
		$this->showAbout();
		return $this->html;
	}

}

?>