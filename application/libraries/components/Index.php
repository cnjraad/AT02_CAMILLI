<?php

class Index{
	/**
	 * URL da imagem
	 * @var string
	 */
	private $link_foto;
	
	/**
	 * Texto que sobre o projeto
	 * @var string
	 */
	private $text;
	
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
	
	function __construct($Nome_aluno,$RA_aluno, $link_foto, $text) {
		$this->text = $text;
		$this->link_foto = $link_foto;
		$this->Nome_aluno = $Nome_aluno;
		$this->RA_aluno = $RA_aluno;
	}

	private function createControlador(){
		$this->html .='<!--Card-->
<div class="card">

    <!--Card image-->
    <img class="img-fluid foto-perfil" src="/application/libraries/Foto.jpg" alt="Card image cap">
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-block">
        <!--Title-->
        <h4 class="card-title">'.$this->Nome_aluno.'</h4>
        <!--Text-->
        <ul>
            <li><p class="card-text">RA: '.$this->RA_aluno.'</p></li>
            <li><p class="card-text">Sobre: '.$this->text.'</p></li>
        </ul>
    </div>
    <!--/.Card content-->

</div>
<!--/.Card-->';
	}
	
	public function getIndexHTML(){
		$this->createControlador();
		return $this->html;
	}

}

?>