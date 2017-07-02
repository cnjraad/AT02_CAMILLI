<?php

class TVDB{
    
    /**
    *Contem o código HTML gerado pela classe TVDB.
    *@var string
    */
    private $html = '';
    
    function __construct(){
    }

    private function ValidRequest(){

        if(!session_id());
            session_start();

        // Monta um arrray com as informações enviadas do formulário para transformá-los em JSON.
        $postData = array(
            'apikey' => 'EA3FEE7AA328F8E6'
          );

        // Configura o cURL para acessar a API.
        $ch = curl_init('https://api.thetvdb.com/login');
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
                ),
            CURLOPT_POSTFIELDS => json_encode($postData), // Transforma as informações do form em JSON
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_SSL_VERIFYPEER => FALSE
            )
        );    
        // Envia a requisição
        $response = curl_exec($ch);
    
        // Caso houve erros no retorno, mostrará o erro ocorrido.
        if($response === FALSE){
          die(curl_error($ch));
        }

        // Decodifica o retorno para JSON.
        $responseData = json_decode($response, TRUE);
        
        // Coloca o token recebido
        $_SESSION['token'] = $responseData['token'];
    }

    public function BTNSearchAgain(){

        $this->html.='<div class="md-form mt-3">
                        <form action="TVDB" method="post">
                            <button class="btn btn-default">Pesquisar novamente</button>
                        </form>
                    </div>
                      ';
  
    }

    public function ShowResult($responseData){

        foreach($responseData['data'] as $key => $serie): 
                $this->html.='<a class="list-group-item list-group-item-action flex-column align-items-start">
                    <br>
                    <div class="d-flex w-100 justify-content-between">
                        <h3 class="mb-1">'.$serie['seriesName'].'</h3>
                        <small>'.$serie['status'].'</small>
                    </div>
                    <p class="mb-1">'.$serie['overview'].'</p>
                    <small>
                        <ul>
                            <li><strong>id: </strong>'.$serie['id'].'</li>
                            <li><strong>firstAired: </strong>'.$serie['firstAired'].'</li>
                            <li><strong>network: </strong>'.$serie['network'].'</li>
                        </ul>
                    </small>
                </a>';
            endforeach;
  
    }

    public function getTVDBResult($name){

        if(!session_id());
          session_start();

        // Monta um arrray com as informações enviadas do formulário para transformá-los em parâmetros GET.
        $postData = array(
            'name' => $name
        );

        // Monta o cabeçalho necessário para funcionar a API junto com o token recebido.
        $http_header = array(
            'Authorization: Bearer ' . $_SESSION['token'],
            'Content-Type: application/json'
        );

        // Configura o cURL para acessar a API.
        $ch = curl_init('https://api.thetvdb.com/search/series?' . http_build_query($postData) );
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => $http_header,
            CURLOPT_POST => FALSE,
            CURLOPT_HTTPGET => TRUE,
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_SSL_VERIFYPEER => FALSE
        ));

        // Envia a requisição
        $response = curl_exec($ch);

        // Caso houve erros no retorno, mostrará o erro ocorrido.
        if($response === FALSE){
            die(curl_error($ch));
        }else{

            // Decodifica o retorno para JSON.
            $responseData = json_decode($response, TRUE);

            //var_dump($responseData);

            if(isset($responseData['Error'])){
                $this->html.='<br><h2>N&atilde;o foram encontrados resultados para: '.$name.'</h2>';
            }else{

                $this->html.='<br><h1>Resultados por: '.$name.'</h1>
                     <div class="list-group">';

                $this->ShowResult($responseData);            

                $this->html.='</div>';
            
            }
            
            $this->BTNSearchAgain();
        }

        return $this->html;
    }

    private function openSearcher(){

        $this->ValidRequest();

        $this->html.='<div class="md-form mt-3">
                        <form action="TVDB_resultado" method="post">
                          <i class="fa fa-pencil prefix"></i>
                          <label for="">Escreva a serie que deseja buscar</label>
                          <input type="text" name="name">
                          <div class="text-center">
                            <button class="btn btn-default">Procurar</button>
                          <div class="call">
                        </form>
                      </div>';
}

    
    public function getTVDBHTML(){
        $this->openSearcher();
        return $this->html;
    }

}

?>