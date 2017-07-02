<?php
include APPPATH.'libraries/components/TVDB.php';
include APPPATH.'libraries/components/Index.php';
include APPPATH.'libraries/components/Relatorio.php';

class CompModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getIndexList(){
		$index = new Index('Camilli Raad','146220-2', 'Foto.jpg', 'Olá, eu meu nome é Camilli, tenho 23 e trabalho com desenvolvimento de Banco de dados PL/SQL e COBOL para aplicações desktop.<p> Minha proposta nesta aplicação WEB é usar o banco de dados disposto na API THE TVDB v2, baseado na comunidade de programas de televisão. O objetivo é ser a fonte de informação mais completa e precisa em séries de TV de vários idiomas e países. Esta API atualmente é usada por vários projetos diferentes, na tentativa de estar completo, é possível obter quase tudo que você busca. Selecione "TVDB" e, sem necessidade de registrar uma conta você pode, então, buscar séries para pesquisa e obter particularidades da série encontrada.');
		return $index->getIndexHTML();
	}

	function getRelatorioList(){
		$Rel = new Relatorio('Como desenvolver a API THE TVDBv2 em PHP', 'Conexão com API',
         '(1) O primeiro passo é criar um usuário no site da API - <a href="http://thetvdb.com/">thetvdb.com</a>.<br>
          (2) Gerar uma APIKEY através do link <a href="http://thetvdb.com/?tab=apiregister">thetvdb.com/?tab=apiregister</a>. <br>
          (3) Deve ser criado um array com a APIKEY gerada no seguinte formato:
             array( apikey => n_apikey )<br>
          (4)  A seguir, deverá ser enviado um request , codificado  para JSON, no caminho <a href="https://api.thetvdb.com/login">https://api.thetvdb.com/login</a>.<br>
              Dica: para codificar em JSON, você pode usar a função:  json_encode. <br>
          (5) Respostas do Request:<br>
              Em caso de sucesso, a API retornará um token e o codigo de resposta 200.<br>
              Em caso de erro, a API retornará o código 401.<br>
              Dica: A resposta deverá ser decodificada com a função:  json_decode<br>
          (6) O token recebido deverá ser armazenado em uma variável "session".<br><br>',
          'Busca na API',
          '(1) Criar um formulário para enviar o nome da série a ser pesquisada.<br>
           (2) Deverá ser criado um ARRAY, que receberá o nome da série digitado no item anterior. 
          array(name => $_POST["name"] )<br>
           (3) Deverá, também, ser criado o ARRAY de HEADER contendo o token recebido anteriormente:<br>
               array(´Authorization: Bearer ´ . $_SESSION[´token´],<br>
               ´Content-Type: application/json´)<br>
           (4) Outro request deverá ser enviado para o link <a href="https://api.thetvdb.com/search/series?">https://api.thetvdb.com/search/series?</a> . http_build_query(ARRAY do passo 2), concatenado com a string de consulta contendo o ARRAY do passo 2 (desta fase), deverá ser enviado o ARRAY do passo 3 (desta fase).<br>
           (5) O retorno do request apresentará a consulta com as informações da série, em caso de sucesso - o código 404 caso não encontre uma resposta.');
		return $Rel->getRelatorioHTML();
	}

	function getTVDBList(){
		$TVDB = new TVDB();
		return $TVDB->getTVDBHTML();
	}

	function getTVDBResult($name){
		$TVDB = new TVDB();
		return $TVDB->getTVDBResult($name);
	}

}
?>